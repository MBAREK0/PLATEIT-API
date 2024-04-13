<template>
    <MainLayout>

        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >    
                <div class="bg-sidebar_color dark:bg-sidebar_color_dark w-full h-10"></div>
            </div>
        </div>
        
        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">
                    <nav class="w-full m-0 p-0">
                        <smallNav class="pc"/>
                    </nav>
                <div class="bg-yellow-800 w-full h-36"></div>
                </div>
            </div>
        </div>
        <div class="w-full  flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >
                <div class=" w-full ">
                    <nav class="w-full m-0 p-0">
                        <smallNav class="pc"/>
                    </nav>
                <div class="bg-green-800 w-full h-36"></div>
                </div>
            </div>
        </div>
        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full ">
                    <nav class="w-full m-0 p-0">
                        <smallNav class="pc"/>
                    </nav>
                <div class="bg-red-800 w-full h-36"></div>
                </div>
            </div>
        </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  smallNav  from "../components/component/smallNav.vue";
import  CreatePost  from "../components/component/CreatePost.vue";
export default {
    name: 'profile',
    data() {
        return {
            
        };
    },
    components:{
        MainLayout,
        smallNav,
        CreatePost
    },
    methods: {
       
    },
    computed: {
      
    },
};

</script>

