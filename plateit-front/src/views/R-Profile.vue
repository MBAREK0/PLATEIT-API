<template>
    <MainLayout>

    <div>

        <prePage :page="page"/>
        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">     
                    <div class="h-36 xs:h-46 sm:h-56 overflow-hidden  ">
                        <img src="https://th.bing.com/th/id/OIP.mERRQvLMgufDEhO7UYw_zQHaFi?w=1262&h=943&rs=1&pid=ImgDetMain" alt="profile">
                    </div>
                    <div class="flex justify-start px-5  -mt-16">
                        <img class="h-32 w-32 bg-white p-1 rounded-full z-5  " src="https://th.bing.com/th/id/OIP.LyR_IO8sq7owmTEkAh56NwHaHa?rs=1&pid=ImgDetMain" alt="profile" />
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">
                    <div class=" w-full  flex justify-between items-start pt-3 md:px-11 px-5 flex-wrap ">      
                        <div>
                            <div class="flex items-center gap-2 md:gap-4 ">
                                <h1 class="font-bold">Mcdonalds</h1>
                            <!-- <button class="bg-btn_primary_color hover:bg-btn_submit_hover  rounded-xl text-sm font-bold pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1 ">follow</button>-->
                                <button class="bg-secondary_color dark:bg-secondary_color_dark hover:bg-btn_submit_hover text-main_text_color dark:text-white hover:text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1 ">unfollow</button>
                                <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-sm font-bold   pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1">visit</button>
                            </div>
                                <!-- adress of restaurant -->
                            <div class="w-full ">
                                <div class="md:w-10/12 w-full text-start break-words">
                                    <P class="text-SM mt-3  ">Lorem ipsum dolor sit, amet </P>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 md:gap-4 ">
                            <div class="flex justify-center items-center gap-1">
                                <p class="md:text-lg text-md inter">1250</p>
                                <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="4" y="6" width="13" height="13" fill="#4F4F4F"/>
                                     <path d="M14.9827 11.1555V6.75H16.25V11.2126C16.25 12.5169 15.7537 13.3389 15.0859 13.8488C14.3977 14.3742 13.4794 14.6028 12.6097 14.6028H12.1097V15.1028V15.8588V16.3588H12.6097H13.5692V16.3839H12.6097H12.1097V16.8839V17.5625H10.826V16.8839V16.3839H10.326H9.43012V16.3588H10.3233H10.8233V15.8588V15.0923V14.5923H10.3233C10.0475 14.5923 9.13378 14.5569 8.30435 14.0911C7.89735 13.8625 7.51506 13.5329 7.23221 13.0522C6.94948 12.5717 6.75 11.9129 6.75 11.0013V6.75H8.01734V11.1837C8.01734 11.7741 8.14816 12.2498 8.37054 12.6261C8.59279 13.0021 8.89022 13.2512 9.18165 13.4135C9.46994 13.574 9.75323 13.6505 9.96097 13.6876C10.0659 13.7064 10.1546 13.7156 10.2193 13.7202C10.2518 13.7225 10.2785 13.7236 10.2985 13.7241L10.3234 13.7246L10.332 13.7246L10.3352 13.7246L10.3366 13.7246L10.3372 13.7246C10.3375 13.7246 10.3378 13.7246 10.3325 13.2246L10.3378 13.7246L10.8325 13.7194V13.2246V6.75H12.1097V13.2246V13.6974L12.5817 13.7238L12.6097 13.2246C12.5817 13.7238 12.582 13.7239 12.5823 13.7239L12.583 13.7239L12.5843 13.724L12.5877 13.7241L12.5964 13.7245L12.6221 13.7252C12.6426 13.7256 12.6701 13.7256 12.7036 13.7247C12.7704 13.7229 12.862 13.7173 12.9704 13.7024C13.185 13.6729 13.4789 13.6052 13.7784 13.4482C14.0818 13.2891 14.3903 13.0383 14.62 12.6512C14.8493 12.2648 14.9827 11.7721 14.9827 11.1555ZM0.5 11.5C0.5 17.5754 5.42458 22.5 11.5 22.5C17.5754 22.5 22.5 17.5754 22.5 11.5C22.5 5.42458 17.5754 0.5 11.5 0.5C5.42458 0.5 0.5 5.42458 0.5 11.5Z" fill="white" stroke="black"/>
                                </svg>
                            </div>
                            <div>
                                <button class="bg-btn_primary_color hover:bg-btn_submit_hover  text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1">menu</button>   
                            </div>
                        </div>
                        <!-- bio of restaurant -->
                        <div class="w-full ">
                            <div class=" w-full text-start break-words">
                                <small class="text-xs   ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, non. Ex autem ducimus ea quas non quam, quasi nesciunt labore magni consequuntur voluptatem, animi hic dolor porro odit doloribus fuga. </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end mb-10">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full  ">
                <div class=" w-full flex justify-between mb-2 gap-4 items-center ">
                    <p class=" text-xs md:text-sm  ">Menu </p>
                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-sm font-bold   pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1" @click="store.toggleMenuModel()">new plate</button>
                </div>
                    

                    <hr class="border-t-1 border-main_text_color dark:border-white">
                </div>
            </div>
        </div> 
        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full  ">   
                        <Menu/>                
                </div>
            </div>
        </div>

        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full ">
                    <div class=" w-full h-36">
                       <div>
                        <p class="text-start text-xs md:text-sm mb-1 "><span>10</span> posts </p>
                        <hr class="border-t-1 border-main_text_color dark:border-white">
                       </div>
                       <PlateForm class="model" v-if="store.MenuModel"/>
                       <EditeProfileForm class="model" v-if="store.ProfileInfoModel"/>
                        <div class="backdrop" v-if="store.backdrop"></div>
                        <div class="w-full justify-center flex "v-for="index in 6" :key="index">
                            <post/>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  smallNav  from "../components/component/smallNav.vue";
import  CreatePost  from "../components/component/CreatePost.vue";
import prePage from "../components/component/PrePage.vue";
import PlateForm from "../components/component/forms/PlateForm.vue";
import EditeProfileForm from "../components/component/forms/EditeProfileForm.vue";
import { MainStore } from "../stores/MainStore";
import Menu  from "../components/component/Menu.vue";
import  post  from "../components/component/Post.vue";




export default {
    name: 'profile',
    data() {
        return {
            page:'profile'
        };
    },
    components:{
        MainLayout, smallNav, CreatePost ,prePage,PlateForm,Menu,post,EditeProfileForm
    },
    setup() {
      const store = MainStore();
      return {store}
    }
};

</script>

