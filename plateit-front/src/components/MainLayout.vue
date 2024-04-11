<!-- MainLayout.vue -->
<template>
  <body class=" inter bg-main_color dark:bg-main_color_dark w-full h-screen m-0 p-0 overflow-x-hidden text-main_text_color dark:text-sidebar_text_color  ">
      <div class="left-sidebar left-0 bg-sidebar_color dark:bg-sidebar_color_dark lg:block md:block hidden  fixed top-0 bottom-0  w-1/5 text-sidebar_text_color h-screen ">
 
        <LeftSidebar/>

      </div>
      <div class="main-content 2xl:mx-72 xl:mx-72 lg:mx-64 md:ms-44 lg:mt-3 md:mt-3 relative  h-screen ">
        <PhoneNav/>
        
        <div class=" mx-10 xl:mx-20 lg:mx-15 px-4">


          <slot></slot>
        </div> 
      </div>
      <div class="right-0 bg-sidebar_color dark:bg-sidebar_color_dark fixed top-0 bottom-0 hidden  lg:block w-1/5 text-sidebar_text_color"> 
      
        <RightSide/>
     

      </div>
      <transition name="sidebar-slide" class=" sidebar right-0 top-0  bg-sidebar_color dark:bg-sidebar_color_dark   absolute  bottom-0  w-1/3  text-sidebar_text_color " style="height: 100% !important;" > <RightSide  v-if="store.showTrendSidebar"  /></transition>

   
  </body>
  
  </template>
  
  <script>
  import PhoneNav from './component/PhoneNav.vue'
  import LeftSidebar from './component/LeftSide.vue'
  import RightSide from './component/RightSide.vue'
  import { MainStore } from "../stores/MainStore";

  export default {
    name: 'MainLayout',
    components:{
      PhoneNav,
      LeftSidebar,
      RightSide
    },
    setup() {
      const store = MainStore();
      return {store}
    }
  };
  </script>

<style scoped>

@media (min-width: 769px) and (max-width: 900px) {
  .left-sidebar {
    width: 190px !important;
  }
}
.sidebar-slide-enter-active, .sidebar-slide-leave-active {
  transition: transform 0.3s ease;
}

.sidebar-slide-enter, .sidebar-slide-leave-to {
  transform: translateX(100%);
}

.sidebar-slide-enter-to, .sidebar-slide-leave {
  transform: translateX(0);
}

</style>
