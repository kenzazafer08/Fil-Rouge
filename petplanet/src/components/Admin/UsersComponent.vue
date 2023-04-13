<template>
  <div>
    <side-bar></side-bar>
    <div class="pl-4 pt-20 sm:ml-64 mt-20">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3">Role</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
              v-for="user in users"
              :key="user.id"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
              >
                {{ user.name }}
              </th>
              <td class="px-6 py-4">
                {{ user.email }}
              </td>
              <td class="px-6 py-4" >
                  <p v-if="user.role == '0'">Client</p>
                  <p v-if="user.role == '1'">Admin</p>
                  <p v-if="user.role == '2'">Author</p>
              </td>
              <td class="px-6 py-4">
                <button @click.prevent="change(user.id)"
                  class="pl-2 font-medium text-green-600 hover:underline"
                >
                  Change Role
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2';
const token = localStorage.getItem("token");
import SideBar from '../inc/SideBar.vue'
import axios from 'axios'
export default {
  components: { SideBar },
name : 'UsersComponent',
component : {SideBar},
data(){
    return{
        users : [],
        user : {
            name : '',
            email : '',
            role : '',
        },
        formData : new FormData()
    }
},
mounted(){
    this.getAll()
},
methods : {
    getAll(){
      console.log('test')
      axios
        .get("http://127.0.0.1:8000/api/users",{
            headers: {
              "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}` // include the token in the headers of the API request
            }
          })
        .then((response) => {
            console.log(response.data)
          // set the authenticated state to true
          this.users = response.data.users;
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    change(id){ 
        axios
        .get("http://127.0.0.1:8000/api/user/"+id,{
            headers: {
              "Content-Type": "multipart/form-data",
              Authorization: `Bearer ${token}` // include the token in the headers of the API request
            }
          })
        .then((response) => {
            console.log(response.data)
            this.user.name = response.data.name
            this.user.email = response.data.email
            this.user.role = response.data.role
            console.log(this.user.name)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
        Swal.fire({
            title : `Change ${this.user.name} role`,
            html :`
                <select id="role" class="swal2-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                <option selected>Choose a role</option>
                <option value="1">Admin</option>
                <option value="2">Author</option>
                <option value="0">Client</option>
                </select>
                `,
                icon: "info",
                confirmButtonColor: "#5D9C59",
                confirmButtonText: 'Done',
                showCancelButton: true,
        }).then(result => {
            if (result.isConfirmed) {
            const role = Swal.getPopup().querySelector('#role').value
                console.log(role);
                this.formData.set("role", role);
                this.formData.append('_method', 'PUT');
                axios.post("http://127.0.0.1:8000/api/author/store/"+id,this.formData,{
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
            text: "User role changed succesfuly",
            icon: "succes",
            confirmButtonColor: "#5D9C59",
            confirmButtonText: "Done",
          }).then((result) => {
            if (result.isConfirmed) {
              console.log("test");
            }
          })
    }})
    }
}
}
</script>

<style>

</style>