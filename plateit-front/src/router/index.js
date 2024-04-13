import { createRouter, createWebHistory } from 'vue-router'
import SignIn from '../views/SignIn.vue'
import SignUp from '../views/SignUp.vue'
import Home from '../views/Home.vue'
import profile from '../views/Profile.vue'
import { MainStore } from "../stores/MainStore";


const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/profile',
    name: 'profile',
    component: profile
  },
  {
    path: '/sign-in',
    name: 'SignIn',
    component: SignIn
  },
  {
    path: '/sign-up',
    name: 'SignUp',
    component: SignUp
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  const store = MainStore();
  store.setLoading(true); 
  next();
});

router.afterEach(() => {
  const store = MainStore();
  setTimeout(() => {
    store.setLoading(false); 
  }, 300); 
});

export default router

