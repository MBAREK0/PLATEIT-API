<template>
    <div  class="absolute bottom-14 right-3 w-1/2 shadow-lg"  >
            <div class="flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg border-secondary_color border border-1  shadow-sm">
                <div @click="toggleDark()"  class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:dark:bg-main_color_dark hover:bg-sidebar_color  rounded-t-lg cursor-pointer">
                    <span class="material-icons " v-if="!isDark">dark_mode</span>
                    <span class="material-icons " v-else>light_mode</span>
                    <p class="text-sm">{{ isDark ? 'Light Mode' : 'Dark Mode' }}</p>

                </div>
                <hr>
                <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:dark:bg-main_color_dark hover:bg-sidebar_color  rounded-b-lg cursor-pointer" @click="logout">
                    <span class="material-icons r">logout</span>
                    <p class="text-sm " >logout</p>
                </div>
            </div>
        </div>
</template>
<script setup>
import { UserStore } from "@/stores/UserStore";
import { useRouter } from 'vue-router';


import  { useDark , useToggle } from "@vueuse/core"
const isDark = useDark();
const toggleDark = useToggle(isDark)
const Store = UserStore()
const router = useRouter();

const logout = () => {
    localStorage.clear();
    router.push({ name: 'SignIn' });
}
</script>