<template>
    <div class="w-full h-screen flex  items-center justify-center bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark" v-if="store.preloading">
        <PreLoading class="w-full  flex  items-center justify-center"/>
    </div>
    <main class=" bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark w-full md:w-full h-screen flex" v-else>
      <!-- Primary Column with Picture -->
      <div class="w-1/2 hidden md:flex lg:flex h-full justify-center bg-auth_png_color  items-center">
        <img src="../../assets/images/forget-password.png" alt="Image" class="">
      </div>
      <!-- Login Form Column -->
      <div class="w-full lg:w-1/2 md:w-1/2 2xl:w-1/2  bg-transparent p-8 flex justify-center flex-col  items-center ">
        <div class="flex flex-col w-full xl:w-3/4">
          <div class="absolute inset-0 flex items-center justify-center" v-if="IsLoading">
            <div class="w-full h-full flex items-center justify-center relative">
              <PreLoading class=" flex items-center justify-center" />
            </div>
          </div>
          <h2 class="text-2xl font-semibold mb-4 align-self-start text-main_text_color dark:text-white roboto ">Forget Password</h2>
        <form>
            <div class="mb-4">
              <input type="email"  name="email" placeholder="Email" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="email">
            </div>

            <button  type="button" class="w-full bg-sidebar_color text-white py-2 px-4 rounded-md hover:bg-btn_submit_hover outline-none  roboto " @click="forgetPassword">Send Reset Password Email</button>
        </form>
        </div>
      </div>
    </main>
    </template>
  
 <script setup>
 import { MainStore } from '@/stores/MainStore';
 import { UserStore } from '@/stores/UserStore';
 import PreLoading  from '@/components/component/PreLoading.vue'
 import axios from 'axios';
 import { ref } from 'vue';
 import { useRouter } from 'vue-router';
 import { useToast } from 'vue-toast-notification';
 import 'vue-toast-notification/dist/theme-sugar.css'; // Import the desired theme
 
 const IsLoading = ref(false);
 const store = MainStore();
 const user_store = UserStore();
 const router = useRouter();
 const $toast = useToast();
 const email = ref('');
 const validationError = ref(null);
 
 

 const forgetPassword = () => {
   IsLoading.value = true;
   axios.post(store.laravelApi + 'auth/forgetPassword', {
     email: email.value,
   })
   .then((response) => {
     if(response.status === 200){
    const message = response.data.message;
    const reset_token = response.data.reset_token;
    localStorage.setItem('resetToken', reset_token);
    store.showSuccesToast(message);


     }
   })
   .catch((error) => {
     if (error.response && error.response.status === 422) {
       const validationErrors = error.response.data.errors;
       displayValidationErrors(validationErrors);
     } else {
      store.showErrorToast('An unexpected error occurred. Please try again later.');
       console.error('Error:', error.message);
     }
   });
   IsLoading.value = false;
 };
 
 const displayValidationErrors = (errors) => {
   for (const field in errors) {
     if (errors.hasOwnProperty(field)) {
       const errorMessage = errors[field][0];
       console.error(`${field}: ${errorMessage}`);
       validationError.value = errorMessage;
       store.showErrorToast(errorMessage); // Show error toast with the validation message
     }
   }
 };
 

 </script>
 