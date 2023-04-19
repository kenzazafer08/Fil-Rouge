<template>
    <div>
       <header-component></header-component>
       <div class="bg-white drop-shadow-xl drop-shadow-black h-16 w-full flex justify-between items-center"> 
          <p class="sm:ml-20 text-sm ml-4">Over 100,000 results for "shopping"</p>
          <select @change.prevent="product()" v-model="price" class="text-sm text-black px-4 py-1 rounded-full sm:mr-20 bg-gray-50 border border-gray-300 focus:ring-green-500 focus:border-green-500">
            <option value="0" selected>Sort By : Featured</option>
            <option value="1">Price Low to Hight</option>
            <option value="2">Price Hight to Low</option>
          </select>
       </div>
        <div class="flex w-full justify-between"> 
             <div class="w-[20%] p-4 ml-4">
              <div>
                <label class="font-bold">Pet</label>  
                <fieldset class="p-2">
                  <legend class="sr-only">Checkbox variants</legend>

                  <div v-for="item in pets" :key="item.id" class="flex items-center mb-4">
                    <input
                      :id="'checkbox-' + item.id"
                      type="checkbox"
                      class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      v-model="checkedPets"
                      :value="item.id"
                    >
                    <label :for="'checkbox-' + item.id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ item.name }}</label>
                  </div>

                </fieldset>
              </div>
              <div>
                <label class="font-bold">Categorie</label>  
                <fieldset class="p-2">
                  <legend class="sr-only">Checkbox variants</legend>

                  <div v-for="item in categories" :key="item.id" class="flex items-center mb-4">
                      <input :id="'checkbox-'+ item.id" v-model="checkedCat"
                      :value="item.id" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                      <label :for="'checkbox-1'+ item.id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ item.name }}</label>
                  </div>

                </fieldset>
              </div>

             </div>
             <div class="h-min-screen text-center w-[75%] sm:mr-10 mr-0 grid sm:grid-cols-3 grid-cols-1 gap-8 p-0">
              <div v-for="item in products" :key="item.id" class="m-10 flex flex-col items-center"> 
                 <img :src="image(item.image)"/>
                 <router-link :to="{name : 'Detailproduct' , params:{id : item.id }}">{{ item.name }}<br/>{{ item.price}}د.م.Price
                 </router-link>
              </div>
             </div>
        </div>
       <footer-component></footer-component>
    </div>

  </template>
  
  <script>
  const token = localStorage.getItem("token");
  import axios from 'axios';
  import HeaderComponent from './inc/HeaderComponent.vue';
  import FooterComponent from './inc/FooterComponent.vue';
  import Swal from 'sweetalert2';
  export default {
    name: 'ShopComponent',
    components :{HeaderComponent,FooterComponent},
    data() {
      return {
        categories : [],
        pets : [],
        products : [],
        checkedPets : [],
        checkedCat : [],
        price : 0,
        formData : new FormData()
      }
    },
    mounted(){
    this.getCategories()
    this.getPets()
    this.getProducts()
   },
   watch: {
    checkedPets: {
      handler: 'onCheckedItemsChange',
      deep: true,
    },checkedCat: {
      handler: 'onCheckedItemsChange',
      deep: true,
    }
  },
   methods : {
    add(id,prix){
      console.log(this.product);
      this.formData.append("quantity", 1);
      this.formData.append("prix_q", prix);
      console.log(this.formData);
      if(token){
        axios
          .post("http://127.0.0.1:8000/api/cart/store/" + id, this.formData, {
            headers: {
              "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}`, // include the token in the headers of the API request
            },
            timeout: 5000, // add a timeout of 5 seconds
          })
          .then((response) => {
            response.data;
            Swal.fire({
              title: "Thank You",
              text: "Product added succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.push('/Cart')
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
          });
      }else {
        Swal.fire({
              title: "Warning",
              text: "LogIn first",
              icon: "warning",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result)=>{
              console.log(result)
              this.comment = ''
              this.value = 0
            })
      }
    },
    getCategories(){
      console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/categories")
        .then((response) => {
          // set the authenticated state to true
          this.categories = response.data.categories;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    getPets(){
      console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/pets")
        .then((response) => {
          // set the authenticated state to true
          this.pets = response.data.pets;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },product(){
      if(this.price == 0){
        this.getProducts()
      }else{
        axios
        .get("http://127.0.0.1:8000/api/price/"+this.price)
        .then((response) => {
          // set the authenticated state to true
          this.products = response.data.products;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
      }
    },
    getProducts(){
      axios
        .get("http://127.0.0.1:8000/api/products/")
        .then((response) => {
          // set the authenticated state to true
          this.products = response.data.products;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
   },
   onCheckedItemsChange() {
      console.log('Checked Items:', this.checkedPets);
      // Call your function here
      if(this.checkedPets.length === 0 && this.checkedCat.length === 0){
        this.getProducts()
      }else{
        axios
        .post("http://127.0.0.1:8000/api/filter/", {pet : this.checkedPets,
        cat : this.checkedCat})
        .then((response) => {
          // set the authenticated state to true
          this.products = response.data.products;

          console.log(this.products)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
      }
      
    },   
    onCheckedCatChange() {
      console.log('Checked Items:', this.checkedCat);
      // Call your function here
      if(this.checkedCat.length === 0){
        this.getProducts()
      }else{
        axios
        .post("http://127.0.0.1:8000/api/catfilter/", this.checkedCat)
        .then((response) => {
          // set the authenticated state to true
          this.products = response.data.products;

          console.log(this.products)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
      }
      
    },
  },
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  