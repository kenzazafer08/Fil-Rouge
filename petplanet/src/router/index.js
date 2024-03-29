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
import DetailComponentVue from '@/components/DetailComponent.vue'
import CartComponentVue from '@/components/CartComponent.vue'
import CheckOutVue from '@/components/CheckOut.vue'
import ProfileComponentVue from '@/components/ProfileComponent.vue'
import OrderComponentVue from '@/components/Admin/OrderComponent.vue'
import OrderDetailsVue from '@/components/Admin/OrderDetails.vue'
import BlogDashboardVue from '@/components/posts/BlogDashboard.vue'
import PostComponentVue from '@/components/posts/PostComponent.vue'
import AddPostVue from '@/components/posts/AddPost.vue'
import ShowPostVue from '@/components/posts/ShowPost.vue'
import PostComponent from '@/components/PostComponent.vue'
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
  { path: '/Cart' ,component: CartComponentVue},
  { path: '/Editpet/:id' ,component: EditPet ,name:'EditPet',props: true},
  { path: '/Users' ,component: Users},
  { path: '/Products' ,component: ProductComponentVue},
  { path: '/Addproduct' ,component: Addcomponent},
  { path: '/Editproduct/:id' ,component: EditProduct ,name:'EditProduct',props: true},
  { path: '/Detailproduct/:id' ,component: DetailComponentVue ,name:'Detailproduct',props: true},
  { path: '/ChekOut' ,component: CheckOutVue},
  { path: '/Profile' ,component: ProfileComponentVue},
  { path: '/Orders' ,component: OrderComponentVue},
  { path: '/OrderDetails/:id' ,component: OrderDetailsVue,name:'OrderDetails',props: true},
  { path : '/blogdashboard' ,component : BlogDashboardVue},
  { path: '/posts' , component: PostComponentVue},
  { path: '/Addpost' , component: AddPostVue},
  { path: '/ShowPost/:id' , component: ShowPostVue , name:'ShowPost' , props:true},
  { path: '/PostComponentVue/:id' , component: PostComponent , name:'PostComponentVue' , props:true}
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
