<template>
  <div>
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
      <div class="flex justify-end w-full">
        <button
          data-modal-target="cat-modal"
          data-modal-toggle="cat-modal"
          class="focus:outline-none text-green-800 bg-white hover:bg-green-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-8 mr-2 mb-2 border border-green-700"
        >
          Add New categorie
        </button>
      </div>
      <!-- Main modal -->
      <div
        id="cat-modal"
        tabindex="-1"
        aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
      >
        <div class=" w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div
            id="test"
            class="relative bg-white rounded-lg shadow dark:bg-gray-700"
          >
            <button
              type="button"
              class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
              data-modal-hide="cat-modal"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
              <h3 class="mb-4 text-xl font-medium text-gray-900">
                Add new categorie
              </h3>
              <form class="space-y-6" @submit.prevent="register()">
                <div class="w-full flex justify-center">
                  <img
                    v-if="Catimage"
                    v-bind:src="Catimage"
                    alt="Placeholder Image"
                    width="200"
                  />
                  <img v-else src="../../assets/image.svg" width="200" />
                </div>
                <input
                  @change="handleFileUpload"
                  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                  type="file"
                />
                <div>
                  <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Name</label
                  >
                  <input
                    type="text"
                    v-model="cat.name"
                    id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="Food"
                    required
                  />
                </div>
                <div>
                  <label
                    for="Discription"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Discription</label
                  >
                  <input
                    type="Discription"
                    v-model="cat.discription"
                    id="Discription"
                    placeholder="The best food for your pet"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    required
                  />
                </div>
                <button
                  data-modal-hide="cat-modal"
                  type="submit"
                  class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                  Done
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Discription</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
              v-for="cat in categorie"
              :key="cat.id"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
              >
                <img
                  :src="'/uploads/' + cat.image"
                  class="w-32 h-32 rounded-full object-cover"
                />
              </th>
              <td class="px-6 py-4">
                {{ cat.name }}
              </td>
              <td class="px-6 py-4">
                {{ cat.discription }}
              </td>
              <td class="px-6 py-4">
                <router-link :to="{name : 'Editcategorie' , params:{ id : cat.id}}"
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
  </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";
import SideBar from "../inc/SideBar.vue";
export default {
  name: "DashboardComponent",
  components: { SideBar },
  data() {
    return {
      categorie: [],
      id : "",
      cat: {
        name: "",
        discription: "",
        image: [],
      },
      Catimage: "",
      formData: new FormData()
    };
  },
  mounted() {
    this.getAll();
  },
  methods: {
    getAll() {
      console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/categories")
        .then((response) => {
          // set the authenticated state to true
          this.categorie = response.data.categories;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    register() {
      const token = localStorage.getItem("token");
      console.log(this.cat);
      this.formData.set("name", this.cat.name);
      this.formData.set("discription", this.cat.discription);
      this.formData.set("image", this.cat.image);
      console.log(this.formData);
        axios
          .post("http://127.0.0.1:8000/api/categories/store", this.formData, {
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
              text: "Categorie registered succesfuly",
              icon: "success",
              confirmButtonColor: "#5D9C59",
              confirmButtonText: "Done",
            }).then((result) => {
              if (result.isConfirmed) {
                this.getAll();
                console.log(test);
              }
            });
          })
          .catch((error) => {
            console.log(error.response.data);
            // handle error response
          });
      },    
      handleFileUpload(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
        this.Catimage = reader.result;
        this.cat.image = file;
        console.log(this.cat.image);
      };
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
        .delete("http://127.0.0.1:8000/api/categories/delete/" + cat, {
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
    }
};
</script>

<style scoped>
/* #test {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
} */
</style>
