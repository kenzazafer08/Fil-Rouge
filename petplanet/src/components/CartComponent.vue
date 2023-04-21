<template>
    <div class=""> 
        <header-component></header-component>
        <div class="bg-gray-100 w-full flex justify-center items-center">
        <div v-if="cart == null" class="bg-white w-[90%] min-h-[500px] my-10 shadow-sm shadow-gray-200 rounded-lg border flex flex-col justify-center items-center">
            <img src="../assets/cart-svgrepo-com.svg" class="w-32 h-32 mb-10"/>
            <div class="text-center">
                <h2 class="font-bold text-2xl">Your cart is empty!</h2>
                <p class="my-4">Browse our categories and discover our best offers!</p>
                <router-link to="/shop" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Discover</router-link>
            </div>
        </div>
        <div v-else class="bg-white w-[90%] min-h-[500px] my-10 sm:px-20 sm:py-10 px-10 py-5 shadow-sm shadow-gray-200 rounded-lg border ">
            <div class="">
                <div class="flex justify-between items-center border-b">
                    <h1 class="font-bold sm:text-2xl text-lg p-2">Items : {{ count }} </h1>  
                    <div class="flex items-center justify-between"> 
                        <p class="text-green-700 text-sm">Total {{ total }} DH</p>
                        <router-link to="ChekOut" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mx-4">ChekOut</router-link>
                    </div>
                </div>
                <div v-for="cart,index in cart" :key="index" class="flex flex-col sm:flex-row items-center bg-white border border-gray-200 rounded-lg shadow flex-row x-full hover:bg-gray-100 my-8 sm:justify-between justify-center">
                    <img class="object-cover w-full rounded-t-lg h-96 h-auto sm:w-48 sm:rounded-none " :src='image(cart.product.image)' alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ cart.product.name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 ">{{ cart.product.discription }}</p>
                    </div>
                    <div class="w-[20%]">
                        <p class="font-bold">{{ cart.product.price }} DH</p>
                        <p class="font-normal text-green-700">{{ cart.quantity + " Items " + cart.prix_q }} DH</p>
                        <div class="flex flex-row justify-around items-center my-4"> 
                            <button @click="remove(cart.product_id)"><img src="../assets/trash-svgrepo-com.svg" class="w-8 h-8"/></button>
                            <div class="flex items-center"> 
                            <button @click="quantity(cart.id,1)"><img src="../assets/minus-svgrepo-com.svg" class="w-6 h-8"/></button>
                            {{ cart.quantity }}
                            <button @click="quantity(cart.id,2)"><img src="../assets/plus-alt-svgrepo-com.svg" class="w-8 h-8"/></button>  
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=""></div>
        </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>        
const token = localStorage.getItem('token'); // get the token from the local storage
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
export default {
  components: { HeaderComponent, FooterComponent },
  name : 'CartComponent',
  data(){
    return{
        cart : [],
        count : '',
        total : '',
        formData : new FormData()
    }
  },
  mounted() {
    this.getCart()
    this.counts()
  },
  methods : {
    counts(){
        axios.get('http://127.0.0.1:8000/api/cart/count/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
          this.authenticated = true; // set the authenticated state to true
          this.count = response.data.count; 
          this.total = response.data.total;
          console.log(response.data.count)
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
    getCart(){
        console.log('test')
        axios.get('http://127.0.0.1:8000/api/cart/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
          this.authenticated = true;
          if(response.data.cart.length > 0 ){
            this.cart = response.data.cart;
          } // set the authenticated state to true
           else{
            this.cart = null
           }
          console.log(this.cart);
        })
        .catch(error => {
          console.log(error.response.data);
        });
        }, 
        image(name){
        return 'http://127.0.0.1:8000/api/images/'+name;
      },
      remove(cart){
        axios.delete('http://127.0.0.1:8000/api/cart/'+cart ,{headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {console.log(response.data)
             this.getCart()
             this.counts()
            }
        )
        .catch(error => console.log(error.data))
      },
      quantity(index,j){
        let i ;
        for(i=0;i<this.cart.length;i++){
          if(index === this.cart[i].id){
            if(j==1){
              this.cart[i].quantity--;
            }else{
              this.cart[i].quantity++;
            }
            this.cart[i].prix_q = this.cart[i].product.price * this.cart[i].quantity
            this.formData.append("quantity", this.cart[i].quantity);
            this.formData.append("prix_q", this.cart[i].prix_q);
            console.log(this.cart[i].quantity,this.cart[i].prix_q)
            this.cart[i].product_id;
            axios.post('http://127.0.0.1:8000/api/cart/quantity/'+this.cart[i].id, this.formData ,{
            headers: {
              Authorization: `Bearer ${token}` // include the token in the headers of the API request
            }
          }).then(result => {
            console.log(result.data);
            this.count()
          }).catch((error) => {
            console.log(error.response);
          });
          }
        }
        let total = 0;
        for(i=0;i<this.cart.length;i++){
          total = total + this.cart[i].prix_q;
          this.total = total
        }
      },
    }
}

</script>

<style>

</style>