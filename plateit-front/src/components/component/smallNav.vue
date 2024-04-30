<template>
        <nav class=" flex justify-center items-center  sm:text-2xl font-size text-main_text_color dark:text-sidebar_text_color m-0 p-0 relative " v-if="this.$route.name === 'home'" >
            <div class="font-bold roboto flex justify-center w-full gap-3" >
                <button class="border-none bg-none text-sm link " @click="fillterPosts('all')"    :class="{ ' myborder': P_store.posts_type === 'all' }">For you</button>
                <button class="border-none bg-none text-sm link " @click="fillterPosts('follow')"    :class="{ ' myborder': P_store.posts_type === 'follow' }">Follow</button>
                <button class="border-none bg-none text-sm link " @click="fillterPosts('restaurant')"    :class="{ ' myborder': P_store.posts_type === 'restaurant' }">Restaurant</button>
                
            </div>
            <span class="material-icons text-4xl text-sidebar_color dark:text-sidebar_text_color hidden  absolute right-0 tablet cursor-pointer " @click="store.toggleTrendSidebar()">menu</span>
            
        </nav>
        <nav v-else class=" sm:text-2xl font-size text-main_text_color dark:text-sidebar_text_color m-0 p-0 relative w-full">
            <span class="material-icons text-4xl text-sidebar_color dark:text-sidebar_text_color hidden  absolute right-0 tablet cursor-pointer" @click="store.toggleTrendSidebar()">menu</span>
        </nav>
        
</template>

<script setup>
  import { MainStore } from "../../stores/MainStore";
    import { PostStore } from "../../stores/PostStore";
    import { onMounted, ref } from 'vue';

      const store = MainStore();
      const P_store = PostStore();
        const type = ref('');

    const fillterPosts = (type) => {
        P_store.posts_type = type;
        P_store.GetPosts();
    }
</script>

<style scoped>
@media (max-width:301px){
    .font-size{
        font-size: small;
    }
}
.link {
  cursor: pointer;
  transition: border-bottom-color 0.3s ease;
}
.myborder{
    padding-bottom: 2px;
    border-bottom: 2px solid #1A5DB4 !important;

}
</style>