<template>
    <div>
       <header-component></header-component>
       <div class="bg-white drop-shadow-xl drop-shadow-black h-16 w-full flex justify-between items-center"> 
          <p class="sm:ml-20 text-sm ml-4">Over 100 Post</p>
          <select class="text-sm text-black px-4 py-1 rounded-full sm:mr-20 bg-gray-50 border border-gray-300 focus:ring-green-500 focus:border-green-500">
            <option selected>Categorie : All</option>
            <option>Health</option>
            <option>Food</option>
            <option>Behaviors</option>
          </select>
       </div>
        <div class="my-10 grid sm:grid-cols-3 grid-cols-1 gap-4 w-full min-h-[500px] place-items-center"> 
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="h-56 w-[350px] rounded-0 overflow-hidden shadow bg-center" :style="{ backdropFilter: 'brightness(150%)', backgroundImage: 'url(' + require('../assets/bolg1.png') + ')' }">
          <div class="bg-black bg-opacity-50 h-full flex flex-col justify-end">
            <p class="p-4 mt-4 text-white text-2xl font-bold">How to Remove a Tick from a Dog</p>
            <a href="#" class="mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
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
  