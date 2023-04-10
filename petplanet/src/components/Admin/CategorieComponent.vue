<template>
  <div> 
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Discription
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" v-for="cat in categorie" :key="cat.id">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <img src="" />{{ cat.image }}
                </th>
                <td class="px-6 py-4">
                  {{ cat.name }}
                </td>
                <td class="px-6 py-4">
                  {{ cat.discription }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                    <a href="#" class="pl-2 font-medium text-blue-600  hover:underline">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../inc/SideBar.vue';
export default {
    name: 'DashboardComponent',
    components :{SideBar},
    data(){
      return{
        categorie : []
      }
    },
    mounted(){
      this.getAll();
    },
    methods : {
        getAll(){
          axios.get('http://127.0.0.1:8000/api/categories')
          .then(response => {// set the authenticated state to true
          this.categorie = response.data.categories;
          console.log(this.categorie); 
        })
        .catch(error => {
          console.log(error.response.data);
          // handle error response
        });
        }
    }
}
</script>

<style>

</style>