<template>
    <MainLayout>
        <prePage :page="page"/>
    <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
        <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
            <div class=" w-full  flex flex-col items-center   ">
                <div class="w-full flex justify-center mt-3">
                    <img src="../assets/logo.png" alt="logo" class="w-1/5">

                </div>
                <div class="w-full flex justify-start items-start flex-col mt-3 text-start ">
                    <div class="flex items-center gap-3">
                      <span class="material-icons p-0 m-0   " style="font-size: 1rem;" >restaurant</span>
                      <h3>PLATES</h3>
                    </div>
                    <p class="text-xs roboto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                    </p>

                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mt-6" >
                   
                    <div class="flex flex-col gap-2" v-for="index in 6" :key="index">
                        <gift /> 
                        <div class="flex justify-between items-center">
                            <div class="flex gap-2 roboto items-center">
                                <span>50000</span>
                            <img src="../assets/icons/points.svg" class="w-5 h-5" alt="points icon">
                            </div>
                            <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-xl text-xs font-bold   pl-2 pr-2  pt-1 pb-1" >GET</button>
                        </div>
                    </div>
                </div>
 
                <div class="backdrop" v-if="store.backdrop"></div>
            </div>
        </div>
    </div>
    
    </MainLayout>
</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  gift  from "../components/component/GiftCard.vue";
import prePage from "../components/component/PrePage.vue";

import { MainStore } from "../stores/MainStore";
export default {
    name: 'marketplace',
    data(){
        return{
            page:'market place'
        }
    },
    components:{
        MainLayout,
        gift,
        prePage
        
    },
    setup() {
      const store = MainStore();
      return {store}
    }

};

</script>

<style scoped>

</style>