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
              <th scope="col" class="px-6 py-3">Replenich</th>
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
                  class="w-32 h-24 object-cover"
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
                <router-link :to="{name : 'EditProduct' , params:{id : product.id }}"
                  class="pl-2 font-medium text-green-600 hover:underline"
                >
                  Edit
                </router-link>
                <a
                  href="#"
                  class="pl-2 font-medium text-green-600 hover:underline"
                  @click.prevent="confirmDelete(product.id)"
                  >Delete</a
                >
              </td>
              <td class="px-6 py-4">
                <button @click.prevent="change(product.id)"
                  class="pl-2 font-medium text-green-600 hover:underline"
                  >Replenish</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </di>
</template>

<script>
const token = localStorage.getItem("token");
import axios from 'axios'
import SideBar from '../inc/SideBar.vue'
import Swal from 'sweetalert2'
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
  beforeMount() {
    this.getAll();
  },
  methods : {
    getAll(){
        console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/stock")
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
  },    
   confirmDelete(cat) {
      Swal.fire({
        title: "Ok",
        text: "You are sure you wanna delete this categorie",
        icon: "warning",
        confirmButtonColor: "#5D9C59",
        confirmButtonText: "Yes I'm sure",
        showCancelButton: true,
        cancelButtonColor: "#d33",
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteCategory(cat);
        }
      });
    },
    deleteCategory(cat) {
      const token = localStorage.getItem("token");
      axios
        .delete("http://127.0.0.1:8000/api/products/delete/" + cat, {
          headers: {
            Authorization: `Bearer ${token}`, // include the token in the headers of the API request
          },
        })
        .then((response) => {
          console.log(response);
          Swal.fire({
            title: "Done",
            text: "Categorie Deleted succesfuly",
            icon: "succes",
            confirmButtonColor: "#5D9C59",
            confirmButtonText: "Done",
          }).then((result) => {
            if (result.isConfirmed) {
              this.getAll();
              console.log("test");
            }
          });
        })
        .catch((error) => {
          console.log(error.response.data);
        });
      },
      change(id){
        Swal.fire({
            title : `Replinish`,
            input: 'number',
            inputLabel: 'Add to stock',
            inputValue: 10,
            icon: "info",
            confirmButtonColor: "#5D9C59",
            confirmButtonText: 'Done',
            showCancelButton: true,
        }).then(result => {
          if (result.value) {
          console.log(result.value);
          this.formData.set("stock", result.value);
          this.formData.append('_method', 'PUT');
          axios.post("http://127.0.0.1:8000/api/products/addstock/"+id,this.formData,{
          headers: {
          "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}` // include the token in the headers of the API request
                    }
                }).then((response) => {
                    console.log(response.data)
                })
                .catch((error) => {
                console.log(error.response.data);
                });
            console.log(result)
            this.getAll();
            Swal.fire({
            title: "Done",
            text: "Stock replenished succesfuly",
            icon: "succes",
            confirmButtonColor: "#5D9C59",
            confirmButtonText: "Done",
          }).then((result) => {
            if (result.isConfirmed) {
              console.log("test");
              this.getAll()
            }
          })
    }})
      }
  }
}
</script>

<style>

</style>