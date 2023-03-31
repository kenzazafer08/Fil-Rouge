<template>
    <div>
       <header-component></header-component>
           
       <footer-component></footer-component>
    </div>
  </template>
  
  <script>
  import HeaderComponent from './inc/HeaderComponent.vue';
  import FooterComponent from './inc/FooterComponent.vue';
  export default {
    name: 'HelloWorld',
    components :{HeaderComponent,FooterComponent},
    data() {
      return {
      }
    }
  }
  </script>
  
  <style scoped>
  
  </style>
  