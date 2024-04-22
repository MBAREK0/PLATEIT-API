<template>
    <div class="fixed z-999">
        <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg p-4 shadow-sm">

            <h2 class=" text-main_text_color   font-bold text-2xl">Add New Plate</h2>

            <div class="mt-4 flex flex-row space-x-2 text-start">
                <div class="flex-1">
                <label class="text-main_text_color  " for="emotions"> Platee Name</label>
                <input v-model="plateName" placeholder="Platee Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions" type="text">
                </div>

                <div class="flex-1 text-start">
                <label class="text-main_text_color  " for="symbols">Price </label>
                <input v-model="price" placeholder="$ 0.00" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" type="text">
                </div>
            </div>
       

            <div class="mt-4 text-start">
                <label class="text-main_text_color  " for="description">Description</label>
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
                            <input type="file" id="file" name="file" class="hidden"   @change="handleFileChange" />
                        </div>
                    </div>
                </div>
                </div>
                <div class=" flex justify-between gap-5">
                    <button class="bg-secondary_color border border-sidebar_color_dark hover:bg-btn_submit_hover hover:text-white text-main_text_color  lg:h-8 md:h-8 rounded-lg text-lg  w-24 " @click="store.toggleMenuModel()">cansel</button>
                <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-8 md:h-8 rounded-lg text-lg  w-24 " @click="handleSubmit()" >Add Plate</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { MainStore } from "../../../stores/MainStore";
import { ref } from "vue";
import axios from "axios";


const store = MainStore();
const plateName = ref('');
const price = ref('');
const description = ref('');
const file = ref(null);
const imagePreview = ref('');

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
    console.log('Selected form file:', file.value);

    formData.append('name', plateName.value);
    formData.append('price', price.value);
    formData.append('description', description.value);
    formData.append('image', file.value);

    // Send form data to the backend using Axios or other HTTP client
    axios.post(store.laravelApi + 'restaurant/save_plate', formData)
        .then(response => {
            store.showSuccesToast(response.data.message)
            console.log('Plate added successfully:', response.data);
        })
        .catch(error => {
        if (error.response && error.response.status === 422) {
            
            store.displayValidationErrors(error.response.data.errors);
            } else {
            console.error('Error adding plate:', error.message);
            }
           
        });
};



</script>