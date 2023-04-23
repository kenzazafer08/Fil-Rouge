<template>
  <div>
    <blog-side-bar></blog-side-bar>
    <div class="pl-48 pt-20 flex justify-center flex-col items-center w-full">
        <h1 class="font-normal text-5xl ">{{ post.Title }}</h1>
        <img :src="image(post.image)" class="w-64 h-64 object-cover"/>
        <div class="w-[80%] pl-20">
            <div v-html="post.text"></div>
        </div>
        <div class="w-full bg-gray-100 rounded-sm items-place-center m-5 pl-8">
        <div class="mb-10 mt-10 w-full flex justify-around " v-for="comment in post?.comments" :key="comment.id">
                <p class="pl-10 w-[10%] font-bold text-green-700">{{comment.user.name}}</p>
                <div class="w-[80%] pl-20 px-4 flex justify-start items-center border-green-500 "> 
                <p class=" text-sm text-justify">{{comment.comment}}</p> 
                <button @click="remove(comment.id)" class="text-red-500 w-[20%] flex-end">Archiver</button>
             </div>
            </div>
        </div> 
    </div>
  </div>
</template>

<script>
const token = localStorage.getItem('token')
import axios from 'axios'
import BlogSideBar from '../inc/BlogSideBar.vue'
export default {
  components: { BlogSideBar },
  props : ['id'],
  data(){
    return{
        post : {}
    }
  },
  mounted(){
    this.getPost()
  },
  methods : {
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
    remove(id){
        axios.delete("http://127.0.0.1:8000/api/comment/remove/"+id,{
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: `Bearer ${token}`, // include the token in the headers of the API request
              },
          })
          .then((response) => {
            // set the authenticated state to true
            this.post = response.data;
            console.log(this.post)
            this.getPost()
          })
          .catch((error) => {
            console.log(error.data);
            // handle error response
          });
    }
  }
}
</script>

<style>

</style>