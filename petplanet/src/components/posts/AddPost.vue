<template>
  <div> 
    <blog-side-bar></blog-side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
        <form @submit.prevent="submitPost">
            <div class="w-full flex justify-center">
                    <img
                      v-if="Postimage"
                      v-bind:src="Postimage"
                      alt="Placeholder Image"
                      width="200"
                    />
                    <img v-else src="../../assets/image.svg" width="200" />
                  </div>
                  <input
                    @change="handleFileUpload"
                    class="m-4 block w-[96%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    type="file"
                  />
                  <div class="m-4">
                  <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Title</label
                  >
                  <input
                    type="text"
                    v-model="Title"
                    id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="Food"
                    required
                  />
                </div>
            <editor
                v-model="content"
                :init="{
                height: 500,
                width:auto,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar:
                    'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help'
                }"
            ></editor>
            <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-8 my-8" type="submit">Submit</button>
            </form>
    </div>
  </div>
</template>

<script>
const token = localStorage.getItem('token')
import BlogSideBar from '../inc/BlogSideBar.vue'
import Editor from '@tinymce/tinymce-vue'
import axios from 'axios'
import Swal from 'sweetalert2'
export default {
  components: { BlogSideBar, 'editor': Editor },
  data() {
    return {
        categories : [],
        content: '',
        Title: "",
        image: [],
        Postimage: "",
        formData: new FormData()
    }
    },
    mounted(){
        this.getCategories()
    },
    methods: {
    submitPost() {
        console.log(this.content)
        console.log(this.cat);
        this.formData.set("Title", this.Title);
        this.formData.set("text", this.content);
        this.formData.set("image", this.image);
        console.log(this.formData);
          axios
            .post("http://127.0.0.1:8000/api/post/store", this.formData, {
              headers: {
                "Content-Type": "multipart/form-data",
                Authorization: `Bearer ${token}`, // include the token in the headers of the API request
              },
              timeout: 5000, // add a timeout of 5 seconds
            })
            .then((response) => {
              const test = response.data;
              Swal.fire({
                title: "Done",
                text: "Post registered succesfuly",
                icon: "success",
                confirmButtonColor: "#5D9C59",
                confirmButtonText: "Done",
              }).then((result) => {
                if (result.isConfirmed) {
                  this.$router.push('/posts')
                  console.log(test);
                }
              });
            })
            .catch((error) => {
              console.log(error.response.data);
              // handle error response
            });
    },
    handleFileUpload(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
          this.Postimage = reader.result;
          this.image = file;
          console.log(this.image);
        };
      },
      getCategories() {
        console.log('test')
        axios
          .get("http://127.0.0.1:8000/api/postcategorie",{
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: `Bearer ${token}`, // include the token in the headers of the API request
              },
          })
          .then((response) => {
            // set the authenticated state to true
            this.categories = response.data.categories;
          })
          .catch((error) => {
            console.log(error.response.data);
            // handle error response
          });
      },
    }
}
</script>

<style>

</style>