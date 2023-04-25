<template>
    <div>
   <header-component></header-component>
   <div class="flex flex-col sm:flex-row justify-center sm:justify-around items-center w-full mt-10 px-20"> 
       <div class="h-full sm:w-1/2 w-full"> 
        <img class="w-full shadox-xl my-10 border" :src="image(product.image)"/>
       </div>
       <div class="px-10"> 
        <h5 class="text-5xl font-light my-8 ">{{ product.name }}</h5>
        <p class="font-light">{{ product.discription }}</p>
        <h5 class="text-2xl font-light">{{ product.price }} د.م.</h5>
        <div class="flex justify-start items-center">
            <label class="font-bold mr-4 w-24">Quantity</label>
            <input v-model="quantity" type="number" min="1" class="border shadow w-12 my-4 focus:outline-none focus:shadow-outline focus:ring-green-300 focus:border-none"/>
            <button @click="add()" type="button" class="text-green-700 bg-white border-solid border-2 border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm w-24 h-8 pl-2 text-center inline-flex items-center ml-4">
                Add to cart
            </button>
        </div>
       </div>
   </div>
   <div class="w-full my-20 flex flex-col"> 
    <h1 class="text-2xl font-light text-center">Reviews <span class="font-bold text-green-800">{{ number }}</span></h1>
  <form class="my-8" @submit.prevent="review">
    <label for="chat" class="sr-only">Your message</label>
    <div class="flex justify-around items-center px-3 py-2 rounded-lg bg-gray-50 ">
        <textarea required v-model="comment" id="chat" rows="1" class="block mx-4 p-2.5 w-[70%] text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 " placeholder="Your message..."></textarea>
        <div class="stars flex flex-row justify-center">
            <button v-for="(star, index) in stars" :key="index" class="fil" @click="values(index+1)" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'filled-star' : index < this.value}" width="16" height="16" viewBox="0 0 24 24" fill="white" stroke="#0FC30C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                    <path d="M12 2 L15.09 8.48 L22 9.82 L17 15.86 L18.18 22 L12 19.17 L5.82 22 L7 15.86 L2 9.82 L8.91 8.48 L12 2 Z"/>
                </svg>
            </button>
        </div>
        <button type="submit" class="inline-flex justify-center p-2 text-green-600 rounded-full cursor-pointer hover:bg-green-100 ">
            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
            <span class="sr-only">Send message</span>
        </button>
        
    </div>
</form>
<ul class="w-full p-5 flex flex-col justify-around">
  <li class="flex items-center px-3 py-2 rounded-lg bg-gray-50" v-for="review in product.reviews" :key="review.id">
    <div class="flex w-[10%] justify-center p-2 items-center text-green-700"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0FC30C"><path fill="#0FC30C" fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z" clip-rule="evenodd"/></svg> {{ review.user }}</div>                
    <p class="w-[70%] p-4">{{ review.comment }}</p>
    <div class="stars flex flex-row justify-center">
      <span v-for="(star, index) in stars" :key="index" class="fil">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" :class="{ 'filled-star': index < review.value }" fill="white" stroke="#0FC30C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
          <path d="M12 2 L15.09 8.48 L22 9.82 L17 15.86 L18.18 22 L12 19.17 L5.82 22 L7 15.86 L2 9.82 L8.91 8.48 L12 2 Z"/>
        </svg>
      </span>
    </div>
    <button @click="remove(review.id)" :class="review.id_user == user  ? 'text-red-800 font-normal m-2 rounded-full px-2 border border-red-700' : 'hidden'">Remove</button>
  </li>
</ul>
   </div>
   <footer-component></footer-component>
   </div>
</template>

<script>
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
import Swal from 'sweetalert2'

const token = localStorage.getItem("token");
export default {
  components: { HeaderComponent, FooterComponent },
  name : 'DetailProduct',
  props : ['id'],
  data(){
    return{
        product : {},
        number : 0,
        stars: [1, 2, 3, 4, 5],
        comment : "",
        value : "",
        formData : new FormData(),
        token : localStorage.getItem("token"),
        user : localStorage.getItem('id'),
        quantity : 1
    }
  },
  beforeMount(){
    this.getproduct()
  },
  methods : {
    add(){
      console.log(this.quantity)
      console.log(this.product);
      let prix_q = this.product.price * this.quantity
      this.formData.append("quantity", this.quantity);
      this.formData.append("prix_q", prix_q);
      console.log(this.formData);
      if(token){
        axios
          .post("http://127.0.0.1:8000/api/cart/store/" + this.id, this.formData, {
            headers: {
              "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}`, // include the token in the headers of the API request
            },
            timeout: 5000, // add a timeout of 5 seconds
          })
          .then((response) => {
            response.data;
            Swal.fire({
              title: "Thank You",
              text: "Product added succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.quantity = '',
                this.$router.push('/Cart')
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
            // handle error response
          });
      }else {
        Swal.fire({
              title: "Warning",
              text: "LogIn first",
              icon: "warning",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result)=>{
              console.log(result)
              this.comment = ''
              this.value = 0
            })
      }
    },
    review() {
      console.log(this.product);
      this.formData.append("comment", this.comment);
      this.formData.append("value", this.value);
      console.log(this.formData);
      if(token){
        axios
          .post("http://127.0.0.1:8000/api/review/store/" + this.id, this.formData, {
            headers: {
              "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}`, // include the token in the headers of the API request
            },
            timeout: 5000, // add a timeout of 5 seconds
          })
          .then((response) => {
            const test = response.data;
            Swal.fire({
              title: "Thank You",
              text: "Review added succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.comment = '',
                this.value = 0
                this.getproduct();
                console.log(test);
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
            // handle error response
          });
      }else {
        Swal.fire({
              title: "Warning",
              text: "LogIn first",
              icon: "warning",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result)=>{
              console.log(result)
              this.comment = ''
              this.value = 0
            })
      }
      },
    values(i){
       this.value = i
       console.log(this.value);
    },
    remove(id){
      Swal.fire({
        title: "Ok",
        text: "You are sure you wanna remove this review",
        icon: "warning",
        confirmButtonColor: "#5D9C59",
        confirmButtonText: "Yes I'm sure",
        showCancelButton: true,
        cancelButtonColor: "#d33",
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteReview(id);
        }
      });
    },
    deleteReview(id) {
      axios
        .delete("http://127.0.0.1:8000/api/review/" + id, {
          headers: {
            Authorization: `Bearer ${token}`, // include the token in the headers of the API request
          },
        })
        .then((response) => {
          console.log(response);
          Swal.fire({
            title: "Done",
            text: "Categorie Deleted succesfuly",
            icon: "success",
            confirmButtonColor: "#5D9C59",
            confirmButtonText: "Done",
          }).then((result) => {
            if (result.isConfirmed) {
              this.getproduct();
              console.log("test");
            }
          });
        })
        .catch((error) => {
          console.log(error.response.data);
        });
  },
    getproduct(){
        axios
        .get("http://127.0.0.1:8000/api/products/"+this.id)
        .then((response) => {
          // set the authenticated state to true
          this.product = response.data
          this.number = this.product.reviews.length
          console.log(this.product.reviews)
          console.log(this.product)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
   },
  }
}
</script>

<style>
.filled-star {
  fill: #0FC30C;
}
</style>