<template>
    <article class="  w-full mt-10  xl:w-10/12 flex flex-col relative  shadow-lg  ">
        <div class="flex justify-between  items-center ">
            <div class="flex justify-start gap-3 items-center">
                <div>
                    <img :src="'http://localhost:8000' + props.post.ProfileImage" class="profile-pic" alt="profile">
                </div>
                <div class="flex flex-col  " style="line-height: 1.2">
                    <div class="flex justify-start gap-3  items-center">
                        <p class="font-bold">{{props.post.author}}</p>
                        <div class=" flex gap-1 items-center cursor-pointer">
                            <p class="text-sm roboto">{{props.post.author_points}}</p>
                            <img src="../../assets/icons/points.svg" class=" w-3 h-3   " alt="points">
                        </div>
                    </div>
                    <div class="flex justify-start gap-3 items-center">
                        <p class="p-0 m-0 text-sm " v-if="props.post.restaurant_Name"><span class="text-xs">@</span>{{ props.post.restaurant_Name }}</p>
                        <!-- <div class=" flex gap-1 items-center ">
                            <p class="text-sm roboto">1250</p>
                            <img src="../../assets/icons/rest-points.svg" class=" w-3 h-3   " alt="points">
                        </div> -->
                    </div>
                </div>
            </div>
            <div class=" ">
                <span class="material-icons cursor-pointer" v-if="$route.name === 'profile'" @click="togleMore()">more_vert</span>
  
            </div>
        </div>
        <div class="w-full text-start text-xs xl:text-sm pl-1 pr-1 pt-2 pb-2 roboto">
            <h3 class="roboto" v-if="props.post.plate_name"><span># </span>{{ props.post.plate_name }}</h3>
            <p v-if="props.post.description">{{ props.post.description }}</p>
        </div>
       <div class="shadow-lg pb-3 pt-3 rounded-lg">
        <div class="w-full flex justify-center">
            <div class="h-72 sm:h-80 mb-3  xl:h-96  lg:h-96 w-full relative " v-if="props.post.image">
                <img :src="'http://localhost:8000'+props.post.image" class=" shadow-lg rounded-sm w-full h-full object-cover" alt="profile">
            </div>
        </div>
        <div class="w-full  flex items-center justify-center pl-2 pr-3">
            <div class=" w-full relative flex gap-3 justify-start items-start ">
                <div class="flex justify-center gap-1 items-center">
                <img src="../../assets/icons/post-comment.svg"   class="w-5 h-5 cursor-pointer" alt="comment">
                <p class="roboto text-sm">7273</p>
                </div>
                <div class="flex justify-center gap-1 items-center">
                <!--  <img src="../../assets/icons/post-arrow-top-nofill.svg"  class="w-5 h-5 cursor-pointer" alt="arrow-top-nofill">-->
                    <img src="../../assets/icons/post-arrow-top-fill.svg"  class="w-5 h-5 cursor-pointer" alt="arrow-top-fill">
                    <p class="roboto text-sm">7273273</p>
                    <img src="../../assets/icons/post-arrow-bottom-nofill.svg" class="w-5 h-5 cursor-pointer" alt="arrow-bottom-nofill">
                <!-- <img src="../../assets/icons/post-arrow-bottom-fill.svg"  class="w-5 h-5 cursor-pointer" alt="arrow-bottom-fill">-->
                <p class="roboto text-sm">13</p>
                </div>
                <div class="flex  justify-center items-center ">
                    <img src="../../assets/icons/post-save.svg" class="w-8 h-7 cursor-pointer" alt="post-save">
                <!--<img src="../../assets/icons/post-save-full.svg" class="w-5 h-5 cursor-pointer" alt="post-save-fill">--> 
                </div>
                
            </div>
            <div class="w-20 lg:w-28 xs:w-16" v-if="props.post.restaurant_link">
                <a target="_blank" :href="props.post.restaurant_link">

                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-10 md:h-8 rounded-lg text-xs  w-10/12 ">GET</button>
                </a>
            </div>
        </div>
       </div>
       <div class=" absolute right-7 z-999 xl:w-1/4  sm:w-1/3 w-1/2 shadow-lg" v-if="showModal ">
            <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg  shadow-sm">
                <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:bg-main_color_dark cursor-pointer">
                    <span class="material-icons">edit</span>
                    <p class="text-sm">Edit</p>

                </div>
                <hr>
                <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:bg-main_color_dark cursor-pointer">
                    <span class="material-icons">delete</span>
                    <p class="text-sm" >Delete</p>
                </div>
            </div>
        </div>
       
    </article>
</template>
<script setup>
 import { ref } from 'vue';

 const showModal = ref(false);
 const props = defineProps({
      post: {
        type: Object,
        required: true,
        default: () => ({}) // Default value is an empty object
      }
    });
    
   function togleMore(){
    showModal.value = !showModal.value;
   }

</script>