<template>
    <div class="  flex flex-col gap-4  h-screen pl-3 pr-3   "  >
        <span class="material-icons text-2xl absolute top-3 right-3 phone " @click="store.toggleSidebar()">close</span>
        <div >
            <router-link :to="{ name: 'home'}" class="flex flex-col items-center" @click="store.searching=false">
                <img src="../../assets/logo.png" alt="logo" class="mt-10 w-10/12 2xl:block xl:block lg:block md:block hidden">
            </router-link>
        </div> 
        <div class="flex flex-col gap-4 justify-between w-full h-full">
                <div class="flex flex-col gap-4 justify-start mt-12">
                <!-- ------------------- -->
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg " v-if="!store.searching" @click="store.searching=true" >
                    <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl cursor-pointer">search</span>
                    <p class="text-xl     translate-x-0 duration-75 cursor-pointer  inter">Explore</p>
                </div>
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  relative " v-else>
                    <span class="material-icons lg:text-2xl xl:text-2xl absolute  2xl:text-2xl cursor-pointer transition " :class="{ 'left-2': !store.searching, 'right-2': store.searching }" @click="searchposts">search</span>
                    <input class="text-sm py-2    text-white  inter w-full  bg-gray-400   bg-opacity-50 rounded-lg   outline-none border-none pl-9 pr-15" placeholder="Explore" v-model="search"  />
                </div>
                <!-- ------------------- -->
                <router-link :to="{ name: 'home'}" @click="store.searching=false">
                    <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg" :class="{ 'px-2 bg-gray-400 bg-opacity-50 rounded-lg': $route.name === 'home' && store.searching==false }">
                            <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl cursor-pointer">home</span>
                            <p class="text-xl     translate-x-0 duration-75 cursor-pointer inter">Home</p>
                    </div>
                </router-link>
                <!-- ------------------- -->
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg" @click="store.searching=false">
                    <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl p-0 m-0 cursor-pointer">notifications</span>
                    <p class="text-xl     translate-x-0 duration-75 cursor-pointer  inter">Notifications</p>
                </div>
                <!-- ------------------- -->
                <router-link :to="{ name: 'marketplace'}" @click="store.searching=false">
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center cursor-pointer  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg" :class="{ 'px-2 bg-gray-400 bg-opacity-50 rounded-lg': $route.name === 'marketplace' && store.searching==false}">

                    <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.5 45C34.9264 45 45 34.9264 45 22.5C45 10.0736 34.9264 0 22.5 0C10.0736 0 0 10.0736 0 22.5C0 34.9264 10.0736 45 22.5 45Z" fill="#1A5DB4"/>
                        <path d="M33.75 21.8841C33.75 28.1039 28.9322 30.2189 24.8766 30.2189V31.8403H28.0055V34.0369H24.878V36.5625H19.9842V34.0369H16.9931V31.8403H19.9786V30.1978C18.6806 30.1978 11.25 29.8898 11.25 21.4327V11.25H16.1086V21.8222C16.1086 26.2364 19.9983 26.1956 19.9983 26.1956V11.25H24.878V26.1956C24.878 26.1956 28.8914 26.4206 28.8914 21.7617V11.25H33.75V21.8841Z" fill="white"/>
                    </svg>
                    <p class="text-xl   translate-x-0 duration-75 cursor-pointer roboto" v-text="store.user.Points"></p>              
                </div>
                </router-link>
                <!-- ------------------- -->
                <router-link :to="{ name: 'save'}" @click="store.searching=false">
                    <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center cursor-pointer  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg":class="{ 'px-2 bg-gray-400 bg-opacity-50 rounded-lg': $route.name === 'save' && store.searching==false }">
                        <svg class=" points-icon w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 36 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 41.86V7.31778C3 4.93313 4.93313 3 7.31778 3H28.9067C31.2914 3 33.2244 4.93313 33.2244 7.31778V41.86L20.4471 33.6461C19.0248 32.7316 17.1997 32.7316 15.7774 33.6461L3 41.86Z" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-xl   translate-x-0 duration-75 cursor-pointer inter">Save</p>
                    </div>
                </router-link>
                <!-- ------------------- -->
                <router-link :to="{ name: 'profile',query: { user_id:store.user.id  }}" @click="store.searching=false">
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg" :class="{'px-2 bg-gray-400 bg-opacity-50 rounded-lg':isProfilePage()}">
                    <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl p-0 m-0 cursor-pointer">person</span>
                    <p class="text-xl   translate-x-0 duration-75 cursor-pointer inter">Profile</p>
                </div>
                </router-link>
                <!-- ------------------- --> 
                <router-link :to="{ name: 'about'}" @click="store.searching=false">
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg" :class="{ 'px-2 bg-gray-400 bg-opacity-50 rounded-lg': $route.name === 'about' && store.searching==false}">      
                    <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl p-0 m-0 cursor-pointer">info</span>
                    <p class="text-xl   translate-x-0 duration-75 cursor-pointer inter">About Us</p>
                </div>
               </router-link>
                <!-- ------------------- -->
                <div class=" flex gap-4 md:gap-2 sm:gap-1 items-center  px-2 hover:bg-gray-400 hover:bg-opacity-50 rounded-lg " @click="store.searching=false">
                    <span class="material-icons lg:text-2xl xl:text-2xl 2xl:text-2xl p-0 m-0  cursor-pointer">settings</span>
                    <p class="text-xl   translate-x-0 duration-75 cursor-pointer inter">Settings</p>
                </div>
                <!-- ------------------- -->
                <div class="flex justify-center w-full">
                <button class="bg-btn_primary_color hover:bg-btn_submit_hover  lg:h-10 md:h-8 rounded-lg text-lg  w-10/12 " @click="togglePostModle()">Post</button>

                </div>
            </div>
            <div class=" flex justify-between items-center  ">
                <div class="acc w-full mb-3 justify-self-end flex items-center gap-2 md:gap-1">
                    <div >
                        <router-link :to="{ name: 'profile',query: { user_id:store.user.id  }}" >
                        <img :src="'http://localhost:8000' + store.user.ProfileImage" class="profile-pic" alt="profile">
                    </router-link>
                    </div>
                    <div class="lg:text-sm xl:text-md md:text-sm sm:text-xs text-start  inter">
                        <p v-text="store.user.fullName ? store.user.fullName.toUpperCase() : '' "></p> 
                    </div>
                </div>
                <div>
                    <span class="material-icons cursor-pointer" @click="store.toggleSidemoreIsActive()" >more_vert</span>
                </div>
            </div>  
        </div>
       <SidSmallModel v-if="store.SidemoreIsActive" class="corsur-pointer" style="z-index: 999 !important;"/>
       <div class="Hiddenbackdrop" @click="store.toggleAllSmallModels()"  v-if="store.Hiddenbackdrop"></div>
    </div>

