<template>
    <div class="fixed z-999">
        <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg p-4 shadow-sm">

            <div class="mt-4 flex flex-row  gap-1 space-x-2 text-start">
                
                <div class=" w-full "> 

                        <div class="h-28  xs:h-36 sm:h-46 overflow-hidden w-full relative  " >
                            <img :src="imageCoverPreview" alt="Selected Image" v-if="imageCoverPreview">
                            <img :src="'http://localhost:8000' + image_cover" class="w-full" alt=" cover profile`" v-else>
                            <div class="flex-1 absolute bottom-1 right-3 ">
                                <div>
                                    <label for="file" class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-300 hover:bg-gray-400 cursor-pointer">
                                <span class="material-icons text-gray-600 text-lg">edit</span>
                                </label>
                                <input type="file" id="file" name="file" class="hidden" accept="image/*" @change="handleCoverImageChange" />

                                </div>
                            </div>
                            
                        </div>
                        <div class="flex justify-start px-5  -mt-16">
                            <div class="relative">
                                <img :src="ProfileimagePreview" class="h-32 w-32 bg-white p-1 rounded-full z-5  " alt="Selected Image" v-if="ProfileimagePreview">
                                <img class="h-32 w-32 bg-white p-1 rounded-full z-5  " :src="'http://localhost:8000' + ProfileImage" :alt="`${fullName} profile`" v-else />
                                <div class="flex-1">
                                    <input type="file" id="file" name="file" class="mt-2"  @change="handleProfileImageChange" />
                                </div>
                            </div>
                        </div>

              </div>
            </div>  

            <div class="mt-4 flex flex-row  gap-1 space-x-2 text-start">
                <div class="flex-1">
                    <label class="text-main_text_color  " for="emotions" >Full Name</label>
                    <input v-model="fullName" placeholder="Platee Name"  class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions" type="text" >
                </div>
                <div class="flex-1" v-if="store.user.role === 'restaurant'">
                   <label class="text-main_text_color  " for="description">Phone Number </label>
                   <input v-model="phone_numbre" type="text"  placeholder="00 00 0000 000 " class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" ></input>
                </div>

            </div>

            <div class="mt-4 flex flex-col  gap-1  text-start" v-if="store.user.role === 'restaurant'" >
               
                  <label class="text-main_text_color  " for="emotions" >Category</label>
                    <v-select
                    v-model="selectedItem"
                    :options="categories"
                    placeholder="Select a category"
                    label="name"
                    class="w-full bg-white rounded-md  text-main_text_color  p-0 m-0"
                    ></v-select>                
            </div>



            <div class="mt-4 flex flex-row gap-1 space-x-2 text-start" v-if="store.user.role === 'restaurant'">
                <div class="flex-1">
                <label class="text-main_text_color  " for="emotions"> Resturant address</label>
                <input  v-model="address" placeholder="Resturant Name" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="emotions"  type="text">
                </div>

                <div class="flex-1 text-start">
                <label class="text-main_text_color  " for="symbols">Resturant web site </label>
                <input v-model="web_site" placeholder="http://" class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" type="text">
                </div>
            </div>


            <div class="flex-1 text-start">
                <label class="text-main_text_color  " for="symbols">bio</label>
                <textarea v-model="bio"  class="w-full bg-white rounded-md border-gray-300 text-main_text_color   px-2 py-1" id="symbols" type="text"></textarea>
                <div class="flex justify-end items-center">
                    <p class="text-main_text_color" v-if="bio">{{ bio.length }}/250</p>
                </div>
            </div>

            <div class="mt-4 flex justify-end  ">
               
                <div class=" flex justify-between  gap-5">
                    <button class="bg-secondary_color border border-sidebar_color_dark hover:bg-btn_submit_hover hover:text-white text-main_text_color  lg:h-8 md:h-8 rounded-lg text-xs  w-24 " @click="store.toggleEditProfileModel()">cansel</button>
                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-8 md:h-8 rounded-lg text-xs  w-24 py-2 " @click="handleSubmit" >save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineComponent, onMounted } from "vue";
