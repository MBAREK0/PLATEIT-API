<template>
    <div class="fixed z-999">
        <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg p-4 shadow-sm">

            

            <div class="mt-4 flex flex-row space-x-2 text-start">
                <div class="flex-1">
                <label class="text-main_text_color  " for="emotions"> Platee Name</label>
                <input placeholder="Platee Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions" type="text">
                </div>

                <div class="flex-1 text-start">
                <label class="text-main_text_color  " for="symbols">Price </label>
                <input placeholder="$ 0.00" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" type="text">
                </div>
            </div>
            <div class="mt-4 text-start flex gap-2 justify-between items-end">
                <div class=" flex-1 text-start">
                    <label class="text-main_text_color  " for="symbols">Restaurant Name </label>
                    <select name="restaurant_Name" v-model="Resturant_Name" class="w-full  bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" >
                        <option value="restaurant1">restaurant1</option>
                        <option value="restaurant2">restaurant2</option>
                        <option value="restaurant3">restaurant3</option>
                        <option value="restaurant4">restaurant4</option>
                    </select>
               </div>
               <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white   rounded-lg text-sm py-1  w-1/4 " @click="NoRestaurant=!NoRestaurant">Add One</button>
            </div>
            <div class="mt-4 flex flex-row space-x-2 text-start" v-if="NoRestaurant">
                <div class="flex-1">
                <label class="text-main_text_color  " for="emotions"> Resturant Name</label>
                <input placeholder="Resturant Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions"v-model="Resturant_Name" type="text">
                </div>

                <div class="flex-1 text-start">
                <label class="text-main_text_color  " for="symbols">Resturant Link </label>
                <input placeholder="http//:" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" v-model="Resturant_Name" type="text">
                </div>
            </div>

            <div class="mt-4 text-start">
                <label class="text-main_text_color  " for="description">Description</label>
                <textarea placeholder="Describe your plate" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="description"></textarea>
            </div>




            <div class="mt-4 flex justify-between ">
                <div class="mt-4 flex flex-row space-x-2 text-start ms-2">
                <div class="flex-1">
                    <div class="messageBox">
                        <div class="fileUploadWrapper">
                            <label for="file">
                                <img src="../../../assets/icons/pic-icon .svg" alt="pic"> 
                            </label>
                            <input type="file" id="file" name="file" class="hidden" />
                        </div>
                    </div>
                </div>
                </div>
                <div class=" flex justify-between gap-5">
                    <button class="bg-secondary_color border border-sidebar_color_dark hover:bg-btn_submit_hover hover:text-white text-main_text_color  lg:h-8 md:h-8 rounded-lg text-lg  w-24 " @click="store.togglePostModel()">cansel</button>
                <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-8 md:h-8 rounded-lg text-lg  w-24 " @click="store.togglePostModel()">Post</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { MainStore } from "../../../stores/MainStore";
export default {
    name: 'PlateForm',
    data() {
        return {
            NoRestaurant:false,
            Resturant_Name:''
        };
    },
    setup() {
      const store = MainStore();
      return {store}
    }
};
</script>

<style scoped>
/* Your CSS goes here */
</style>