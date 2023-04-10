<template>
    <div>
       <header-component></header-component>
       <div class="bg-white drop-shadow-xl drop-shadow-black h-16 w-full flex justify-between items-center"> 
          <p class="sm:ml-20 text-sm ml-4">Over 100,000 results for "shopping"</p>
          <select class="text-sm text-black px-4 py-1 rounded-full sm:mr-20 bg-gray-50 border border-gray-300 focus:ring-green-500 focus:border-green-500">
            <option selected>Sort by : Featured</option>
            <option>Price Low to Hight</option>
            <option>Price Hight to Low</option>
            <option>Avg Customers reviews</option>
            <option>Best Seller</option>
          </select>
       </div>
        <div class="flex w-full justify-between"> 
             <div class="w-[20%] p-4 ml-4">
              <div>
                <label class="font-bold">Pet</label>  
                <fieldset class="p-2">
                  <legend class="sr-only">Checkbox variants</legend>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                      <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cat</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dog</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fish</label>
                  </div>
                  
                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reptile</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bird</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Small pet</label>
                  </div>
                </fieldset>
              </div>
              <div>
                <label class="font-bold">Categorie</label>  
                <fieldset class="p-2">
                  <legend class="sr-only">Checkbox variants</legend>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                      <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Food</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wellness</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Accesorries</label>
                  </div>
                </fieldset>
              </div>
              <div> 
                <label class="font-bold">Price</label>
                <fieldset class="p-2">
                  <legend class="sr-only">Checkbox variants</legend>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                      <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Up to 100DH</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">100DH to 500DH</label>
                  </div>

                  <div class="flex items-center mb-4">
                      <input id="checkbox-3" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">500DH & Above</label>
                  </div>
                </fieldset>
              </div>
             </div>
             <div class="text-center w-[75%] sm:mr-10 mr-0 grid sm:grid-cols-3 grid-cols-1 gap-8 p-0 sm:items-center items-place-center">
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7.png"/>
                 <p>Aboistop Electro - Barking control collar<br/>1.199,00د.م.Price</p>
                 <p></p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7(1).png"/>
                 <p>Ownat Grain Free Prime Adult Chicken & Turkey 12kg<br/>580,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image7(2).png"/>
                 <p>Trixie folding metal cage S / M-L<br/>990,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image.png"/>
                 <p>Home Divine Martin Sellier<br/>799,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image(1).png"/>
                 <p>Dog treat dispenser - Martin Sellier<br/>299,00د.م.Price</p>
              </div>
              <div class="flex flex-col justify-around items-center"> 
                 <img src="../assets/image(2).png"/>
                 <p>Martin Sellier Black Cricket Basket<br/>349,00د.م.Price</p>
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
    name: 'ShopComponent',
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
  