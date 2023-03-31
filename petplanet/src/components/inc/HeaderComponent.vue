<template>
    <div>
        <div class="bg-white text-green-700 font-bold w-full h-10 hidden sm:flex justify-center items-center "> 
            <p>Get 50% off on selected items | shop now</p>
        </div>
        <div class="hidden bg-green-700 w-full shadow-lg h-16 sm:flex justify-between items-center">
            <div class="ml-8  w-1/4 text-white text-sm font-medium flex justify-around items-center"> 
                <a>Home</a>
                <a>Shop</a>
                <a>About</a>
                <a>Blog</a>
            </div>
             <img src="./../../assets/whitelogo.png" class="w-16 h-12"/>
             <div class="w-1/4 text-white flex justify-around items-center"> 
                <div class="flex w-1/2 justify-center p-2 items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path fill="white" fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z" clip-rule="evenodd"/></svg><p>Se connecter</p></div>
                <div class="mr-8 dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="badge badge-sm indicator-item">8</span>
                    </div>
                </label>
                <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                    <span class="font-bold text-lg text-green-700">8 Items</span>
                    <span class="text-green-700 font-light text-md">Subtotal: $999</span>
                    <div class="card-actions">
                        <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">View cart</button>
                    </div>
                    </div>
                </div>
                </div>
             </div>
        </div>
        <div class="sm:hidden flex justify-between items-center bg-green-700"> 
            <div class="text-white w-1/4 flex items-center"><img src="./../../assets/whitelogo.png" class="ml-4 mr-1 w-12 h-8"/>PetPlanet</div>
            <div class="w-1/3 text-white flex justify-between items-center">
                 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path fill="white" fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z" clip-rule="evenodd"/></svg>
                <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="badge badge-sm indicator-item">8</span>
                    </div>
                </label>
                <div tabindex="0" class="card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                    <span class="font-bold text-lg text-green-700">8 Items</span>
                    <span class="text-green-700 font-light text-md">Subtotal: $999</span>
                    <div class="card-actions">
                        <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">View cart</button>
                    </div>
                    </div>
                </div>
               </div>
               <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="mr-4" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"> 
                        <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M7.25 1.25C3.93629 1.25 1.25 3.93629 1.25 7.25V16.75C1.25 20.0637 3.93629 22.75 7.25 22.75H16.75C20.0637 22.75 22.75 20.0637 22.75 16.75V7.25C22.75 3.93629 20.0637 1.25 16.75 1.25H7.25ZM4.84615 7C4.51691 7 4.25 7.33579 4.25 7.75C4.25 8.16421 4.51691 8.5 4.84615 8.5H19.1538C19.4831 8.5 19.75 8.16421 19.75 7.75C19.75 7.33579 19.4831 7 19.1538 7H4.84615ZM4.25 12.25C4.25 11.8358 4.51691 11.5 4.84615 11.5H19.1538C19.4831 11.5 19.75 11.8358 19.75 12.25C19.75 12.6642 19.4831 13 19.1538 13H4.84615C4.51691 13 4.25 12.6642 4.25 12.25ZM4.84615 16C4.51691 16 4.25 16.3358 4.25 16.75C4.25 17.1642 4.51691 17.5 4.84615 17.5H19.1538C19.4831 17.5 19.75 17.1642 19.75 16.75C19.75 16.3358 19.4831 16 19.1538 16H4.84615Z" fill="#FFFFFF"/>
                    </svg>
                </button> 

             </div>
        </div>
    </div>
    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-green-100 rounded-lg shadow w-44 ">
                    <ul class="py-2 text-sm text-green-700 " aria-labelledby="dropdownHoverButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Shop</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Contact</a>
                    </li>
                    </ul>
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
