<template>
    <div>
       <header-component></header-component>
       <div class="bg-white drop-shadow-xl drop-shadow-black h-16 w-full flex justify-between items-center"> 
          <p class="sm:ml-20 text-sm ml-4">Over {{ npost }} Post</p>
       </div>
        <div class="my-10 grid sm:grid-cols-3 grid-cols-1 gap-4 w-full mt-12 mb-24 place-items-center min-h-screen sm:min-h-[500px]"> 
          <div v-for="post in posts" :key="post.id" class="h-44 border-1 w-94 jrounded-2xl shadow bg-white px-4 py-2" >
          <div class="h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-black text-2xl font-bold">{{ post.Title }}</p>
            <router-link :to="{name : 'PostComponentVue' , params:{id : post.id }}" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 rounded-lg">
                  Read More ...           
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </router-link>  
          </div>
        </div>
        </div>
       <footer-component></footer-component>
    </div>

  </template>
  
  <script>
  import HeaderComponent from './inc/HeaderComponent.vue';
  import FooterComponent from './inc/FooterComponent.vue';
  import axios from 'axios';
  export default {
    name: 'BlogComponent',
    components :{HeaderComponent,FooterComponent},
    data() {
      return {
         posts : [],
         npost : ''
      }
    },
    beforeMount() {
      this.getPosts();
      this.getNPosts();
    },
    methods : {
      firstTwoLines(html) {
      const div = document.createElement('div')
      div.innerHTML = html
      const text = div.textContent || div.innerText || ''
      const lines = text.split('\n')
      return lines.slice(0, 1).join('\n')
    },
    getNPosts(){
      axios.get('http://127.0.0.1:8000/api/postcount/')
      .then(response => {
          this.npost = response.data.posts;
        })
        .catch(error => {
            console.log(error);
          });
    },
    getPosts(){
      axios
        .get("http://127.0.0.1:8000/api/posts")
        .then((response) => {
          // set the authenticated state to true
          this.posts = response.data.posts;
          console.log(this.posts);
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  