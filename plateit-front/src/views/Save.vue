<template>
    <MainLayout>
        <prePage :page="page"/>
        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full ">
                    <div class="relative w-full md:w-1/2 lg:w-1/3" >
                        <input type="text" class="border border-black-300 focus:border-black-300 outline-none rounded-lg py-1 px-3 w-full" placeholder="Search...">
                        <span class="material-icons absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer">search</span>
                    </div>
                    <div class="w-full justify-center flex "v-for="index in 6" :key="index">
                        <post class="lg:hidden xl:block"/>
                    </div>
                    <div class="backdrop" v-if="store.backdrop"></div>
                </div>
            </div>
        </div>
    
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  post  from "../components/component/Post.vue";
import prePage from "../components/component/PrePage.vue";
import { MainStore } from "../stores/MainStore";
export default {
    name: 'Save',
    data() {
        return {
            page:'Save'
        };
    },

    components:{
        MainLayout,
        post,prePage
        
    },
    setup() {
      const store = MainStore();
      return {store}
    }

};

</script>
