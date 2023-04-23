<template>
  <div>
    <blog-side-bar></blog-side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4"> 
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                <svg class="flex-shrink-0 w-16 h-16 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" mirror-in-rtl="true">
                    <g fill="#494c4e" fill-rule="evenodd">
                        <path d="M11.01 2a4.93 4.93 0 0 1 3.19 1.16l.15.12a4.958 4.958 0 0 1 1.389-.27A5.479 5.479 0 0 1 21 8.5a5.485 5.485 0 0 1-5.326 5.49 5.472 5.472 0 0 1-6.4-.05c-.251.04-.505.06-.759.06a5.523 5.523 0 0 1-3.985-1.71c-2.283-2.4-2.017-6.842.893-8.614a5 5 0 0 1 2.59-.726h.06A4.98 4.98 0 0 1 11.01 2zm-4 5h5.995a1 1 0 0 0 0-2H7.014a1 1 0 1 0 0 2H7.01zm.004 3.975h9.992a1 1 0 0 0 0-2H7.014a1 1 0 1 0 0 2zM11.01 0a6.962 6.962 0 0 0-3.565.973 5.583 5.583 0 0 1-1.145.189 6.94 6.94 0 0 0-1.117.386A7.025 7.025 0 0 0 1.1 6.9a7.864 7.864 0 0 0 3.911 8.223A7.485 7.485 0 0 0 8.512 16h.251a7.5 7.5 0 0 0 3.746 1 7.386 7.386 0 0 0 3.825-1.051A7.441 7.441 0 0 0 23 8.5c0-.139 0-.278-.015-.407a7.524 7.524 0 0 0-7.172-7.082h-.16a6.569 6.569 0 0 0-.871.1A6.974 6.974 0 0 0 11.01 0z"/>
                        <circle cx="3.981" cy="19" r="1.999"/>
                        <circle cx="1.999" cy="23" r="1"/>
                    </g>
                </svg>                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Posts</h5>
                </a>
                <p class="font-normal text-gray-500 ">{{ posts }}</p>
                <a href="#" class="inline-flex items-center text-green-600 hover:underline">
                    See our posts
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
        </div>
    </div>
  </div>
</template>

<script>
const token = localStorage.getItem('token');
import axios from 'axios'
import BlogSideBar from '../inc/BlogSideBar.vue'
export default {
  components: { BlogSideBar },
  data() {
      return {
        posts : '',
        categories : '',
      }
    },
    mounted() {
      this.statistics();
    },
    methods:{
       statistics(){
        axios.get('http://127.0.0.1:8000/api/author/statistics/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {// set the authenticated state to true
          this.posts = response.data.post;
          this.categories = response.data.categories;
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

<style>

</style>