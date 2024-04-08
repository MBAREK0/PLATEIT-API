<template>
    <MainLayout>
        <div class="home">
        <div class="roboto flex justify-center gap-3">
            <button class="border-none bg-none ">For you</button>
            <button class="border-none bg-none ">Follow</button>
            <button class="border-none bg-none ">Restaurant</button>
         
        </div>
       
    </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
export default {
    name: 'Home',
    data() {
        return {
            
        };
    },
    components:{
        MainLayout,
    },
    methods: {
       
    },
    computed: {
      
    },
};
</script>

