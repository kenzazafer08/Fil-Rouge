<template>
  <div> 
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Discription</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Quantity</th>
              <th scope="col" class="px-6 py-3">Categorie</th>
              <th scope="col" class="px-6 py-3">Pet</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
              v-for="product in order.order_line"
              :key="product.id"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
              >
                <img
                :src="image(product.product.image)"
                  class="w-32 h-24 object-cover"
                />
              </th>
              <td class="px-6 py-4">
                {{ product.product.name }}
              </td>
              <td class="px-6 py-4">
                {{ product.product.discription }}
              </td>
              <td class="px-6 py-4">
                {{ product.prix_q }} DH
              </td>
              <td class="px-6 py-4">
                {{ product.quantity }}
              </td>
              <td class="px-6 py-4">
                {{ product.product.pcategorie.name }}
              </td>
              <td class="px-6 py-4">
                {{ product.product.pet.name }}
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
export default {
  components: { SideBar },
  name : 'OrderDetails',
  props: ['id'],  
  data(){
    return{
        order : {}
    }
  },
  mounted(){
    console.log('test')
    console.log(this.id)
    this.getOrder(this.id)
  },
  methods: {
    getOrder(orderId) {
    console.log('hi')
    axios.get(`http://127.0.0.1:8000/api/order/${orderId}/show`, {
        headers: {
            Authorization: `Bearer ${token}`
        }
    })
    .then(response => {
        // handle success response
        console.log(response.data);
        this.order = response.data.order
        console.log()
    })
    .catch(error => {
        // handle error response
        console.log(error.response.data);
    });
   },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
  },
  }
}
</script>

<style>

</style>