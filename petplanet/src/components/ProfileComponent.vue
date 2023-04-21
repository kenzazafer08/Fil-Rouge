<template>
  <div>
    <header-component></header-component>
    <footer-component></footer-component>
  </div>
</template>

<script>
const token = localStorage.getItem("token");
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
export default {
  components: { HeaderComponent, FooterComponent },
  data(){
    return{
        user : {},
        orders : [],
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
          console.log(error.response.data);
          // handle error response
        });
    },

    getorders(){
        console.log('hi')
    }
  }
}
</script>

<style>

</style>