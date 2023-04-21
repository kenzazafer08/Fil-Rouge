<template>
  <div>
    <header-component></header-component>
    <div class="py-10 w-full bg-gray-100 min-h-[500px] flex sm:flex-row flex-col sm:justify-around justify-center items-center sm:items-start items-start">
        <div class="sm:w-[70%] w-[98%] bg-white rounded-lg shawod-lg h-[400px]">
          <p class="font-medium border-b w-full p-2 px-4">1. Adress</p>
          <p class="text-2xl font-light px-4 py-2">{{ user.name }}</p>
          <div class="flex justify-around items-center"> 
            <div class="sm:w-[45%] ">
                <label for="adress" class="block mb-2 text-sm font-medium text-gray-900 ">Your adress</label>
                <input v-model="user.adress" type="text" id="adress" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="70 RUE ELOUMAM QUE HOPITAL SAFI" required>
            </div>
            <div class="w-[45%]">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Your phone</label>
                <input v-model="user.phone" type="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="+212 6 34 04 70 64" required>
            </div>
          </div>
          <p class="font-medium border-b w-full p-2 px-4 mt-4">2. Livraison</p>
          <div class="flex items-center mb-4">
                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 m-4 px-4">Livraison adomicile</label>
                <p class="text-sm font-light">Dans deux jours</p>
           </div>
           <p class="font-medium border-b w-full p-2 px-4 mt-4">3. MODE DE PAIEMENT</p>
           <p class="font-ligth text-sm px-4 py-2">Paiement cash à la livraison</p>
           <p class="font-ligth text-sm px-4 pb-4">Payez en espèces dès que vous recevez votre commande.</p>
        </div>
        <div class="sm:w-[20%] sm:mt-0 mt-4 w-[98%] bg-white rounded-lg shawod-lg h-[300PX] px-2 py-4">
            <p class="text-sm font-medium border-b">Order Summary</p>
            <div class="flex justify-between p-2"><p>Total articls ({{ count.number }})</p><p>{{ count.total1 }} DH</p></div>
            <div class="flex justify-between p-2"><p>Frais de livraison</p><p>{{ count.livraison }} DH</p></div>
            <div class="flex justify-between p-2"><p>Total with Discount</p><p>{{ count.discount }} DH</p></div>
            <div class="flex justify-between p-4 font-bold"><p>Total : </p><p>{{ count.discount }} DH</p></div>
            <div class="flex justify-center"><button @click="checkout()" class="font-medium p-auto w-[90%] bg-green-700 rounded-sm shadow text-white py-4">Confirmer la commande</button></div>
        </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
const token = localStorage.getItem('token'); // get the token from the local storage
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
export default {
  components: { HeaderComponent, FooterComponent },
  data(){
    return {
        user : {},
        cart : {},
        count : {},
        total : 0,
        formData : new FormData()
    }
  },
  mounted (){
    this.getUser()
    this.getCount()
    this.getCart()
  },
  methods : {
    checkout(){
        this.formData.append('adress',this.user.adress)
        this.formData.append('phone',this.user.phone)
        console.log(this.user.adress,this.user.phone)
        const token = localStorage.getItem('token')
        axios.post('http://127.0.0.1:8000/api/user/update',this.formData,{
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        }).then(response => {
          this.user = response.data.user;
        })
        .catch(error => {
          console.log(error.data);
        });
        this.formData.append('total',this.count.discount),
        this.formData.append('order_lines',JSON.stringify(this.cart)),
        axios.post('http://127.0.0.1:8000/api/order/store/',this.formData,{
            headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        }).then(response => {
            console.log(response.data)
            this.$router.push('/cart')
            const order = response.data.order;
            axios.get('http://127.0.0.1:8000/api/order/' + order.id, { responseType: 'blob' }).then(response => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'facture.pdf');
                document.body.appendChild(link);
                link.click();
            });
        }).catch(error => console.log(error.data))
    },
    getCart(){
        axios.get('http://127.0.0.1:8000/api/cart/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
          this.cart = response.data.cart;
        })
        .catch(error => {
          console.log(error.data);
        });
    }, 
    getCount(){
        console.log(this.authenticated)
        axios.get('http://127.0.0.1:8000/api/cart/count/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
          this.authenticated = true; // set the authenticated state to true
          this.count.number = response.data.count; 
          this.count.total1 = response.data.total;
          this.count.total = response.data.total;
          console.log(response.data.count);
          if(response.data.total > 200){
            this.count.livraison = 0
          }else{
            this.count.livraison = 20
          }
          this.count.total = this.count.total + this.count.livraison;
          if(this.count.total > 300){
            this.count.discount = this.count.total - this.count.total* 0.01
          }
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
    getUser(){
        axios.get('http://127.0.0.1:8000/api/user/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => {
             // set the authenticated state to true
          this.user = response.data; 
          console.log(response.data)
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
}
</script>

<style>

</style>