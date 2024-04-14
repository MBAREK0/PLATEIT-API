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
                                <button class="bg-secondary_color dark:bg-secondary_color_dark hover:bg-btn_submit_hover text-main_text_color dark:text-white rounded-xl text-sm font-bold  pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1 ">unfollow</button>
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
                                <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 21C4.70072 21 0 16.2993 0 10.5C0 4.70072 4.70072 0 10.5 0C16.2993 0 21 4.70072 21 10.5C21 16.2993 16.2993 21 10.5 21ZM15.75 10.2126V5.25H13.4827V10.1555C13.4827 12.3296 11.6097 12.2246 11.6097 12.2246V5.25H9.33253V12.2246C9.33253 12.2246 7.51734 12.2437 7.51734 10.1837V5.25H5.25V10.0012C5.25 13.9486 8.71762 14.0923 9.32334 14.0923V14.8588H7.93012V15.8839H9.32597V17.0625H11.6097V15.8839H13.0692V14.8588H11.6097V14.1028C13.5017 14.1028 15.75 13.1152 15.75 10.2126Z" fill="white"/>
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
                    <p class="text-start text-xs md:text-sm  ">Menu </p>
                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-sm font-bold   pl-2 pr-2 md:pl-5 md:pr-5 pt-1 pb-1" @click="store.toggleMenuModel()">new plate</button>
                </div>
                    

                    <hr class="border-t-1 border-main_text_color dark:border-white">
                </div>
            </div>
        </div> 
        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">   
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
                        <div class="backdrop" v-if="store.backdrop"></div>
                       <div>
                        <!-- posts -->
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
import { MainStore } from "../stores/MainStore";
import Menu  from "../components/component/Menu.vue";



export default {
    name: 'profile',
    data() {
        return {
            page:'profile'
        };
    },
    components:{
        MainLayout, smallNav, CreatePost ,prePage,PlateForm,Menu
    },
    setup() {
      const store = MainStore();
      return {store}
    }
};

</script>

