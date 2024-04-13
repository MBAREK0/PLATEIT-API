<template>
    <MainLayout>
        <div class=" bg-green-800 w-full profil ">
            <div class="home bg-green-500   xs:h-32 sm:h-32 ">
        
        
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

<style>
@media (max-width:301px){
    .font-size{
        font-size: small;
    }
}
@media (max-width: 640px) { 
    .profil{

    }
 }
@media (min-width: 640px) {
    .profil{
        
    }
  }
@media (min-width: 768px) {
    .profil{
        
    }
  }
@media (min-width: 1024px) { 
    .profil{
        
    }
 }
@media (min-width: 1280px) {
    .profil{
        
    }
  }
@media (min-width: 1536px) {
    .profil{
       margin-left: 26.8rem !important;
       margin-right: 26.8rem !important;
    }
  }
</style>