<template>
    <div>
   <header-component></header-component>
   <div class="flex justify-around items-center w-full mt-10 px-20"> 
       <div class="h-full w-1/2"> 
        <img class="w-full shadox-xl my-10 border" :src="image(product.image)"/>
       </div>
       <div class="px-10"> 
        <h5 class="text-5xl font-light my-8 ">{{ product.name }}</h5>
        <p class="font-light">{{ product.discription }}</p>
        <h5 class="text-2xl font-light">{{ product.price }} د.م.</h5>
        <div class="flex justify-start items-center">
            <label class="font-bold mr-4">Quantity :</label>
            <input type="number" min="1" class="border shawod w-32 my-4 focus:outline-none focus:shadow-outline focus:ring-green-300 focus:border-none" value="1"/>
            <button type="button" class="text-green-700 bg-white border-solid border-2 border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center ml-10">
                Add to cart
            </button>
        </div>
       </div>
   </div>
   <div class="w-full my-20 flex flex-col"> 
    <h1 class="text-2xl font-light text-center">Reviews <span class="font-bold text-green-800">10 Reviews</span></h1>
       <form class="my-8">
    <label for="chat" class="sr-only">Your message</label>
    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 ">
        <ul class="flex justify-center w-[20%]">
            <li>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mr-1 h-5 w-5 text-warning">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            </li>
            <li>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mr-1 h-5 w-5 text-warning">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            </li>
            <li>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mr-1 h-5 w-5 text-warning">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            </li>
            <li>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mr-1 h-5 w-5 text-warning">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            </li>
            <li>
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="mr-1 h-5 w-5 text-warning">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            </li>
            </ul>
        <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 " placeholder="Your message..."></textarea>
            <button type="submit" class="inline-flex justify-center p-2 text-green-600 rounded-full cursor-pointer hover:bg-green-100 ">
            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
            <span class="sr-only">Send message</span>
        </button>
    </div>
</form>
   </div>
   <footer-component></footer-component>
   </div>
</template>

<script>
import axios from 'axios'
import FooterComponent from './inc/FooterComponent.vue'
import HeaderComponent from './inc/HeaderComponent.vue'

export default {
  components: { HeaderComponent, FooterComponent },
  name : 'DetailProduct',
  props : ['id'],
  data(){
    return{
        product : {
           name : '',
           discription : '',
           price : '',
           pet : '',
           categorie : '',
           image : ''
        }
    }
  },
  mounted(){
    this.getproduct()
  },
  methods : {
    getproduct(){
        axios
        .get("http://127.0.0.1:8000/api/products/"+this.id)
        .then((response) => {
          // set the authenticated state to true
          this.product.name = response.data.name
          this.product.discription = response.data.discription
          this.product.price = response.data.price
          this.product.pet = response.data.pet
          this.product.categorie = response.data.categorie
          this.product.image = response.data.image
          console.log(this.product)
        })
        .catch((error) => {
          console.log(error.response.data);
          // handle error response
        });
    },
    image(name){
      return 'http://127.0.0.1:8000/api/images/'+name;
   },
  }
}
</script>

<style>

</style>