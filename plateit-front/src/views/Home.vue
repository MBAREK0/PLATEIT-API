<template>
    <MainLayout>
    <div class=" main-content 2xl:mx-84 xl:mx-80 lg:mx-64 md:ms-44 lg:mt-3 md:mt-3">
        <nav class="w-full m-0 p-0">
            <smallNav class="pc"/>
        </nav>
        <CreatePost class="m-0 p-0"/>
    </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  smallNav  from "../components/component/smallNav.vue";
import  CreatePost  from "../components/component/CreatePost.vue";
export default {
    name: 'Home',
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

<style>
@media (max-width:301px){
    .font-size{
        font-size: small;
    }
}
</style>