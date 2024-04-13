<!-- MainLayout.vue -->
<template>
  <body class=" inter bg-main_color dark:bg-main_color_dark w-full h-screen m-0 p-0 overflow-x-hidden text-main_text_color dark:text-sidebar_text_color  ">
      <div class="test left-sidebar left-0 bg-sidebar_color dark:bg-sidebar_color_dark lg:block md:block hidden  fixed top-0 bottom-0  w-1/5 text-sidebar_text_color h-screen " >
 
        <LeftSidebar/>

      </div>
      <div class=" relative  h-screen ">
        <PhoneNav/>
        
        <div >
          <div class="w-full h-screen flex  items-center justify-center" v-if="store.loading">
            <PreLoading class="w-full  flex  items-center justify-center"/>
          </div>
          <slot v-else></slot>

        </div> 
      </div>
      <div class=" test right-0 bg-sidebar_color dark:bg-sidebar_color_dark fixed top-0 bottom-0 hidden  lg:block w-1/5 text-sidebar_text_color"> 
      
        <RightSide/>

      </div>
      <transition name="sidebar-slide" class=" sidebar right-0 top-0  bg-sidebar_color dark:bg-sidebar_color_dark   absolute  bottom-0  md:w-1/3 sm:w-full xs:w-full  text-sidebar_text_color " style="height: 100% !important;" > <RightSide  v-if="store.showTrendSidebar"  /></transition>

  </body>
  
  </template>
  
  <script>
  import PhoneNav from './component/PhoneNav.vue'
  import LeftSidebar from './component/LeftSide.vue'
  import PreLoading  from './component/PreLoading.vue'
  import RightSide from './component/RightSide.vue'
  import { MainStore } from "../stores/MainStore";

  export default {
    name: 'MainLayout',
    components:{
      PhoneNav,
      LeftSidebar,
      RightSide,
      PreLoading
    },
    setup() {
      const store = MainStore();
      return {store}
    }
  };
  </script>

<style scoped>


.sidebar-slide-enter-active, .sidebar-slide-leave-active {
  transition: transform 0.3s ease;
}

.sidebar-slide-enter, .sidebar-slide-leave-to {
  transform: translateX(100%);
}

.sidebar-slide-enter-to, .sidebar-slide-leave {
  transform: translateX(0);
}
.left-sidebar{
  z-index: 10 !important;
}

</style>
