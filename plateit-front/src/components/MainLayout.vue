<!-- MainLayout.vue -->
<template>
  <body class=" inter bg-main_color dark:bg-main_color_dark w-full h-screen m-0 p-0 overflow-x-hidden text-main_text_color dark:text-sidebar_text_color ">
      <div class="left-0 bg-sidebar_color dark:bg-sidebar_color_dark lg:block md:block hidden  fixed top-0 bottom-0  w-1/5 text-sidebar_text_color">
        <div class="flex flex-col items-center">
          <img src="../assets/logo.png" alt="logo" class="mt-10 w-10/12">
        </div> 
      </div>
      <div class="main-content 2xl:mx-72 xl:mx-72 lg:mx-64 md:ms-44 lg:mt-3 md:mt-3  ">
        <PhoneNav/>
        <div class=" mx-10 xl:mx-20 lg:mx-15 px-4">
       <slot></slot>
        </div> 
      </div>
      <div class="right-0 bg-sidebar_color dark:bg-sidebar_color_dark fixed top-0 bottom-0 hidden  lg:block w-1/5 text-sidebar_text_color"> 
      
        
      </div>
   
  </body>
  
  </template>
  
  <script>
  import PhoneNav from './component/PhoneNav.vue'
  export default {
    name: 'MainLayout',
    components:{
      PhoneNav,
    }
  };
  </script>

