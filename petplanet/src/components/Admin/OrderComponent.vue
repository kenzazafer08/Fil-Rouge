<template>
  <div>
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">User</th>
              <th scope="col" class="px-6 py-3">Total</th>
              <th scope="col" class="px-6 py-3">Status</th>
              <th scope="col" class="px-6 py-3">Download</th>
              <th scope="col" class="px-6 py-3">Details</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
              v-for="order in orders"
              :key="order.id"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
              >
                {{ order.user.name }}
              </th>
              <td class="px-6 py-4">
                {{ order.total }} DH
              </td>
              <td class="px-6 py-4 flex" v-if="order.Status == null">
                <button @click="prove(order.id,1)" class="p-4"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Interface / Check_All">
                    <path id="Vector" d="M8 12.4854L12.2426 16.728L20.727 8.24268M3 12.4854L7.24264 16.728M15.7279 8.24268L12.5 11.5001" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    </svg>
                </button>
                <button @click="cancel(order.id,0)" class="p-4"><svg width="20px" height="20px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>cancel</title>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="work-case" fill="#000000" transform="translate(91.520000, 91.520000)">
                                <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48">

                    </polygon>
                            </g>
                        </g>
                    </svg>
                </button>
              </td>
              <td class="px-6 py-4 flex text-red-700 items-center" v-else-if="order.Status == 0">
                Canceled
              </td>
              <td @click="deliver(order.id,2)" class="px-6 py-4 flex justify-center text-green-700" v-else-if="order.Status == 1">
                <button class="">Delivered</button>
              </td>
              <td class="px-6 py-4 flex items-center text-green-700 font-bold" v-else>
                Recieved
              </td>
              <td class="px-6 py-4">
                <button @click="download(order.id)" class="py-2 px-4 bg-gray-400 text-white">Download</button>
              </td>
              <td class="px-6 py-4">
                <router-link :to="{name : 'OrderDetails' , params:{id : order.id }}"
                  class="pl-2 font-medium text-green-600 hover:underline"
                >
                  Show
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
const token = localStorage.getItem('token')
import axios from 'axios'
import SideBar from '../inc/SideBar.vue'
import Swal from 'sweetalert2'
export default {
  components: { SideBar },
  data(){
    return{
        orders : [],
        FormData : new FormData()
    }
  },
  mounted(){
    this.getAll()
  },
  methods: {
    getAll(){
        console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/order",{
          headers: {
            Authorization: `Bearer ${token}`, // include the token in the headers of the API request
          },
        })
        .then((response) => {
          // set the authenticated state to true
          this.orders = response.data.orders;
          console.log(response.data.orders)
        })
        .catch((error) => {
          console.log(error.data);
          // handle error response
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
    status(id,status){
        this.FormData.append('status',status);
        console.log(status)
        axios.post(`http://127.0.0.1:8000/api/order/${id}/status/`,this.FormData,{
            headers: {
            Authorization: `Bearer ${token}`, // include the token in the headers of the API request
          },
        }).then(result => {
            console.log(result.data)
            this.getAll()
        })
    },
    prove(id,status) {
      Swal.fire({
        title: "Ok",
        text: "You are sure you wanna valide this order",
        icon: "warning",
        confirmButtonColor: "#5D9C59",
        confirmButtonText: "Yes I'm sure",
        showCancelButton: true,
        cancelButtonColor: "#d33",
      }).then((result) => {
        if (result.isConfirmed) {
          this.status(id,status);
        }
      });
    },
    cancel(id,status) {
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
          this.status(id,status);
        }
      });
    },
    deliver(id,status) {
      Swal.fire({
        title: "Ok",
        text: "This Order is delivered !",
        icon: "warning",
        confirmButtonColor: "#5D9C59",
        confirmButtonText: "Yes I'm sure",
        showCancelButton: true,
        cancelButtonColor: "#d33",
      }).then((result) => {
        if (result.isConfirmed) {
          this.status(id,status);
        }
      });
    }
  }

}
</script>

<style>

</style>