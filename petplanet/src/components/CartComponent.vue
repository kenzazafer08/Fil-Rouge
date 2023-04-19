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
        <div v-else class="bg-white w-[90%] min-h-[500px] my-10 shadow-sm shadow-gray-200 rounded-lg border">

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
        cart : []
    }
  },
  mounted() {
    this.getCart()
  },
  methods : {
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
        }
    }
}

</script>

<style>

</style>