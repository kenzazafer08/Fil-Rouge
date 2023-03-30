<template>
  <div>
     <header-component></header-component>
     <div class="flex w-full items-center justify-between">
         <div class="flex flex-col justify-center items-center "> 
            <h5 class="font-extrabold text-5xl text-green-700 pl-8 w-full">Where your pets' happiness comes first - Shop with us!</h5>
            <p class="text-sm p-8 text-justify">Welcome to PetPlanet, your online destination for high-quality pet products. From food and treats to toys and accessories, we offer a wide range of items to keep your pets healthy and happy. Shop now and experience the convenience of fast shipping and exceptional customer service.</p>
            <button type="button" class="text-green-700 bg-white border-solid border-2 border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center">
                Discover
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1 text-green-700 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
         </div>
         <img src="../assets/bg.png" class="w-1/2"/>
     </div>
  </div>
</template>

<script>
import HeaderComponent from './inc/HeaderComponent.vue';
export default {
  name: 'HelloWorld',
  components :{HeaderComponent},
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
