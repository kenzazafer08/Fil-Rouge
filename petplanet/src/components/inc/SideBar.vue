<template>
  <div>
<nav class="fixed top-0 z-50 w-full bg-green-700 border-b border-gray-200 ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400  dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="" class="flex ml-2 md:mr-24">
          <img src="../../assets/whitelogo.png" class="h-8 mr-3" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">PetPlanet</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../../assets/user.svg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-black" role="none">
                  {{user.name}}
                </p>
                <p class="text-sm font-medium text-black truncate dark:text-gray-300" role="none">
                    {{user.email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <button @click="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
      <ul class="space-y-2 font-medium">
         <li>
            <router-link to="/dashboard" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
               <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
               <span class="ml-3">Dashboard</span>
            </router-link>
         </li>
         <li>
            <router-link to="/categorie" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Categories</span>
            </router-link>
         </li>
         <li>
            <router-link to="/Orders" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
            </router-link>
         </li>
         <li>
            <router-link to="/Users" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </router-link>
         </li>
         <li>
            <router-link to="/Products" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
            </router-link>
         </li>
         <li>
            <router-link to="/pet" href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
              <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M19.0803 15.7201C18.4903 12.1901 15.1003 9.32007 11.5203 9.32007C7.63028 9.32007 4.21028 12.4701 3.88028 16.3501C3.75028 17.8501 4.23028 19.2701 5.22028 20.3401C6.20028 21.4101 7.58028 22.0001 9.08028 22.0001H13.7603C15.4503 22.0001 16.9303 21.3401 17.9403 20.1501C18.9503 18.9601 19.3503 17.3801 19.0803 15.7201Z" fill="#292D32"/>
              <path d="M10.2796 7.86C11.8978 7.86 13.2096 6.54819 13.2096 4.93C13.2096 3.31181 11.8978 2 10.2796 2C8.66141 2 7.34961 3.31181 7.34961 4.93C7.34961 6.54819 8.66141 7.86 10.2796 7.86Z" fill="#292D32"/>
              <path d="M16.94 9.0299C18.2876 9.0299 19.38 7.93748 19.38 6.5899C19.38 5.24233 18.2876 4.1499 16.94 4.1499C15.5924 4.1499 14.5 5.24233 14.5 6.5899C14.5 7.93748 15.5924 9.0299 16.94 9.0299Z" fill="#292D32"/>
              <path d="M20.5496 12.93C21.6266 12.93 22.4996 12.057 22.4996 10.98C22.4996 9.90307 21.6266 9.03003 20.5496 9.03003C19.4727 9.03003 18.5996 9.90307 18.5996 10.98C18.5996 12.057 19.4727 12.93 20.5496 12.93Z" fill="#292D32"/>
              <path d="M3.94 10.9801C5.28757 10.9801 6.38 9.88767 6.38 8.5401C6.38 7.19252 5.28757 6.1001 3.94 6.1001C2.59243 6.1001 1.5 7.19252 1.5 8.5401C1.5 9.88767 2.59243 10.9801 3.94 10.9801Z" fill="#292D32"/>
              </svg>               
              <span class="flex-1 ml-3 whitespace-nowrap">Pets</span>
            </router-link>
         </li>
      </ul>
   </div>
</aside>

</div>
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios';
export default {
    name: 'SideBar',
    data() {
        return{
            authenticated: false, // initially set the authenticated state to false
            user: {},
            norder : ''
        }
    },
    beforeMount() {
    // check if the user is authenticated on component creation
    this.checkAuthentication();
    this.count();
  },
  methods: {
    count(){
      const token = localStorage.getItem('token');
    axios.get('http://127.0.0.1:8000/api/order/count', {
      headers: {
        Authorization: `Bearer ${token}` // include the token in the headers of the API request
      }
    }).then(response => {
      this.norder = response.data;// set the authenticated state to true
    })
    .catch(error => {
      console.log(error.response.data);
      // handle error response
    });
    },
    checkAuthentication() {
      const token = localStorage.getItem('token'); // get the token from the local storage
      const role = localStorage.getItem('role');
      if (token && role == 1) {
        axios.get('http://127.0.0.1:8000/api/user/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
          this.authenticated = true; // set the authenticated state to true
          this.user = response.data; // set the user data
        })
        .catch(error => {
          console.log(error.response.data);
          // handle error response
        });
      }else{
        this.$router.push('/');
        Swal.fire({
          title: "Alert",
          text: "Log In First",
          icon: "warning",
          confirmButtonColor: "#5D9C59",
          confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.push('/')
              }
            });
      }
    },
    logout(){
    const token = localStorage.getItem('token');
    axios.post('http://127.0.0.1:8000/api/logout/', {}, {
      headers: {
        Authorization: `Bearer ${token}` // include the token in the headers of the API request
      }
    }).then(response => {
      this.authenticated = true;
      console.log(response)
      localStorage.clear();
      this.$router.push('/'); // set the authenticated state to true
    })
    .catch(error => {
      console.log(error.response.data);
      // handle error response
    });
}
}
}
</script>

<style>

</style>