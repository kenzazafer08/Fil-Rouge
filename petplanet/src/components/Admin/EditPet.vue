<template>
    <div>
        <side-bar></side-bar>
        <div class="w-full flex justify-center pl-4 pt-20 sm:pl-24">
        <div class="">
                <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">
                  Edit {{ p.name }} category
                </h3>
                <form class="space-y-6" @submit.prevent="update()">
                  <div class="w-full flex justify-center">
                    <img
                      v-if="Petimage"
                      v-bind:src="Petimage"
                      alt="Placeholder Image"
                      width="200"
                    />
                    <img v-else src="../../assets/image.svg" width="200" />
                  </div>
                  <input
                    @change="handleFileUpload"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    type="file"
                  />
                  <div>
                    <label
                      for="name"
                      class="block mb-2 text-sm font-medium text-gray-900"
                      >Name</label
                    >
                    <input
                      type="text"
                      v-model="p.name"
                      id="name"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                      placeholder="Food"
                      required
                    />
                  </div>
                  <button
                    type="submit"
                    class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                  >
                    Edit
                  </button>
                </form>
              </div>
          </div>
    </div>
  </template>
  
  <script>
  const token = localStorage.getItem("token");
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import SideBar from '../inc/SideBar.vue'
  export default {    
      components :{SideBar},
      name: 'EditPet',
      props: ['id'],
      data() {
        return {
        p: {
          name: "",
          image: [],
        },
        Petimage: "",
        formData : new FormData()
        }
      },
      mounted(){
          console.log(this.id);
          this.getCat();
      }
      ,
      methods:{
          image(name){
        return 'http://127.0.0.1:8000/api/images/'+name;
        },
          getCat(){
          axios
          .get("http://127.0.0.1:8000/api/pets/"+this.id, {
            headers: {
              Authorization: `Bearer ${token}`, // include the token in the headers of the API request
            },
          })
          .then((response) => {
            // set the authenticated state to true
            this.p.name = response.data.name
            this.Petimage = this.image(response.data.image)
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
          this.Petimage = reader.result;
          this.p.image = file;
          console.log(this.p.image);
        };
      },
      update() {
        const token = localStorage.getItem("token");
        console.log(this.p);
        this.formData.set("name", this.p.name);
        this.formData.set("image", this.p.image);
        this.formData.append('_method', 'PUT');
        console.log(this.formData);
          axios
            .post(`http://127.0.0.1:8000/api/pets/update/${this.id}` , this.formData, {
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
                text: "Pet updated succesfuly",
                icon: "success",
                confirmButtonColor: "#5D9C59",
                confirmButtonText: "Done",
              }).then((result) => {
                if (result.isConfirmed) {
                  this.$router.push('/pet')
                  console.log(test)
                }
              });
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