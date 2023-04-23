<template>
  <div>
    <blog-side-bar></blog-side-bar>
    <div class="pl-4 pt-20 sm:ml-64">
      <div class="flex justify-end w-full">
        <router-link to="/Addpost"
          class="focus:outline-none text-green-800 bg-white hover:bg-green-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-8 mr-2 mb-2 border border-green-700"
        >
          Add New post
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import BlogSideBar from '../inc/BlogSideBar.vue'
export default {
  components: { BlogSideBar },
}
</script>

<style>

</style>