<template>
        <nav class=" flex justify-center  sm:text-2xl font-size text-main_text_color dark:text-sidebar_text_color m-0 p-0 relative ">
            <div class="font-bold roboto flex justify-centerw-full gap-3">
                <button class="border-none bg-none text-sm ">For you</button>
                <button class="border-none bg-none text-sm">Follow</button>
                <button class="border-none bg-none text-sm">Restaurant</button>
                
            </div>
            <span class="material-icons text-4xl text-sidebar_color dark:text-sidebar_text_color hidden  absolute right-0 tablet " @click="store.toggleTrendSidebar()">menu</span>
            
        </nav>
</template>

<script>
  import { MainStore } from "../../stores/MainStore";

export default {
    name: 'Nav',
    setup() {
      const store = MainStore();
      return {store}
    }
}
</script>

<style scoped>
@media (max-width:301px){
    .font-size{
        font-size: small;
    }
}
</style>