<template>
    <div>
        <div class="bg-white text-green-700 font-bold w-full h-10 flex justify-center items-center "> 
            <p>Get 50% off on selected items | shop now</p>
        </div>
        <div class="bg-green-700 w-full shadow-lg h-16 flex justify-around items-center">
            <div class="w-1/3 text-white flex justify-around items-center"> 
                <a>Home</a>
                <a>Shop</a>
                <a>About</a>
                <a>Blog</a>
            </div>
             <img src="./../../assets/whitelogo.png" class="w-16 h-12"/>
             <div class="w-1/3 text-white flex justify-around items-center"> 
                <div> <i class="fa fa-search" aria-hidden="true"></i> search...</div>
             </div>
        </div>
    </div>
</template>
<script>
export default {
  name: 'HeaderComponent',
}
</script>
<style scoped>

</style>
