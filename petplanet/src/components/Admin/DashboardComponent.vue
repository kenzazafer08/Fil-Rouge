<template>
    <div>
  <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4"> 
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                <svg aria-hidden="true" class="flex-shrink-0 w-16 h-16 text-gray-500 transition duration-75 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Users</h5>
                </a>
                <p class="font-normal text-gray-500 ">{{ users }}</p>
                <a href="#" class="inline-flex items-center text-green-600 hover:underline">
                    See our users
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                <svg aria-hidden="true" class="flex-shrink-0 w-16 h-16 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Categories</h5>
                </a>
                <p class="font-normal text-gray-500 ">{{ categories }}</p>
                <a href="#" class="inline-flex items-center text-green-600 hover:underline">
                    See our categories
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                <svg aria-hidden="true" class="flex-shrink-0 w-16 h-16 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Products</h5>
                </a>
                <p class="font-normal text-gray-500 ">{{ products }}</p>
                <a href="#" class="inline-flex items-center text-green-600 hover:underline">
                    See our products
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>
</template>
  
  <script>
  import axios from 'axios'
  import SideBar from '../inc/SideBar.vue';
  export default {
    name: 'DashboardComponent',
    components :{SideBar},
    data() {
      return {
        users : '',
        categories : '',
        products : '',
        orders : ''
      }
    },
    mounted() {
      this.statistics();
    },
    methods:{
       statistics(){
        const token = localStorage.getItem('token');
        axios.get('http://127.0.0.1:8000/api/statistics/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {// set the authenticated state to true
          this.users = response.data.user;
          this.categories = response.data.categories;
          this.products = response.data.products;
          console.log(this.users); 
        })
        .catch(error => {
          console.log(error.response.data);
          // handle error response
        });
       }
    }
  }
  </script>
  
  <style scoped>
  
  </style>
  