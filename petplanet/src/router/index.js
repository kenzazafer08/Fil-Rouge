import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/HelloWorld.vue'
import About from '../components/AboutComponent.vue'
import Shop from '../components/ShopComponent.vue'
import Blog from '../components/BlogComponent.vue'
import Login from '../components/LoginComponent.vue'
import Register from '../components/RegisterComponent.vue'
import Dashboard from '../components/Admin/DashboardComponent.vue'
import Categorie from '../components/Admin/CategorieComponent.vue'
import EditCatVue from '@/components/Admin/EditCat.vue'
import Users from '@/components/Admin/UsersComponent.vue'
import PetComponent from '@/components/Admin/PetComponent.vue'
import EditPet from '@/components/Admin/EditPet.vue'
import ProductComponentVue from '@/components/Admin/ProductComponent.vue'
import Addcomponent from '../components/Admin/AddProduct'
import EditProduct from '@/components/Admin/EditProduct.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/shop', component: Shop },
  { path: '/blog' ,component: Blog},
  { path: '/login' ,component: Login},
  { path: '/register' ,component: Register},
  { path: '/dashboard' ,component: Dashboard},
  { path: '/categorie' ,component: Categorie},
  { path: '/Editcategorie/:id' ,component: EditCatVue ,name:'Editcategorie',props: true},
  { path: '/pet' ,component: PetComponent},
  { path: '/Editpet/:id' ,component: EditPet ,name:'EditPet',props: true},
  { path: '/Users' ,component: Users},
  { path: '/Products' ,component: ProductComponentVue},
  { path: '/Addproduct' ,component: Addcomponent},
  { path: '/Editproduct/:id' ,component: EditProduct ,name:'EditProduct',props: true},

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
