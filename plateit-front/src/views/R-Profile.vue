<template>
    <MainLayout>
        
        <div class="w-full h-screen flex  items-center justify-center" v-if="store.dataPreloading">
            <PreLoading class="w-full  flex  items-center justify-center"/>
        </div>
        
        <section v-else>
            <prePage :page="page"/>
            
            <div class="w-full  flex lg:justify-center justify-center md:justify-end">
                <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                    <div class=" w-full ">     
                        <div class="h-36 xs:h-46 sm:h-56 overflow-hidden w-full  ">
                            <img :src="'http://localhost:8000' + u_store.profileData.info.image_cover" class="w-full" :alt="`${fullName} cover profile`">
                        </div>
                        <div class="flex justify-start px-5  -mt-16">
                            <img class="h-32 w-32 bg-white p-1 rounded-full z-5  " :src="'http://localhost:8000' + u_store.profileData.info.ProfileImage" :alt="`${fullName} profile`" />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">
                    <div class=" w-full  flex justify-between items-start pt-3 md:px-11 px-5 flex-wrap ">      
                        <div>
                            <div class="flex items-center gap-2 md:gap-4 relative">
                                <div class="flex items-center gap-1">
                                <h1 class="font-bold" v-text="u_store.profileData.info.fullName ? u_store.profileData.info.fullName.toUpperCase() : ''"></h1>
                                <span class="material-icons dark:text-white text-btn_primary_color text-sm" v-if="email_verified_at" >verified</span>
                            </div>
                            <button  @click="folow"  v-if="haveFollow() && !mon_followers.includes(parseInt(u_store.profileData.info.id))" class="bg-btn_primary_color hover:bg-btn_submit_hover  dark:text-white text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1 ">follow</button>
                            <button @click="unfollow" v-if="haveFollow() && mon_followers.includes(parseInt(u_store.profileData.info.id))" class="bg-secondary_color dark:bg-secondary_color_dark hover:bg-btn_submit_hover text-main_text_color dark:text-white hover:text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1 ">unfollow</button>
                                <a :href="u_store.profileData.details.web_site" target="_blank" v-if="u_store.profileData.info.role === 'restaurant' && web_site " class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-sm font-bold   pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1">visit</a>
                                <div v-if="userId == store.$state.user.id">
                                    <span class="material-icons text-gray-400 cursor-pointer" @click="store.toggleEditInfo()" style="z-index: 200 !important;">more_vert</span>
                                    <div class=" absolute  z-999  shadow-lg top-4 right-3" style="z-index: 200 !important; width: 15rem;" v-if="store.EditInfo"  >
                                        <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg  shadow-sm">
                                            <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:bg-main_color_dark cursor-pointer"  @click="store.toggleEditProfileModel()">
                                                    <span class="material-icons">edit</span>
                                                    <p class="text-sm">Edit Mon Profile</p>
                                                </div>
                                                <hr>
                                                <div class="flex gap-2 items-center px-2 py-1 text-sidebar_text_color bg-red-600 hover:bg-main_color_dark cursor-pointer" @click="delete_all_menu"  v-if="store.user.role === 'restaurant'">
                                                    <span class="material-icons">delete</span>
                                                    <p class="text-sm" >Delete All menu</p>
                                                </div>
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="Hiddenbackdrop" @click="store.toggleAllSmallModels()"  v-if="store.Hiddenbackdrop"></div>
                            </div>
                            <!-- adress of restaurant -->
                            <div class="w-full ">
                                <div class=" w-full text-start break-words">
                                    <p class="text-SM mt-2 " v-if="u_store.profileData.details.category"  v-text="u_store.profileData.details.category ? u_store.profileData.details.category.toUpperCase() : ''"></P>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 md:gap-4 ">
                            <div class="flex justify-center items-center gap-1">
                                <p class="md:text-lg text-md inter" v-text="Points"></p>
                                <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="4" y="6" width="13" height="13" fill="#4F4F4F"/>
                                     <path d="M14.9827 11.1555V6.75H16.25V11.2126C16.25 12.5169 15.7537 13.3389 15.0859 13.8488C14.3977 14.3742 13.4794 14.6028 12.6097 14.6028H12.1097V15.1028V15.8588V16.3588H12.6097H13.5692V16.3839H12.6097H12.1097V16.8839V17.5625H10.826V16.8839V16.3839H10.326H9.43012V16.3588H10.3233H10.8233V15.8588V15.0923V14.5923H10.3233C10.0475 14.5923 9.13378 14.5569 8.30435 14.0911C7.89735 13.8625 7.51506 13.5329 7.23221 13.0522C6.94948 12.5717 6.75 11.9129 6.75 11.0013V6.75H8.01734V11.1837C8.01734 11.7741 8.14816 12.2498 8.37054 12.6261C8.59279 13.0021 8.89022 13.2512 9.18165 13.4135C9.46994 13.574 9.75323 13.6505 9.96097 13.6876C10.0659 13.7064 10.1546 13.7156 10.2193 13.7202C10.2518 13.7225 10.2785 13.7236 10.2985 13.7241L10.3234 13.7246L10.332 13.7246L10.3352 13.7246L10.3366 13.7246L10.3372 13.7246C10.3375 13.7246 10.3378 13.7246 10.3325 13.2246L10.3378 13.7246L10.8325 13.7194V13.2246V6.75H12.1097V13.2246V13.6974L12.5817 13.7238L12.6097 13.2246C12.5817 13.7238 12.582 13.7239 12.5823 13.7239L12.583 13.7239L12.5843 13.724L12.5877 13.7241L12.5964 13.7245L12.6221 13.7252C12.6426 13.7256 12.6701 13.7256 12.7036 13.7247C12.7704 13.7229 12.862 13.7173 12.9704 13.7024C13.185 13.6729 13.4789 13.6052 13.7784 13.4482C14.0818 13.2891 14.3903 13.0383 14.62 12.6512C14.8493 12.2648 14.9827 11.7721 14.9827 11.1555ZM0.5 11.5C0.5 17.5754 5.42458 22.5 11.5 22.5C17.5754 22.5 22.5 17.5754 22.5 11.5C22.5 5.42458 17.5754 0.5 11.5 0.5C5.42458 0.5 0.5 5.42458 0.5 11.5Z" fill="white" stroke="black"/>
                                    </svg>
                                </div>
                            <!-- <div v-if="store.user.role === 'restaurant'">
                                <button class="bg-btn_primary_color hover:bg-btn_submit_hover  text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1">menu</button>   
                            </div> -->
                        </div>
                        <!-- bio of restaurant -->
                        <div class="w-full ">
                            <div class=" w-full text-start break-words">
                                <div class="flex items-center justify-start gap-2 mt-3">
                                    <p class="text-xs"  v-if="u_store.profileData.details.address"> <span class="font-bold" >Address : </span>: {{  u_store.profileData.details.address ?  u_store.profileData.details.address : '' }}</p>
                                    <p class="text-xs" v-if="u_store.profileData.details.phone_numbre"> <span class="font-bold"  >Phone Numbre : </span>: {{ u_store.profileData.details.phone_numbre ? u_store.profileData.details.phone_numbre : '' }}</p>
                                    
                                    
                                   </div>
                                <small class="text-xs   "v-text="u_store.profileData.info.bio"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end mb-10" v-if="u_store.profileData.info.role === 'restaurant'">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full  ">
                    <div class=" w-full flex justify-between mb-2 gap-4 items-center ">
                        <p class=" text-xs md:text-sm  ">Menu </p>
                        <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-sm font-bold   pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1" @click="store.toggleMenuModel()" v-if="userId == store.$state.user.id">new plate</button>
                    </div>
                    <hr class="border-t-1 border-main_text_color dark:border-white">
                </div>
            </div>
        </div>         
   
        <div class="w-full  flex lg:justify-center justify-center md:justify-end" v-if="u_store.profileData.info.role === 'restaurant' " >
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full  ">   
                    <Menu :userId="userId"  />                
                </div>
            </div>
        </div>

        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full ">
                    <div class=" w-full h-36">
                       <div>
                        <p class="text-start text-xs md:text-sm mb-2 ">posts </p>
                        <hr class="border-t-1 border-main_text_color dark:border-white">
                       </div>
                       <PlateForm class="model" v-if="store.MenuModel && store.user.role === 'restaurant'"/>

                       <EditeProfileForm class="model"  v-if="store.ProfileInfoModel"/>


                        <div class="backdrop" @click="store.toggleAllModels()"  v-if="store.backdrop"></div>
                        <div class="w-full justify-center flex "v-for="post in ProfilePosts" :key="post.id">
                            <post :post="post" :saveds=" p_store.saved_posts_ids"/>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    </MainLayout>

