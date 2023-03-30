<template>
    <div>
        <div class="bg-white text-green-700 font-bold w-full h-10 flex justify-center items-center "> 
            <p>Get 50% off on selected items | shop now</p>
        </div>
        <div class="bg-green-700 w-full shadow-lg h-16 flex justify-between items-center">
            <div class="ml-8  w-1/4 text-white text-sm font-medium flex justify-around items-center"> 
                <a>Home</a>
                <a>Shop</a>
                <a>About</a>
                <a>Blog</a>
            </div>
             <img src="./../../assets/whitelogo.png" class="w-16 h-12"/>
             <div class="w-1/3 text-white flex justify-between items-center"> 
                <div class="flex w-1/3 justify-center items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101" width="30" height="30">
                    <path d="M63.3 59.9c3.8-4.6 6.2-10.5 6.2-17 0-14.6-11.9-26.5-26.5-26.5S16.5 28.3 16.5 42.9 28.4 69.4 43 69.4c6.4 0 12.4-2.3 17-6.2l20.6 20.6c.5.5 1.1.7 1.7.7.6 0 1.2-.2 1.7-.7.9-.9.9-2.5 0-3.4L63.3 59.9zm-20.4 4.7c-12 0-21.7-9.7-21.7-21.7s9.7-21.7 21.7-21.7 21.7 9.7 21.7 21.7-9.7 21.7-21.7 21.7z" fill="white"/>
                </svg> 
                <input placeholder="search..."
                :class="['placeholder-white', 'mx-2', 'bg-transparent', 'w-16', 'border-none', {'w-32': isExpanded}]"
                class="focus:outline-none"
                @focus="isExpanded = true"
                @blur="isExpanded = false"
                />
                </div>
                <div class="flex w-1/3 justify-between items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path fill="white" fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z" clip-rule="evenodd"/></svg><p>Se connecter</p></div>
                <div class="flex w-1/3 justify-center items-center relative">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" x="0" y="0" version="1.1" width="24" height="24" viewBox="0 0 52 52" xml:space="preserve">
                    <path d="m43.51 32.165 6.44-19.17a1 1 0 0 0-.14-.9.986.986 0 0 0-.81-.41H12.74l-1.29-5.21c-.47-1.66-2-2.82-3.72-2.82H3c-.55 0-1 .44-1 1 0 .55.45 1 1 1h4.73c.83 0 1.57.56 1.78 1.33l7.99 32.18a4.696 4.696 0 0 0-3.32 4.49c0 2.58 2.1 4.69 4.69 4.69 2.58 0 4.68-2.11 4.68-4.69 0-1-.31-1.93-.84-2.69h15.88c-.54.76-.85 1.69-.85 2.69 0 2.58 2.1 4.69 4.68 4.69 2.59 0 4.69-2.11 4.69-4.69 0-2.59-2.1-4.69-4.69-4.69-.04 0-.09 0-.13.01-.02-.01-.04-.01-.06-.01H19.51l-1.52-6.11h24.57c.43 0 .81-.28.95-.69z" fill="white"/>
                </svg>
                </div>
             </div>
        </div>
    </div>
</template>
<script>
export default {
  name: 'HeaderComponent',
  data() {
    return {
      isExpanded: false
    };
   }
}
</script>
<style scoped>

</style>
