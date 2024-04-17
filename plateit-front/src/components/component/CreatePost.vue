<template>
    <div class="w-full flex justify-center">

  
    <div class=" tablet-mini-phone w-full bg-secondary_color dark:bg-secondary_color_dark sm:h-36 xs:h-32 mt-5   rounded-lg m-0 p-2 pt-5  flex flex-col justify-between ">
        <div class="acc w-full flex items-center gap-2 md:gap-1   ">
            <div class="flex items-center justify-start gap-1" >
                <img src="../../assets/images/auth.jpg" class="profile-pic" alt="profile">
            </div>
            <div class=" text-start  inter w-full">
                <input type="text " class="bg-transparent outline-none  w-full dark:text-white placeholder-white-important " placeholder="New Plate...">
            </div>
        </div>
        <div class=" w-full  flex items-center justify-between gap-2 md:gap-1  pl-3 pr-3  ">
           <div class="flex items-center gap-4 xs:gap-3 cursor-pointer">
            <div>
                <img src="../../assets/icons/pic-icon .svg" alt="pic">
            </div>
            <div>
                <img src="../../assets/icons/location-icon.svg" alt="location">
            </div>
            <div>
                <img src="../../assets/icons/restaurant-icon.svg" alt="restaurant">
            </div>
            <div>
                <img src="../../assets/icons/plate-icon.svg" alt="plate">
            </div>
           </div>
           <div class="w-20 lg:w-28 xs:w-16">
            <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-10 md:h-8 rounded-lg text-lg  w-10/12 " @click="store.togglePostModel()">Post</button>

           </div>
           
        </div>    
    </div>
</div>
</template>

<script>
  import { MainStore } from "../../stores/MainStore";

export default {
    name: 'CreatePost',
    setup() {
      const store = MainStore();
      return {store}
    }
}
</script>

<style scoped>
@media (min-width: 768px) and (max-width:1024px){
    .tablet-mini-phone{
        width: 90% !important;
    }
}
@media  (max-width:320px){
    .tablet-mini-phone{
        width: 90% !important;
    }
}



</style>