</template>

<script setup>
import { ref,onMounted, watch } from 'vue';
import PreLoading from "../components/component/PreLoading.vue";
import  MainLayout  from "../components/MainLayout.vue";
import prePage from "../components/component/PrePage.vue";
import PlateForm from "../components/component/forms/PlateForm.vue";
import EditeProfileForm from "../components/component/forms/EditeProfileForm.vue";
import { MainStore } from "../stores/MainStore";
import { UserStore } from "../stores/UserStore";
import { PostStore } from "../stores/PostStore";
import Menu  from "../components/component/Menu.vue";
import  post  from "../components/component/Post.vue";
import { useRoute , useRouter } from 'vue-router';
import axios from "axios";

const page = ref('Profile');
const route = useRoute();
const store = MainStore();
const u_store = UserStore();
const p_store = PostStore();
const  userId = ref(route.query.user_id);
const fullName = ref(null);
const email_verified_at = ref(null);
const Points = ref(null);
const ProfileImage = ref(null);
const image_cover = ref(null);
const bio = ref(null);
// --- restaurant details 
const address = ref(null);
const phone_numbre = ref(null);
const web_site = ref(null);
const category = ref(null);
const ProfilePosts = ref([]);
const mon_followers = ref([]);




const GetUserData = (uid) => {
    store.setDataPreloading(true);
   axios.get(store.laravelApi + 'auth/user', {
    params :{
        user_id: uid
    }
   })
   .then((response) => {
     if(response && response.status === 200){
     const user = response.data.user;
     fullName.value = user.fullName;
     email_verified_at.value = user.email_verified_at;
     Points.value = user.Points;
     ProfileImage.value = user.ProfileImage;
     image_cover.value = user.image_cover;
     bio.value = user.bio;
     store.setDataPreloading(false);
     u_store.profileData.info = user;
     if(user.role === 'restaurant'){
         
        GetRestaurantData(user.id);
        u_store.GetRestaurantMenu(user.id); 
     }
     }
   })
   .catch((error) => {
   if(error.response && error.response.status === 404){
    
       console.error('Error:', 'User not found');
   }
       console.error('Error:', error.message);
   });

   
 };

