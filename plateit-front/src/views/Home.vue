<template>
    <MainLayout>


        <section  >
            <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end" v-if="!isVerified" >
                <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <SendVirificationEmail/> 
                </div>
            </div>
            <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
                <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                    <div class=" w-full ">
                        <nav class="w-full m-0 p-0">
                            <smallNav class="pc"/>
                        </nav>
                        <CreatePost class="m-0 mb-14 p-0"/>
                        <section class="w-full h-full  flex  items-center justify-center"  v-if="P_store.postLoading">
                            <div class="loader"></div>
                        </section>
                        <div class="w-full justify-center flex "v-for="post in posts" :key="post.id" v-else-if="posts && posts.length>0">
                            <post :post="post"/>
                        </div>
                        <div class=" w-full justify-center flex " v-else>
                            <p class="text-center dark:text-white text-main_text_color">No post available</p>
                        </div>
                        <PostForm class="model" v-if="store.PostModel"/>
                        <div class="backdrop" @click="store.toggleAllModels()" v-if="store.backdrop"></div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>

</template>

<script setup>
import { onMounted, onUpdated, ref, watch } from 'vue';
import  MainLayout  from "../components/MainLayout.vue";
import PostForm from "../components/component/forms/PostForm.vue";
import  smallNav  from "../components/component/smallNav.vue";
import  CreatePost  from "../components/component/CreatePost.vue";
import  post  from "../components/component/Post.vue";
import { MainStore } from "../stores/MainStore";
import { PostStore } from "../stores/PostStore";
import SendVirificationEmail from '../components/component/SendVirificationEmail.vue';

const store = MainStore();
const P_store = PostStore();
const isVerified = ref(store.user.email_verified_at) ;
const posts = ref([]);
onMounted( () => {
    P_store.GetPosts();
    posts.value = P_store.posts;

});
watch(() => P_store.posts, (newValue, oldValue) => {
    posts.value = newValue;
});

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

/* loader */
.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  border-radius: 50%;
}

.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  width: 36px;
  height: 36px;
}

.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  width: 36px;
  height: 36px;
  animation: spin89345 1s linear infinite;
}

@keyframes spin89345 {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>