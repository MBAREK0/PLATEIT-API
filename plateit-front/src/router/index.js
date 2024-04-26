import { createRouter, createWebHistory } from 'vue-router'
import SignIn from '../views/auth/SignIn.vue'
import SignUp from '../views/auth/SignUp.vue'
import ForgetPassword from '../views/auth/ForgetPassword.vue'
import ResetPassword from '../views/auth/ResetPassword.vue'
import VerifyEmail from '../views/auth/VerifyEmail.vue'
import Home from '../views/Home.vue'
import profile from '../views/R-Profile.vue'
import marketplace from '../views/MarketPlace.vue'
import about from '../views/About.vue'
import save from '../views/Save.vue'
import notFound from '../views/404.vue'
import { MainStore } from "../stores/MainStore";


const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/profile',
    name: 'profile',
    component: profile,
  },
  {
    path: '/marketplace',
    name: 'marketplace',
    component: marketplace,
  },
  {
    path: '/about',
    name: 'about',
    component: about,
  },
  {
    path: '/save',
    name: 'save',
    component: save,
  },
  {
    path: '/sign-in',
    name: 'SignIn',
    component: SignIn,
    meta: { requiresLogin: 'able' }
  },
  {
    path: '/sign-up',
    name: 'SignUp',
    component: SignUp,
    meta: { requiresLogin: 'able' }
  },
  {
    path: '/VerifyEmail',
    name: 'VerifyEmail',
    component: VerifyEmail,
    meta: { requiresLogin: 'able' }
  },
  {
    path: '/ForgetPassword',
    name: 'ForgetPassword',
    component: ForgetPassword,
    meta: { requiresLogin: 'able' }
  },
  {
    path: '/ResetPassword',
    name: 'ResetPassword',
    component: ResetPassword,
    meta: { requiresLogin: 'able' }
  },
  {
    // Catch-all route for 404 errors
    path: '/:catchAll(.*)/:id',
    component: notFound,
    meta: { requiresLogin: 'able' }
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  const requiresLogin = to.meta.requiresLogin;
  const store = MainStore();
  store.setLoading(true); 
  const isLogin = JSON.parse(localStorage.getItem('IsLogin'));

  if(requiresLogin && requiresLogin === 'able' ) next();
  else if (!isLogin) {
    next({ name: 'SignIn' });
  } else {
    next();
  }  
});

router.afterEach(() => {
  const store = MainStore();
  setTimeout(() => {
    store.setLoading(false); 
  }, 0); 
});

export default router