import { MainStore } from "../../../stores/MainStore";
import { UserStore } from "../../../stores/UserStore";
import vSelect from 'vue-select';
import { ref } from "vue";
import axios from "axios";
defineComponent({
    components: {
        vSelect,
    }});
    
      const store = MainStore();
      const u_store = UserStore();


    //   ================== info
    const user_id = ref(u_store.profileData.info.id); // user id 
    const fullName = ref(u_store.profileData.info.fullName);
    const ProfileImage = ref(u_store.profileData.info.ProfileImage);
    const bio = ref(u_store.profileData.info.bio);
    const image_cover = ref(u_store.profileData.info.image_cover);
    //   ================== details 
    const address = ref(u_store.profileData.details.address);
    const category = ref(u_store.profileData.details.category);
    const category_id = ref(u_store.profileData.details.category_id);
    const selected_category = ref({ id: category_id.value, name: category.value });
    const phone_numbre = ref(u_store.profileData.details.phone_numbre);
    const web_site = ref(u_store.profileData.details.web_site);
    const categories = ref(store.categories);
    const selectedItem= ref(selected_category);
//    ---------------------------------------- 
    const ProfileimagePreview = ref(null);
    const imageCoverPreview = ref(null);

    const handleProfileImageChange = (event) => {
    const SelectedProfileImage = event.target.files[0];
    if (SelectedProfileImage instanceof Blob) {
        ProfileImage.value = SelectedProfileImage;
        const reader = new FileReader();
        reader.onload = () => {
            ProfileimagePreview.value = reader.result;
        };
        reader.readAsDataURL(SelectedProfileImage);
    } else {
        console.error('Selected file is not a valid Blob object.');
    }
};

    const handleCoverImageChange = (event) => {
    const SelectedCoverImage = event.target.files[0];
    if (SelectedCoverImage instanceof Blob) {
        image_cover.value = SelectedCoverImage;
        const reader = new FileReader();
        reader.onload = () => {
            imageCoverPreview.value = reader.result;
        };
        reader.readAsDataURL(SelectedCoverImage);
    } else {
        console.error('Selected file is not a valid Blob object.');
    }}


    const handleSubmit = () => {
        const formData = new FormData();
    

        formData.append('image_cover', image_cover.value);
        formData.append('ProfileImage', ProfileImage.value);
        formData.append('restaurant_id', user_id.value);
        formData.append('user_id', user_id.value);
        formData.append('fullName', fullName.value);
        formData.append('bio', bio.value);
        formData.append('address', address.value);
        formData.append('web_site', web_site.value);
        formData.append('phone_numbre', phone_numbre.value);
        formData.append('category_id', selected_category.value.id);
        // Send form data to the backend using Axios or other HTTP client
        axios.post(store.laravelApi + 'insert_details', formData)
            .then(response => {
                if (response.status === 200) {
                    // Modify the properties here
                    u_store.profileData.details.category_id = response.data.category_id;
                    u_store.profileData.details.category = response.data.category_name;
                    u_store.profileData.info.ProfileImage = response.data.ProfileImage;
                    store.user.ProfileImage = response.data.ProfileImage;
                    u_store.profileData.info.image_cover = response.data.image_cover;
                    u_store.profileData.info.fullName = response.data.fullName;
                    store.user.fullName = response.data.fullName;
                    u_store.profileData.info.bio = response.data.bio;
                    u_store.profileData.details.address = response.data.address;
                    u_store.profileData.details.phone_numbre = response.data.phone_numbre;
                    u_store.profileData.details.web_site = response.data.web_site;
                }
                store.showSuccesToast(response.data.message)
            })
            .catch(error => {
            if (error.response && error.response.status === 422) {
                
                store.displayValidationErrors(error.response.data.errors);
                
            } else {
                store.displayValidationErrors('error occured while updating profile, please try again later');
                }
            
            });
          
            store.toggleEditProfileModel();
   
        };
      
</script>
<style scoped>
@import "vue-select/dist/vue-select.css";

</style>