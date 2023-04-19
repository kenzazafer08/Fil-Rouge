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
        <div v-else class="bg-white w-[90%] min-h-[500px] my-10 px-20 py-10 shadow-sm shadow-gray-200 rounded-lg border ">
            <div class="">
                <div class="flex justify-between items-center border-b">
                    <h1 class="font-bold text-2xl p-2">Items : {{ count }} </h1>  
                    <p class="text-green-700">Total {{ total }} DH</p>
                </div>
                <div v-for="cart in cart" :key="cart.product_id" class="flex items-center bg-white border border-gray-200 rounded-lg shadow flex-row x-full hover:bg-gray-100 my-8 justify-between">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg " :src='image(cart.product.image)' alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ cart.product.name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ cart.product.discription }}</p>
                    </div>
                    <div class="w-[20%]">
                        <p class="font-bold">{{ cart.product.price }} DH</p>
                        <p class="font-normal text-green-700">{{ cart.quantity + " Items " + cart.prix_q }} DH</p>
                        <div class="flex flex-row justify-around items-center my-4"> 
                            <button><img src="../assets/trash-svgrepo-com.svg" class="w-8 h-8"/></button>
                            <div class="flex items-center"> 
                            <button><img src="../assets/minus-svgrepo-com.svg" class="w-6 h-8"/></button>
                            {{ cart.quantity }}
                            <button><img src="../assets/plus-alt-svgrepo-com.svg" class="w-8 h-8"/></button>  
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
    }
  },
  mounted() {
    this.getCart()
    this.counts()
  },
  methods : {
    counts(){
        const token = localStorage.getItem('token'); // get the token from the local storage
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
        const token = localStorage.getItem('token'); // get the token from the local storage
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
    }
}

</script>

<style>

</style>