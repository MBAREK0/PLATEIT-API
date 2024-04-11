<template>
    <div class="2xl:hidden xl:hidden lg:hidden md:hidden phone">
        <nav class=" bg-sidebar_color dark:bg-sidebar_color_dark text-sidebar_text_color sm:h-20 h-10 p-0 flex justify-between items-center">
            <img src="../../assets/logo.png" alt="logo" class=" w-1/4 ms-3  ">
            <div class="flex justify-between items-center me-3">
            <p>a</p> 
            <p>a</p> 
            <p>a</p> 
            </div>        
        </nav>
        <nav class=" pt-8 pb-5 text-sidebar_text_color sm:h-20 h-10 p-0 flex justify-around items-center">
            <span class="material-icons text-4xl text-sidebar_color dark:text-sidebar_text_color" @click="store.toggleSidebar()">menu</span>
          <smallNav/>
            <div class="relative w-1/3">
                <input type="text" class="border border-black-300 focus:border-black-300 outline-none rounded-lg py-1 px-3 w-full" placeholder="Search...">
                <span class="material-icons absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer">search</span>
            </div>
        </nav>
        <transition name="sidebar-slide" class=" sidebar left-0  bg-sidebar_color dark:bg-sidebar_color_dark   absolute sm:top-20 top-10 bottom-0  w-1/2  text-sidebar_text_color " > <LeftSidebar  v-if="store.showSidebar" class="border-t border-white border-opacity-50" /></transition>
      
  
    </div>

</template>

<script>
  import LeftSidebar from './LeftSide.vue'
  import smallNav from './smallNav.vue'
  import { MainStore } from "../../stores/MainStore";

  export default {
    components: {
      LeftSidebar,
      smallNav
    },
    setup() {
      const store = MainStore();
      return {store}
    }
  };
</script>
<style>
.sidebar-slide-enter-active, .sidebar-slide-leave-active {
  transition: transform 0.3s ease;
}

.sidebar-slide-enter, .sidebar-slide-leave-to {
  transform: translateX(-100%);
}

.sidebar-slide-enter-to, .sidebar-slide-leave {
  transform: translateX(0);
}

@media (min-width: 640px) {
  .sidebar {
    height: calc(100vh - 5rem) !important;
   
  }
}
.sidebar {
    height: calc(100vh - 2.5rem) !important;
  }
  @media (max-width:301px){
    .font-size{
        font-size: small !important;
    }
}
</style>
