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
              <router-link to="/blogdashboard" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
                 <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                 <span class="ml-3">Dashboard</span>
              </router-link>
           </li>
           <li>
              <router-link to="/posts" class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 ">
                <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" mirror-in-rtl="true">
                    <g fill="#494c4e" fill-rule="evenodd">
                        <path d="M11.01 2a4.93 4.93 0 0 1 3.19 1.16l.15.12a4.958 4.958 0 0 1 1.389-.27A5.479 5.479 0 0 1 21 8.5a5.485 5.485 0 0 1-5.326 5.49 5.472 5.472 0 0 1-6.4-.05c-.251.04-.505.06-.759.06a5.523 5.523 0 0 1-3.985-1.71c-2.283-2.4-2.017-6.842.893-8.614a5 5 0 0 1 2.59-.726h.06A4.98 4.98 0 0 1 11.01 2zm-4 5h5.995a1 1 0 0 0 0-2H7.014a1 1 0 1 0 0 2H7.01zm.004 3.975h9.992a1 1 0 0 0 0-2H7.014a1 1 0 1 0 0 2zM11.01 0a6.962 6.962 0 0 0-3.565.973 5.583 5.583 0 0 1-1.145.189 6.94 6.94 0 0 0-1.117.386A7.025 7.025 0 0 0 1.1 6.9a7.864 7.864 0 0 0 3.911 8.223A7.485 7.485 0 0 0 8.512 16h.251a7.5 7.5 0 0 0 3.746 1 7.386 7.386 0 0 0 3.825-1.051A7.441 7.441 0 0 0 23 8.5c0-.139 0-.278-.015-.407a7.524 7.524 0 0 0-7.172-7.082h-.16a6.569 6.569 0 0 0-.871.1A6.974 6.974 0 0 0 11.01 0z"/>
                        <circle cx="3.981" cy="19" r="1.999"/>
                        <circle cx="1.999" cy="23" r="1"/>
                    </g>
                </svg>                 
                <span class="flex-1 ml-3 whitespace-nowrap">Posts</span>
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
          }
      },
      beforeMount() {
      // check if the user is authenticated on component creation
      this.checkAuthentication();
    },
    methods: {
      checkAuthentication() {
        const token = localStorage.getItem('token'); // get the token from the local storage
        const role = localStorage.getItem('role');
        if (token && role == 2) {
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