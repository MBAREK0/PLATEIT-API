<template>
    <MainLayout>
<div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
    <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
        <div class=" w-full ">
            <nav class="w-full m-0 p-0">
                <smallNav class="pc"/>
            </nav>
            <CreatePost class="m-0 mb-14 p-0"/>
            <div class="w-full justify-center flex "v-for="index in 6" :key="index">
                <post/>
            </div>
            <PostForm class="model" v-if="store.PostModel"/>
            <div class="backdrop" v-if="store.backdrop"></div>
        </div>
    </div>
</div>
    
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
import PostForm from "../components/component/forms/PostForm.vue";
import  smallNav  from "../components/component/smallNav.vue";
import  CreatePost  from "../components/component/CreatePost.vue";
import  post  from "../components/component/Post.vue";
import { MainStore } from "../stores/MainStore";
export default {
    name: 'Home',

    components:{
        MainLayout,
        smallNav,
        CreatePost,
        post,
        PostForm
        
    },
    setup() {
      const store = MainStore();
      return {store}
    }

};

</script>

<style>
@media (max-width:301px){
    .font-size{
        font-size: small;
    }
}
.tablet-container{
    width: 75% !important;
}

</style>