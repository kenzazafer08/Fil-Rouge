<template>
    <div>
    <header-component></header-component>
      <div class="mt-8 h-screen flex justify-center flex-col items-center w-full">
          <h1 class="font-normal text-5xl ">{{ post.Title }}</h1>
          <img :src="image(post.image)" class="my-8 w-64 h-64 object-cover"/>
          <div class="w-[80%] pl-20">
              <div v-html="post.text"></div>
          </div>
          <form @submit.prevent="comments" class="w-[90%] my-4">
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea v-model="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." requigreen></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">
                    Post comment
                </button>
                <div class="flex pl-0 space-x-1 sm:pl-2">
                </div>
            </div>
        </div>
     </form>
      </div>
      <footer-component></footer-component>
    </div>
  </template>
  
  <script>
  const token = localStorage.getItem('token')
  import axios from 'axios'
import HeaderComponent from './inc/HeaderComponent.vue'
import FooterComponent from './inc/FooterComponent.vue'
  export default {
    components: { HeaderComponent , FooterComponent },
    props : ['id'],
    data(){
      return{
          post : {},
          comment : ''
      }
    },
    mounted(){
      this.getPost()
    },
    methods : {
      comments(){
        console.log("test")
      },
      getPost(){
          axios.get("http://127.0.0.1:8000/api/post/"+this.id,{
              headers: {
                  "Content-Type": "multipart/form-data",
                  Authorization: `Bearer ${token}`, // include the token in the headers of the API request
                },
            })
            .then((response) => {
              // set the authenticated state to true
              this.post = response.data;
              console.log(this.post)
            })
            .catch((error) => {
              console.log(error.data);
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
  
  </style>