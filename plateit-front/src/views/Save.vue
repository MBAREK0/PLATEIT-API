<template>
    <MainLayout>
        <prePage :page="page"/>
        <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
                <div class=" w-full ">
                    <div class="relative w-full md:w-1/2 lg:w-1/3" >
                        <input type="text" class="border border-black-300 focus:border-black-300 outline-none rounded-lg py-1 px-3 w-full" placeholder="Search..." v-model="search">
                        <span class="material-icons absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer" @click="search_saved_posts">search</span>
                    </div>
                    <section class="w-full h-screen  flex  items-center justify-center"  v-if="P_store.postLoading">
                            <div class="loader"></div>
                    </section>
                    <div class="w-full justify-center flex " v-for="post in posts_saved" :key="post.id" v-else-if="posts_saved && posts_saved.length>0">
                        <post :post="post" :saveds=" P_store.saved_posts_ids" class="lg:hidden xl:block"/>
                       
                    </div>
                    <div class=" w-full h-screen items-center justify-center flex " v-else>
                            <p class="text-center dark:text-white text-main_text_color">No post available</p>
                    </div>
                    
                </div>
            </div>
        </div>
    
    </MainLayout>

</template>

<script setup>
import axios from "axios";
import  MainLayout  from "../components/MainLayout.vue";
import  post  from "../components/component/Post.vue";
import prePage from "../components/component/PrePage.vue";
import { MainStore } from "../stores/MainStore";
import { onMounted,ref ,watch} from 'vue';
import { PostStore } from "@/stores/PostStore";

    const page = 'save';
    const store = MainStore();
    const P_store = PostStore();
    const search = ref('');
    const posts_saved = ref([]);


    const search_saved_posts = ()=> {
        get_saved_posts(search.value);
    }
    
    const get_saved_posts = async (search) => {
        P_store.postLoading = true;
  try {
    const response = await axios.get(store.laravelApi + 'get_saved_posts', {
      params: { key: search }
    });

   
      posts_saved.value = response.data.data;
      console.log(posts_saved.value);

  } catch (error) {
    console.error('Error fetching saved posts:', error);
  }
  P_store.postLoading = false ; 
};

watch(search, (newValue, oldValue) => {
    get_saved_posts(newValue);
});
onMounted( async () => {
  await P_store.get_saved_posts_ids();
  get_saved_posts();
});


</script>
<style scoped>

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