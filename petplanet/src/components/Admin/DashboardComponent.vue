<template>
    <div>
  <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
        <div> 
            
        </div>
      {{ this.users }}
      {{ this.products }}
      {{ this.categories }}
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
  