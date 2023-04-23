<template>
  <div>
     <header-component></header-component>
     <div class="flex w-full items-center justify-between">
         <div class="flex flex-col sm:justify-center items-center "> 
            <h5 class="sm:mt-0 mt-8 font-extrabold sm:text-5xl text-4xl text-green-700 pl-8 w-full ">Where your pets' happiness comes first - Shop with us!</h5>
            <p class="text-sm p-8 text-justify">Welcome to PetPlanet, your online destination for high-quality pet products. From food and treats to toys and accessories, we offer a wide range of items to keep your pets healthy and happy. Shop now and experience the convenience of fast shipping and exceptional customer service.</p>
            <button type="button" class="text-green-700 bg-white border-solid border-2 border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center">
                Discover
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1 text-green-700 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
         </div>
         <img src="../assets/bg.png" class="hidden sm:flex w-1/2"/>
     </div>
     <div class="w-full"> 
         <p class="text-center text-2xl m-10">New products</p>
         <div class="flex flex-col sm:flex-row justify-between items-center m-2"> 
              <div v-for="(item,index) in firstProducts" :key="index" class="flex flex-col justify-around items-center"> 
                 <img :src="image(item.image)"/>
                 <p>{{item.name}}</p>
                 <p>{{item.price}}د.م.Price</p>
              </div>
              <img class="sm:block hidden" src="../assets/Rectangle.png"/>
         </div>
         <div class="flex flex-col sm:flex-row justify-between items-center m-2"> 
          <img class="sm:block hidden" src="../assets/Rectangle8.png"/>
          <div v-for="(item,index) in secondProducts" :key="index" class="flex flex-col justify-around items-center"> 
                 <img :src="image(item.image)"/>
                 <p>{{item.name}}</p>
                 <p>{{item.price}}د.م.Price</p>
              </div>
         </div>
     </div>
     <div class="w-full"> 
      <p class="text-center text-2xl m-10">Shop By Pet</p>
      <div class="grid sm:grid-cols-6 gap-4 grid-cols-1 place-items-center h-sceen"> 
         <div v-for="pet in pets" :key="pet.id" class="flex flex-col items-center justify-around"> 
           <img :src="image(pet.image)"/>
           <p>{{pet.name}}</p>
         </div>
      </div>
     </div>
     <div class="w-full text-white bg-black text-center my-10 p-2">Free delivery from 200 Dhs of accumulated purchases</div>
     <div class="w-full my-10"> 
      <p class="text-center text-2xl m-10">Shop By Categories</p>
      <div class="grid sm:grid-cols-3 gap-4 grid-cols-1 place-items-center h-sceen"> 
         <div v-for="cat in categories"
              :key="cat.id"  class="flex flex-col items-center justify-center bg-yellow-100 border-2 border-amber-200 w-64 h-56 rounded-2xl"> 
           <img :src="image(cat.image)"/>
           <p class="font-bold">{{cat.name}}</p>
         </div>
      </div>
     </div>
     <div class="w-full text-white bg-black text-center my-10 p-2">Benefit from a 10% discount on accumulated purchases from 300dh.</div>
     <div class="w-full my-10"> 
      <p class="text-center text-2xl m-10">What's happening</p>
      <div class="flex flex-col sm:flex-row justify-center gap-24 items-center">    
        <div v-for="post in posts" :key="post.id" class="h-56 sm:w-1/3 w-2/3 rounded-2xl overflow-hidden shadow bg-center " :style="{ backdropFilter: 'brightness(150%)' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">{{ post.Title }}</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              <router-link :to="{name : 'PostComponentVue' , params:{id : post.id }}"
                >
                  Read
                </router-link>              
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
     </div>
     <footer-component></footer-component>
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from './inc/HeaderComponent.vue';
import FooterComponent from './inc/FooterComponent.vue';
export default {
  name: 'HelloWorld',
  components :{HeaderComponent,FooterComponent},
  data() {
    return {
      categories : [],
      pets : [],
      products : [],
      posts : []
    }
  },
  mounted(){
    this.getCategories()
    this.getPets()
    this.getProducts()
    this.getPosts()
  },
  computed: {
    firstProducts() {
      return this.products.filter((item, index) => index < 3);
    },
    secondProducts() {
      return this.products.filter((item, index) => index >= 3);
    },
  },
  methods : {
    getPosts(){
      axios
        .get("http://127.0.0.1:8000/api/randomposts")
        .then((response) => {
          // set the authenticated state to true
          this.posts = response.data.posts;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
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
    },
    getProducts(){
      axios
        .get("http://127.0.0.1:8000/api/random")
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
   }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
