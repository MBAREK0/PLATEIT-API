<template>
    <div class="flex flex-col gap-3 justify-center h-screen w-full items-center">
     <button @click="verifyEmail" class="bg-btn_primary_color hover:bg-btn_submit_hover h-10  rounded-lg text-white roboto text-lg px-3 items-center ">Verify Your Email</button>
     <router-link  to="/">Go to Home</router-link>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useRoute } from 'vue-router';
  import axios from 'axios';
  import { MainStore } from '@/stores/MainStore';
  import { useToast } from 'vue-toast-notification';
 import 'vue-toast-notification/dist/theme-sugar.css';
  
  const route = useRoute();
  const store = MainStore();
  
  // Access query parameters using $route.query
  const email = ref(route.query.email);
  const token = ref(route.query.token);
  const $toast = useToast();
  
    
 const verifyEmail = () => {
     axios.post(store.laravelApi + 'auth/verify_user_email', {
     email: email.value,
     token: token.value,
   })
   .then((response) => {
     if(response.status === 200){
     const message = response.data.message;
     showSuccesToast(message);
     }
   })
   .catch((error) => {
 
     if (error.response && error.response.status === 400) {
       const validationErrors = error.response.data.message;
       showErrorToast(validationErrors);
     } else {
        showErrorToast('An unexpected error occurred. Please try again later.');
       console.error('Error:', error.message);
     }
   });
  
 }
  
  
 const displayValidationErrors = (errors) => {
   for (const field in errors) {
     if (errors.hasOwnProperty(field)) {
       const errorMessage = errors[field][0];
       console.error(`${field}: ${errorMessage}`);
       validationError.value = errorMessage;
       showErrorToast(errorMessage); // Show error toast with the validation message
     }
   }
 };
 
 const showErrorToast = (errorMessage) => {
   $toast.error(errorMessage, {
     position: 'bottom-right',
     duration: 3000,
   });
 };
 const showSuccesToast = (errorMessage) => {
   $toast.success(errorMessage, {
     position: 'bottom-right',
     duration: 3000,
   });
 };
  </script>
  