<template>
  <div>
    <header-component></header-component>
    <div class="py-10 w-full bg-gray-100 min-h-[500px] flex sm:flex-row flex-col sm:justify-around justify-center items-center sm:items-start items-start">
      <div class="sm:w-[30%] sm:mt-0 mt-4 w-[98%] bg-white rounded-lg shawod-lg h-[300PX] px-2 py-4 text-center">
            <div class="font-bold text-green-800 text-2xl"><p>{{user.name}}</p></div>
            <div class=""><p>{{ user.email }}</p></div>
            <div class="">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Your phone</label>
                <input v-model="user.phone" type="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="+212 6 34 04 70 64" required>
            </div>
            <div class="">
                <label for="adress" class="block mb-2 text-sm font-medium text-gray-900 ">Your adress</label>
                <input v-model="user.adress" type="text" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 " placeholder="+212 6 34 04 70 64" required>
            </div>   
            <div class="flex justify-center my-2"><button @click="Profile()" class="font-medium p-auto w-[90%] bg-green-700 rounded-sm shadow text-white py-4">Update Profile</button></div>     
          </div>
      <div v-if="orders.length > 0" class="sm:w-[65%] w-[98%] bg-white rounded-lg shawod-lg h-[400px]">    
        <div class="relative overflow-x-auto">
            <table class="mx-4 my-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Total Order
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Facture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cancel
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in orders" :key="order.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-2">
                          {{ order.order_line.length }} Items | {{order.total}} DH 
                        </th>
                        <td v-if="order.Status == null" class="px-6 py-4">
                            Processed
                        </td>
                        <td v-else-if="order.Status == 1" class="px-6 py-4">
                            Delivered
                        </td>
                        <td v-else-if="order.Status == 0" class="px-6 py-4">
                            Canceled
                        </td>
                        <td v-else class="px-6 py-4">
                            Recieved
                        </td>
                        <td class="px-6 py-4">
                            <button @click="download(order.id)" class="py-2 px-4 bg-gray-400 text-white">Download</button>
                        </td>
                        <td class="px-6 py-4">
                            <button @click="remove(order.id)" v-if="order.Status == null" class="text-red-800">Cancel</button>
                            <div v-else class="text-gray-800">Cancel</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

      </div>
        <div v-else  class="sm:w-[65%] w-[98%] bg-white rounded-lg shawod-lg h-[400px]"> 
          <div class="w-full flex justify-center items-center h-[40%] mt-10"><img src="../assets/cart-svgrepo-com.svg" class="w-32 h-32 mb-10 "/></div>
            <div class="text-center">
                <h2 class="font-bold text-2xl">Your have no order yet!</h2>
                <p class="my-4">Browse our categories and discover our best offers!</p>
                <router-link to="/shop" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Discover</router-link>
            </div>
        </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
const token = localStorage.getItem("token");
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
import Swal from 'sweetalert2';
export default {
  components: { HeaderComponent, FooterComponent },
  data(){
    return{
        user : {},
        orders : [],
        formData : new FormData()
    }
  },
  mounted(){
    this.getuser()
    this.getorders()
  },
  methods : {
    getuser(){
        axios.get('http://127.0.0.1:8000/api/user/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => { // set the authenticated state to true
          this.user = response.data; 
          console.log(this.user)// set the user data
        })
        .catch(error => {
          console.log(error.data);
          // handle error response
        });
    },

    getorders(){
      axios.get('http://127.0.0.1:8000/api/order/user/', {
          headers: {
            Authorization: `Bearer ${token}` // include the token in the headers of the API request
          }
        })
        .then(response => { // set the authenticated state to true
          this.orders = response.data.orders; 
          console.log(this.orders)// set the user data
        })
        .catch(error => {
          console.log(error.data);
          // handle error response
        });
    },

    Profile(){
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
          console.log(this.user)
          Swal.fire({
              title: "Done",
              text: "Profil updated succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            })
        })
        .catch(error => {
          console.log(error.data);
        });
    },
    download(id){
      axios.get('http://127.0.0.1:8000/api/order/' + id, { responseType: 'blob' }).then(response => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', 'facture.pdf');
          document.body.appendChild(link);
          link.click();
        });
    },
    remove(id) {
      Swal.fire({
        title: "Ok",
        text: "You are sure you wanna cancel this order",
        icon: "warning",
        confirmButtonColor: "#5D9C59",
        confirmButtonText: "Yes I'm sure",
        showCancelButton: true,
        cancelButtonColor: "#d33",
      }).then((result) => {
        if (result.isConfirmed) {
          this.destroy(id);
        }
      });
    }
    ,
    destroy(id){
      axios.delete('http://127.0.0.1:8000/api/order/delete/' + id,  {
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
              text: "Order canceled succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.getorders()
                console.log(test);
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
          });
       }
    }
}
</script>

<style>

</style>