</template>

<script setup>
import { MainStore } from "../../stores/MainStore";
import { PostStore } from "../../stores/PostStore";
import {  watch } from 'vue';
import SidSmallModel from './SidSmallModel.vue';
import { getCurrentInstance, onMounted } from 'vue';
import { useRoute , useRouter } from 'vue-router';
import { ref } from "vue";

const route = useRoute();
const store = MainStore();
const P_store = PostStore();
const search = ref('');
const router = useRouter();
const isProfilePage = () => {


  return route.name === 'profile' &&
  store.searching==false
    && route.query.user_id == store.user.id;
};

const togglePostModle = () => {
    if(route.name !== 'home'){
    
    router.push({ name: 'home' });
 }
    store.togglePostModel()
}




const searchposts = () => {
 if(route.name !== 'home'){
    
    router.push({ name: 'home' });
 }
    P_store.GetPosts(search.value);
}

</script>

<style scoped>
@media (min-width: 1024px){
.points-icon {
    margin-left: 0.18rem;
}
}
@media (min-width: 768px){
.points-icon {
    margin-left: 0.18rem;
}
}
.acc{
    justify-self: flex-end !important;
}
.flex{
    display: flex !important;
}
@media (min-width: 320px){
    .points-icon {
    margin-left: 0.3rem;
}

}

@media (max-width:320px){
    .text-xl {
        font-size: small;
    }
} 
/* Add your styles here */
.material-icons {
  transition: left 0.3s ease-in-out; /* Adjust the transition timing function as needed */
}

.right-2 {
  left: auto;
  right: 2rem; /* Adjust the distance as needed */
}
</style>