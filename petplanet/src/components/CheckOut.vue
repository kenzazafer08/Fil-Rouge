<template>
  <div>
    <header-component></header-component>
    <div class="py-10 w-full bg-gray-100 min-h-[500px] flex justify-around items-start">
        <div class="w-[70%] bg-white rounded-lg shawod-lg h-[400px]">
          <p class="font-medium border-b w-full p-2 px-4">1. Adress</p>
          <p class="text-2xl font-light px-4 py-2">zafer Kenza</p>
          <div class="flex justify-around items-center"> 
            <div class="w-[45%]">
                <label for="adress" class="block mb-2 text-sm font-medium text-gray-900 ">Your adress</label>
                <input type="text" id="adress" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="70 RUE ELOUMAM QUE HOPITAL SAFI" required>
            </div>
            <div class="w-[45%]">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Your phone</label>
                <input type="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="+212 6 34 04 70 64" required>
            </div>
          </div>
          <p class="font-medium border-b w-full p-2 px-4 mt-4">2. Livraison</p>
          <div class="flex items-center mb-4">
                <input id="default-radio-1" type="radio" value="" name="default-radio" class="ml-4 w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 m-4 ">Livraison adomicile</label>
                <p class="text-sm font-light">Livraison entre 26 / 28 april</p>
           </div>
           <p class="font-medium border-b w-full p-2 px-4 mt-4">3. MODE DE PAIEMENT</p>
           <p class="font-ligth text-sm px-4 py-2">Paiement cash à la livraison</p>
           <p class="font-ligth text-sm px-4 pb-4">Payez en espèces dès que vous recevez votre commande.</p>
        </div>
        <div class="w-[20%] bg-white rounded-lg shawod-lg h-[300PX] px-2 py-4">
            <p class="text-sm font-medium border-b">Order Summary</p>
            <div class="flex justify-between p-2"><p>Total articls (1)</p><p>580 DH</p></div>
            <div class="flex justify-between p-2"><p>Frais de livraison</p><p>0 DH</p></div>
            <div class="flex justify-between p-2"><p>Total with Discount</p><p>574 DH</p></div>
            <div class="flex justify-between p-4 font-bold"><p>Total : </p><p>574 DH</p></div>
            <div class="flex justify-center"><button class="font-medium p-auto w-[90%] bg-green-700 rounded-sm shadow text-white py-4">Confirmer la commande</button></div>
        </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
export default {
  components: { HeaderComponent, FooterComponent },

}
</script>

<style>

</style>