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
                    <div class="w-full justify-center flex " v-for="post in posts_saved" :key="post.id">
                        <post :post="post" class="lg:hidden xl:block"/>
                       
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
import { onMounted,ref } from 'vue';
    const page = 'save';
    const store = MainStore();
    const search = ref('');
    const posts_saved = ref([]);


    const search_saved_posts = ()=> {
        get_saved_posts(search.value);
    }
    
    const get_saved_posts = async (search) => {
  try {
    const response = await axios.get(store.laravelApi + 'get_saved_posts', {
      params: { key: search }
    });

   
      posts_saved.value = response.data.data;
      console.log(posts_saved.value);

  } catch (error) {
    console.error('Error fetching saved posts:', error);
  }
};

onMounted(() => {
  get_saved_posts();
});


</script>
