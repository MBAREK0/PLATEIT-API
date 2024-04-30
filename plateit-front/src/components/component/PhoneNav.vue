<template>
    <div class="2xl:hidden xl:hidden lg:hidden md:hidden phone">
        <nav class=" bg-sidebar_color dark:bg-sidebar_color_dark text-sidebar_text_color sm:h-20 h-10 p-0 flex justify-between items-center">
          <router-link :to="{ name: 'home'}" >
              <img src="../../assets/logo.png" alt="logo" class=" w-1/4 ms-3  ">
          </router-link>
          
            <div class="flex justify-between items-center me-3 gap-2 ">
              <!-- ------------------- -->
              <div class=" flex gap-1  items-center cursor-pointer">
                    <svg class=" points-icon   w-7 h-7    " viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.5 45C34.9264 45 45 34.9264 45 22.5C45 10.0736 34.9264 0 22.5 0C10.0736 0 0 10.0736 0 22.5C0 34.9264 10.0736 45 22.5 45Z" fill="#1A5DB4"/>
                        <path d="M33.75 21.8841C33.75 28.1039 28.9322 30.2189 24.8766 30.2189V31.8403H28.0055V34.0369H24.878V36.5625H19.9842V34.0369H16.9931V31.8403H19.9786V30.1978C18.6806 30.1978 11.25 29.8898 11.25 21.4327V11.25H16.1086V21.8222C16.1086 26.2364 19.9983 26.1956 19.9983 26.1956V11.25H24.878V26.1956C24.878 26.1956 28.8914 26.4206 28.8914 21.7617V11.25H33.75V21.8841Z" fill="white"/>
                    </svg>
                    <p class="text-2xl  translate-x-0 duration-75 cursor-pointer roboto font-size-icon">1250</p>
              </div>
                <!-- ------------------- -->
              <div class="flex gap-1 items-center">
                <span class="material-icons p-0 m-0 cursor-pointer points-icon font-size-icon" style="font-size: 2rem;">notifications</span>
              </div>
                <!-- ------------------- -->
              <div class="flex gap-1 items-center">
                <span class="material-icons p-0 m-0 cursor-pointer points-icon font-size-icon" style="font-size: 2rem;" @click="store.toggleTrendSidebar()">restaurant</span>
              </div>
            </div>        
        </nav>
        <nav class=" pt-8 pb-5 text-sidebar_text_color sm:h-20 h-10 p-0 flex justify-around items-center">
            <span class="material-icons text-4xl text-sidebar_color dark:text-sidebar_text_color cursor-pointer" @click="store.toggleSidebar()">menu</span>
          <smallNav/>
            <div class="relative w-1/3" v-if="this.$route.name === 'home'">
                <input type="text" class="border border-black-300 focus:border-black-300 outline-none rounded-lg py-1 px-3 w-full" v-model="search" placeholder="Search...">
                <span class="material-icons absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer "  @click="searchposts">search</span>
            </div>
        </nav>
        <transition name="sidebar-slide" class=" sidebar left-0  bg-sidebar_color dark:bg-sidebar_color_dark   fixed sm:top-20 top-10 bottom-0  w-1/2  text-sidebar_text_color " style="z-index: 9999 !important;" > <LeftSidebar  v-if="store.showSidebar" class="border-t border-white border-opacity-50" /></transition>
        <div class="Hiddenbackdrop" @click="store.closeSidebar()"  v-if="store.SidebarHiddenbackdrop"></div>
      
  
    </div>

</template>

<script setup>
  import LeftSidebar from './LeftSide.vue'
  import { onMounted, ref } from 'vue';
  import smallNav from './smallNav.vue'
  import { MainStore } from "../../stores/MainStore";
  import { PostStore } from "../../stores/PostStore";

  const store = MainStore();
  const P_store = PostStore();
  const search = ref('');

const searchposts = () => {
    P_store.GetPosts(search.value);
}
  
</script>
<style scoped>
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
    .points-icon{
      font-size: 1rem !important;
    }
}
@media (max-width:640px){
    .font-size{
        font-size: small !important;
    }
    .points-icon{
      width: 1rem !important;
      height: 1rem !important;
      font-size: 1rem;
    }
    .font-size-icon{
        font-size: 1.2rem !important;
    }
}
</style>
