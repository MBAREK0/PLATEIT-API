<template>
    <MainLayout>
        <prePage :page="page"/>
        
    <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
        <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
            <div class=" w-full  flex flex-col items-center   ">
                <h1 class="text-xl md:text-2xl xl:text-4xl roboto font-bold mt-6">THE PLATEIT STORY</h1>
                <img src="../assets/images/about-1.jpg" class="mt-6" alt="about1">
                <div class="text-start mt-6">
                    <p class="text-xs roboto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                    </p>
                   
                </div>
                <img src="../assets/images/about-2.jpg" class="mt-6" alt="about2">
                <div class="text-start mt-6 mb-6">
                    <p class="text-xs roboto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                    </p>
                </div>
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
    name: 'Home',
    data(){
        return{
            page:'about us'
        }
    },
    components:{
        MainLayout,
        gift,
        prePage,
        
        
    },
    setup() {
      const store = MainStore();
      return {store}
    }

};

</script>

<style scoped>

</style>