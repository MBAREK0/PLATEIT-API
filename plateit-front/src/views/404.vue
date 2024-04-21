<template>
       <div class="w-full h-screen flex  items-center justify-center bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark" v-if="store.preloading">
        <PreLoading class="w-full  flex  items-center justify-center"/>
    </div>
    <div class="not-found w-full h-screen flex flex-col items-center justify-center bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark" v-else>
 
      <h1>404 - Page Not Found</h1>
      <p class="dark:text-white text-black">Sorry, the page you are looking for does not exist.</p>
      <router-link class="link" to="/">Go to Home</router-link>
    </div>
  </template>
  
  <script>
   import PreLoading  from '@/components/component/PreLoading.vue'
    import { MainStore } from '@/stores/MainStore';
  export default {
    name: 'NotFound',
    components:{
        PreLoading
    },
    setup() {
      const store = MainStore();
      return {
        store
      }
    }
  };
  </script>
  
  <style scoped>
  .not-found {
    text-align: center;
    /* margin-top: 50px; */
  }
  
  h1 {
    font-size: 36px;
    margin-bottom: 20px;
    color: rgb(9, 118, 213);
  }
  
  p {
    font-size: 18px;
    margin-bottom: 20px;
  }
  .link{
    color: yellowgreen
  }
  </style>
  