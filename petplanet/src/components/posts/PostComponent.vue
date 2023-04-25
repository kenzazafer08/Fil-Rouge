<template>
  <div>
    <blog-side-bar></blog-side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
      <div class="flex justify-end w-full">
        <router-link to="/Addpost"
          class="focus:outline-none text-green-800 bg-white hover:bg-green-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-8 mr-2 mb-2 border border-green-700"
        >
          Add New post
        </router-link>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Content</th>
                <th scope="col" class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                v-for="cat in posts"
                :key="cat.id"
              >
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <img
                  :src="image(cat.image)"
                    class="w-32 h-32 rounded-full object-cover"
                  />
                </th>
                <td class="px-6 py-4">
                  {{ cat.Title }}
                </td>
                <td class="px-6 py-4">
                  <p class="text-sm" v-html="firstTwoLines(cat.text)"></p>  
                </td>
                <td class="px-6 py-4">
                  <router-link :to="{name : 'ShowPost' , params:{id : cat.id }}"
                  class="pl-2 font-medium text-green-600 hover:underline"
                >
                  Show
                </router-link>
                  <a
                    href="#"
                    class="pl-2 font-medium text-green-600 hover:underline"
                    @click.prevent="confirmDelete(cat.id)"
                    >Delete</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</template>

<script>
const token = localStorage.getItem('token')
import axios from 'axios'
import BlogSideBar from '../inc/BlogSideBar.vue'
import Swal from 'sweetalert2'
export default {
  components: { BlogSideBar },
  data(){
    return{
        posts : [],
    }
  },
  beforeMount() {
      this.getAll();
    },
    methods: {
      
      firstTwoLines(html) {
      const div = document.createElement('div')
      div.innerHTML = html
      const text = div.textContent || div.innerText || ''
      const lines = text.split('\n')
      return lines.slice(0, 2).join('\n')
    },
      getAll() {
        console.log('test')
        axios
          .get("http://127.0.0.1:8000/api/posts",{
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: `Bearer ${token}`, // include the token in the headers of the API request
              },
          })
          .then((response) => {
            // set the authenticated state to true
            this.posts = response.data.posts;
            console.log(this.posts)
          })
          .catch((error) => {
            console.log(error.data);
            // handle error response
          });
      },
        image(name){
            return 'http://127.0.0.1:8000/api/images/'+name;
        },
        deleteCategory(cat) {
        const token = localStorage.getItem("token");
        axios
          .delete("http://127.0.0.1:8000/api/post/delete/" + cat, {
            headers: {
              Authorization: `Bearer ${token}`, // include the token in the headers of the API request
            },
          })
          .then((response) => {
            console.log(response);
            Swal.fire({
              title: "Done",
              text: "Categorie Deleted succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.getAll();
                console.log("test");
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
          });
       },
       confirmDelete(cat) {
        Swal.fire({
          title: "Ok",
          text: "You are sure you wanna delete this categorie",
          icon: "warning",
          confirmButtonColor: "#5D9C59",
          confirmButtonText: "Yes I'm sure",
          showCancelButton: true,
          cancelButtonColor: "#d33",
        }).then((result) => {
          if (result.isConfirmed) {
            this.deleteCategory(cat);
          }
        });
      },
    }
}
</script>

<style>

</style>