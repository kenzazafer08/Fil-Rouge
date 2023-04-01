<template>
    <div>
       <header-component></header-component>
       <div class="bg-white drop-shadow-xl drop-shadow-black h-16 w-full flex justify-between items-center"> 
          <p class="sm:ml-20 text-sm ml-4">Over 100,000 results for "shopping"</p>
          <select class="text-sm text-black px-4 py-1 rounded-full sm:mr-20 bg-gray-50 border border-gray-300 focus:ring-green-500 focus:border-green-500">
            <option selected>Sort by : Featured</option>
            <option>Price Low to Hight</option>
            <option>Price Hight to Low</option>
          </select>
       </div>
        <div class="h-screen"> 

        </div>
       <footer-component></footer-component>
    </div>

  </template>
  
  <script>
  import HeaderComponent from './inc/HeaderComponent.vue';
  import FooterComponent from './inc/FooterComponent.vue';
  export default {
    name: 'HelloWorld',
    components :{HeaderComponent,FooterComponent},
    data() {
      return {
      }
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  