const haveFollow = () => {
 
   return  u_store.profileData.info.role  === 'restaurant' && parseInt(userId.value) !== parseInt(store.user.id)

}

 const GetRestaurantData = (uid) => {
    
   axios.get(store.laravelApi + 'get_details', {
    params :{
        restaurant_id: uid
    }
})
   .then((response) => {
   
     if(response && response.status === 200){

     const details = response.data.restaurant_details;
     address.value = details.address;
     phone_numbre.value = details.phone_numbre;
     web_site.value = details.web_site;
     category.value = details.category;
     u_store.profileData.details = details;
     

     store.categories = response.data.categories;
    }
   })
   .catch((error) => {
    store.categories =  error.response.data.categories;
    u_store.profileData.details = {
        address: null,
        phone_numbre: null,
        web_site: null,
        category: null
     };
      console.error('Error:', error.message);
   });
  
 };

 
  const GetProfilePosts = (uid) => {
         axios.get(store.laravelApi + 'profile_posts', {
            params: {
                profile_id: uid,  
            }
        })
            .then(response => {
                const Posts = response.data.data;
                ProfilePosts.value = Posts;
            })
            .catch(error => {
               
                console.error(error);
            });
}



watch(() => route.query.user_id, async (newValue, oldValue) => {

    u_store.profileData.details = {
        address: null,
        phone_numbre: null,
        web_site: null,
        category: null
     };
     userId.value = newValue;
     await GetUserData(newValue); 
     await GetProfilePosts(newValue);
 
    });
  

onMounted(async () => {
    my_followers();
   await p_store.get_saved_posts_ids();
    u_store.profileData.details = {
        address: null,
        phone_numbre: null,
        web_site: null,
        category: null
     };

     await GetUserData(userId.value);
     await GetProfilePosts(userId.value);
  
    
});

const delete_all_menu = () => {
    axios.delete(store.laravelApi + 'restaurant/delete_menu')
    .then((response) => {
        if(response && response.status === 200){
            u_store.$state.menu = [];
        store.showSuccesToast(response.data.message)

        }
    })
    .catch((error) => {
        console.error('Error:', error.message);
        store.displayValidationErrors('error occured while deleting the menu, please try again later');

    });
}

const folow = () => {
    axios.post(store.laravelApi + 'follow', {
        restaurant_id: userId.value
    })
    .then((response) => {
        if(response && response.status === 200){
            my_followers();
        }
    })
    .catch((error) => {
        console.error('Error:', error.message);
        
    });
}

const unfollow = () => {
    axios.delete(store.laravelApi + 'unfollow', {
        params: {
            restaurant_id: userId.value
        }
    })
    .then((response) => {
        if(response && response.status === 200){
            my_followers();
         
        }
    })
    .catch((error) => {
        console.error('Error:', error.message);
      

    });
}

const my_followers = () => {
    axios.get(store.laravelApi + 'my_followers')
    .then((response) => {
        if(response && response.status === 200){
            mon_followers.value = response.data.followers;
            
        }
    })
    .catch((error) => {
        console.error('Error:', error.message);


    });
}



</script>

