<template>
    <div class="h-[500px] flex justify-center items-center">
  <div class="fixed right-0 hidden sm:block">
    <img src="../assets/image15.png" alt="Image description">
  </div>
  <div class="fixed bottom-0 left-0">
    <img src="../assets/image14.png" alt="Image description">
  </div>
  <div class="absolute z-10">
    <h5 class="text-2xl text-green-500 text-center">Welcome To your pet planet</h5>
    <form class="px-8 pt-6 pb-8 mb-4" @submit.prevent="login">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="username">
          Email
        </label>
        <input v-model="email" class="shadow appearance-none border border-green-500 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-green-300 focus:border-non" id="username" type="text" placeholder="email@gmail.com">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2" for="password">
          Password
        </label>
        <input v-model="password" class="shadow appearance-none border border-green-500 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-green-300 focus:border-none" id="password" type="password" placeholder="********">
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 w-full rounded focus:outline-none focus:shadow-outline">
          Sign In
        </button>
      </div>
      <div class="flex flex-col justify-around items-center">
      <p class="py-2">You don’t have an account<router-link to="/register" class="text-green-500"> Sign Up</router-link> </p>
      <router-link to="/" class="font-bold flex items-center"><svg class="w-12 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="back-arrow"><g data-name="Layer 2"><g data-name="arrow-back"><rect width="10" height="10" opacity="0" transform="rotate(90 12 12)"></rect><path d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z"></path></g></g></svg>Go back</router-link>
      </div>
    </form>
  </div>
</div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
  export default {
    name: 'LoginComponent',
    components :{},
    data() {
      return {
        email : '',
        password : '',
      };
    },
    methods : {
      login(){
        axios.post('http://127.0.0.1:8000/api/login', {
        email: this.email,
        password: this.password
      })
      .then(response => {
        console.log(response.data);
        localStorage.setItem('token', response.data.token); // store the token in the local storage
        localStorage.setItem('role', response.data.role); // store the token in the local storage
        localStorage.setItem('id',response.data.user.id);
        if(response.data.role == 1){
          this.$router.push('/dashboard')
        }else if(response.data.role == 2){
          this.$router.push('/blogdashboard')
        }
        else this.$router.push('/')
        // handle successful response
      })
      .catch(error => {
        console.log(error.data);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          confirmButtonColor: "#5D9C59",
          text: 'Your email or password is incorrect.',
        });
        // handle error response
      });
      }
    }
  }
</script>

<style scoped>

</style>