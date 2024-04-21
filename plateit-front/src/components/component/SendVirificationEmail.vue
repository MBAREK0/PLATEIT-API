<template>
    <div  class="verification-message w-full  flex justify-around items-center">
      
      <p class="   text-black roboto text-xs md:text-sm lg:text-md  items-center "> Your account is not verified. Click for verify your email {{ email }} </p>

      <button  class="bg-btn_primary_color hover:bg-btn_submit_hover h-10  rounded-lg text-white roboto text-sm px-3 items-center " v-if="sending">sending email ...</button>
      <button  @click="SendVerifyEmail" class="bg-btn_primary_color hover:bg-btn_submit_hover h-10  rounded-lg text-white roboto text-sm px-3 items-center " v-else>Verify Your Email</button>

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
var sending =ref(false);
const store = MainStore();
const email = store.user.email;
const $toast = useToast();

  
const SendVerifyEmail = () => {
    sending.value = true ;
   axios.post(store.laravelApi + 'auth/resend_email_verification_link', {
   email: email,
 })
 .then((response) => {
   if(response.status === 200){
   const message = response.data.message;
   showSuccesToast(message + ' please check your email inbox or spam folder for the verification link');
   }
 })
 .catch((error) => {
    showErrorToast('An unexpected error occurred. Please try again later.');
     console.error('Error:', error.message);
   
 });
 sending.value = false ;

}

const showErrorToast = (errorMessage) => {
   $toast.error(errorMessage, {
     position: 'bottom-right',
     duration: 6000,
   });
 };
const showSuccesToast = (errorMessage) => {
 $toast.success(errorMessage, {
   position: 'bottom-right',
   duration: 3000,
 });
};
</script>

  <style scoped>
  .verification-message {
    margin: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f7f7f7;
  }
  
  .error-message {
    color: red;
  }
  </style>