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
     <div class="w-full h-screen"> 
         <p class="text-center text-2xl m-10">New products</p>
         <div class="flex flex-col sm:flex-row justify-between items-center m-2"> 
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image.png"/>
                 <p>Home Divine Martin Sellier</p>
                 <p>799,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image(1).png"/>
                 <p>Dog treat dispenser - Martin Sellier</p>
                 <p>299,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image(2).png"/>
                 <p>Martin Sellier Black Cricket Basket</p>
                 <p>349,00د.م.Price</p>
              </div>
              <img class="sm:block hidden" src="../assets/Rectangle.png"/>
         </div>
         <div class="flex flex-col sm:flex-row justify-between items-center m-2"> 
          <img class="sm:block hidden" src="../assets/Rectangle8.png"/>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7.png"/>
                 <p>Aboistop Electro - Barking control collar</p>
                 <p>1.199,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7(1).png"/>
                 <p>Ownat Grain Free Prime Adult Chicken & Turkey 12kg</p>
                 <p>580,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7(2).png"/>
                 <p>Trixie folding metal cage S / M-L</p>
                 <p>990,00د.م.Price</p>
              </div>
         </div>
     </div>
     <div class="w-full"> 
      <p class="text-center text-2xl m-10">Shop By Pet</p>
      <div class="flex flex-wrap gap-4"> 
         <img class="w-32 h-32 rounded-full border-2 border-green-700" src=""/> 
      </div>
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
