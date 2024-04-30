<template>
    <div class="fixed w-1/2 z-999">
        <div class="mt-4  flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg p-4 shadow-sm">

            

            <div class="mt-4 flex flex-row space-x-2 items-end text-start">
                <div class="flex-1">
                <label class="text-main_text_color text-xs " for="emotions"> Platee Name</label>
                <input v-model="plate_name" placeholder="Platee Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions" type="text">
                </div>
              
                <div class="  flex-1 text-start m-0">
                    <label class="text-main_text_color text-xs  " for="symbols">Restaurant Name </label>
                    <v-select
                    v-model="restaurant_id"
                    :options="restaurants"
                    placeholder="restaurant"
                    label="fullName"
                    class="w-full bg-white rounded-md  text-main_text_color  p-0 m-0"
                    ></v-select>   
               </div>

            <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white   rounded-lg text-xs  md:w-32  h-8 w-24" @click="NoRestaurant=!NoRestaurant">Add One</button>

            </div>

            <div class="mt-4 flex flex-row space-x-2 text-start" v-if="NoRestaurant">
                <div class="flex-1">
                <label class="text-main_text_color text-xs " for="emotions"> Resturant Name</label>
                <input v-model="restaurant_Name" placeholder="Resturant Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions" type="text">
                </div>

                <div class="flex-1 text-start">
                <label class="text-main_text_color text-xs " for="symbols">Resturant Link </label>
                <input v-model="restaurant_link" placeholder="http://" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" type="text">
                </div>
            </div>

            <div class="mt-4 text-start">
                <label class="text-main_text_color text-xs " for="description">Description</label>
                <textarea v-model="description" placeholder="Describe your plate" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="description"></textarea>
            </div>

            <div class="mt-4 text-start">
                <img :src="imagePreview" alt="Selected Image" v-if="imagePreview">
            </div>
            
            <div class="mt-4 flex justify-between ">
                <div class="mt-4 flex flex-row space-x-2 text-start ms-2">
                <div class="flex-1">
                    <div class="messageBox">
                        <div class="fileUploadWrapper">
                            <label for="file">
                                <img src="../../../assets/icons/pic-icon .svg" alt="pic"> 
                            </label>
                            <input type="file" id="file" name="file" class="hidden" @change="handleFileChange" />
                        </div>
                    </div>
                </div>
                </div>
                <div class=" flex justify-between gap-5">
                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-8 md:h-8 rounded-lg text-xs  w-24 " @click="handleSubmit ">Post</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { MainStore } from "../../../stores/MainStore";
import { UserStore } from "../../../stores/UserStore";
import { PostStore } from "../../../stores/PostStore";
import axios from "axios";
import vSelect from 'vue-select';
import {onMounted, ref } from 'vue';     
    const NoRestaurant = ref(false);
    const plate_name = ref('');
    const restaurant_Name = ref('');
    const restaurant_link = ref('');
    const restaurant_id = ref('');
    const description = ref('');
    const store = MainStore();
    const restaurants = ref([]);
    const file = ref(null);
    const imagePreview = ref('');
    const P_store = PostStore();

    const handleFileChange = (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile instanceof Blob) {
        file.value = selectedFile;
        const reader = new FileReader();
        reader.onload = () => {
            imagePreview.value = reader.result;
        };
        reader.readAsDataURL(selectedFile);
    } else {
        console.error('Selected file is not a valid Blob object.');
    }
};

const handleSubmit = () => {
  
    const formData = new FormData();
  
    
    formData.append('plate_name', plate_name.value);
    formData.append('restaurant_Name', restaurant_Name.value);
    formData.append('restaurant_link', restaurant_link.value);
    if(restaurant_id.value.restaurant_id)
    formData.append('restaurant_id', restaurant_id.value.restaurant_id);
    formData.append('description', description.value);
    if(file.value)
    formData.append('image', file.value);


    axios.post(store.laravelApi + 'publication/save_post', formData)
        .then(response => {
          
            const new_post = response.data.post; 
            P_store.posts.unshift(new_post);
            store.showSuccesToast(response.data.message)
        })
        .catch(error => {
            if (error.response && error.response.status === 422)
            store.showErrorToast(error.response.data.error);
            else
            console.error(error);

        });
    store.togglePostModel();
};

const get_all_restaurants = () => {
    axios.get(store.laravelApi + 'get_all_restaurants')
        .then(response => {
     
            restaurants.value = response.data.restaurants;
        })
        .catch(error => {
            console.error(error);
        });
};
   
onMounted(() => {
    get_all_restaurants();
});
</script>

