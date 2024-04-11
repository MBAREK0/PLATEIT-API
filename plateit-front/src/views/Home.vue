<template>
    <MainLayout>
    <div class="home">
        <nav class="w-full m-0 p-0">
            <smallNav class="pc"/>
        </nav>
    </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import  smallNav  from "../components/component/smallNav.vue";
export default {
    name: 'Home',
    data() {
        return {
            
        };
    },
    components:{
        MainLayout,
        smallNav
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