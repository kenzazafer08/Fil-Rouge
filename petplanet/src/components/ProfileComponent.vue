<template>
  <div>
    <header-component></header-component>
    <footer-component></footer-component>
  </div>
</template>

<script>
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'
export default {
  components: { HeaderComponent, FooterComponent },
}
</script>

<style>

</style>