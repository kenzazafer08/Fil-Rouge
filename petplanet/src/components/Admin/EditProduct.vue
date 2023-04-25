<template>
    <div>
        <side-bar></side-bar>
        <div class="pl-32 pt-20 flex justify-center items-center flex-col w-full h-screen mb-8">
            <h3 class="mb-4 text-xl pl-0 font-medium text-gray-900 text-center">
                Edit product
              </h3>
              <form class="space-y-6 w-full flex flex-col justify-center items-center mb-2A" @submit.prevent="register()">
                <div class="w-full flex flex-col justify-center items-center">
                  <div class="flex flex-col items-center mb-2">
                    <img
                    v-if="Productimage"
                    v-bind:src="Productimage"
                    alt="Placeholder Image"
                    width="150"
                  />
                  <img v-else src="../../assets/image.svg" width="150" />
                  <input 
                  @change="handleFileUpload"
                  class="block w-[400] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                  type="file"
                />
                </div>
                <div class="flex justify-center gap-2 items-center w-[80%] ">
               <div>
                  <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Name</label
                  >
                  <input
                    type="text"
                    v-model="product.name"
                    id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-72 p-2.5"
                    placeholder="Food"
                    required
                  />
                </div>
                <div class="">
                  <label
                    for="Discription"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Discription</label
                  >
                  <input
                    type="text"
                    v-model="product.discription"
                    id="Discription"
                    placeholder="The best food for your pet"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-72 p-2.5"
                    required
                  />
                </div>
            </div>
            <div class="flex justify-center items-center w-[80%] gap-2">
               <div>
                  <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Stock</label
                  >
                  <input
                    type="number"
                    v-model="product.stocke"
                    id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-72 p-2.5"
                    placeholder="Food"
                    required
                  />
                </div>
                <div class="">
                  <label
                    for="Discription"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Price</label
                  >
                  <input
                    type="number"
                    v-model="product.price"
                    id="Discription"
                    placeholder="The best food for your pet"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-72 p-2.5"
                    required
                  />
                </div>
            </div>
                </div>


                <button
                  data-modal-hide="product-modal"
                  type="submit"
                  class="w-[20%] b-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                  Done
                </button>
              </form>
        </div>
    </div>
</template>

<script>
const token = localStorage.getItem("token");
import axios from 'axios'
import SideBar from '../inc/SideBar.vue'
import Swal from 'sweetalert2'
export default {
  components: { SideBar },
  name : 'EditProduct',
  props: ['id'],
  data(){
    return{
        Productimage : '',
        product : {
            name : '',
            discription : '',
            image : [],
            stocke : '',
            price : '',
            id_categorie : '',
            id_pet : '',
        },
        categorie: [],
        pet: [],
        formData : new FormData()
    }
  },
  beforeMount(){
    this.getCategorie()
    this.getPet()
    this.getProduct()
  },
  methods:{
     getProduct(){
        axios
        .get("http://127.0.0.1:8000/api/products/"+ this.id, {
          headers: {
            Authorization: `Bearer ${token}`, // include the token in the headers of the API request
          },
        })
        .then((response) => {
          console.log(response.data)
          // set the authenticated state to true
          this.product.name = response.data.name
          this.product.discription = response.data.discription
          this.product.price = response.data.price
          this.product.stocke = response.data.stock
          this.product.id_categorie = response.data.id_categorie
          this.product.id_pet = response.data.id_pet
          this.Productimage = this.image(response.data.image)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
     },
     getCategorie(){
        console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/categories")
        .then((response) => {
          // set the authenticated state to true
          this.categorie = response.data.categories;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
     },
     getPet(){
        console.log('test')
        axios
          .get("http://127.0.0.1:8000/api/pets")
          .then((response) => {
            // set the authenticated state to true
            this.pet = response.data.pets;
          })
          .catch((error) => {
            console.log(error.response.data);
            // handle error response
          });
     },
     register() {
      const token = localStorage.getItem("token");
      console.log(this.product);
      this.formData.append("name", this.product.name);
      this.formData.append("discription", this.product.discription);
      this.formData.append("image", this.product.image);
      this.formData.append("price", this.product.price);
      this.formData.append("stock", this.product.stocke);
      this.formData.append("id_categorie", this.product.id_categorie);
      this.formData.append("id_pet", this.product.id_pet);
      this.formData.append('_method', 'PUT');
      console.log(this.formData);
        axios
          .post(`http://127.0.0.1:8000/api/products/update/${this.id}`, this.formData, {
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
              text: "Product updated succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.push('/Products')
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
        this.Productimage = reader.result;
        this.product.image = file;
        console.log(this.product.image);
      };
    },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
  },
  }
}
</script>

<style>

</style>