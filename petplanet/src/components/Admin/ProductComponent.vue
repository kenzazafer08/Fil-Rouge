<template>
  <di>
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
      <div class="flex justify-end w-full">
        <router-link to="/Addproduct"
          class="focus:outline-none text-green-800 bg-white hover:bg-green-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-8 mr-2 mb-2 border border-green-700"
        >
          Add New product
        </router-link>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Discription</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Stock</th>
              <th scope="col" class="px-6 py-3">Ctegorie</th>
              <th scope="col" class="px-6 py-3">Pet</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
              v-for="product in products"
              :key="product.id"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
              >
                <img
                :src="image(product.image)"
                  class="w-32 h-32 rounded-full object-cover"
                />
              </th>
              <td class="px-6 py-4">
                {{ product.name }}
              </td>
              <td class="px-6 py-4">
                {{ product.discription }}
              </td>
              <td class="px-6 py-4">
                {{ product.price }} DH
              </td>
              <td class="px-6 py-4">
                {{ product.stock }}
              </td>
              <td class="px-6 py-4">
                {{ product.pcategorie.name }}
              </td>
              <td class="px-6 py-4">
                {{ product.pet.name }}
              </td>
              <td class="px-6 py-4">
                <router-link :to="{name : 'Editcategorie' , params:{id : product.id }}"
                  class="pl-2 font-medium text-green-600 hover:underline"
                >
                  Edit
                </router-link>
                <a
                  href="#"
                  class="pl-2 font-medium text-green-600 hover:underline"
                  @click.prevent="confirmDelete(cat.id)"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </di>
</template>

<script>
import axios from 'axios'
import SideBar from '../inc/SideBar.vue'
// import Swal from 'sweetalert2'
export default {
  components: { SideBar },
  data(){
    return{
      products : [],
      id : "",
      product: {
        name: "",
        discription: "",
        image: [],
        stock : '',
        price : '',
        id_categorie : '',
        id_pet : ''
      },
      Catimage: "",
      formData: new FormData()
    }
  },
  mounted() {
    this.getAll();
  },
  methods : {
    getAll(){
        console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/products")
        .then((response) => {
          // set the authenticated state to true
          this.products = response.data.products;
          console.log(response.data.products)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
  }
  }
}
</script>

<style>

</style>