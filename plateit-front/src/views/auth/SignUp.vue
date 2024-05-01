<template>
    <div class="w-full h-screen flex  items-center justify-center bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark" v-if="store.preloading">
        <PreLoading class="w-full  flex  items-center justify-center"/>
    </div>
    <main class=" bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark w-full md:w-full h-screen flex" v-else>
        <!-- Primary Column with Picture -->
        <div class="w-1/2 hidden md:flex lg:flex h-full justify-center bg-auth_png_color  items-center">
          <img src="../../assets/images/auth-logo.png" alt="Image" class="">
        </div>
        <!-- Login Form Column -->
        <div class="w-full lg:w-1/2 md:w-1/2 2xl:w-1/2  bg-transparent p-8 flex justify-center flex-col  items-center ">
          <div class="flex flex-col w-full xl:w-3/4 relative">
            <div class="absolute inset-0 flex items-center justify-center" v-if="IsLoading">
              <div class="w-full h-full flex items-center justify-center relative">
                <PreLoading class=" flex items-center justify-center" />
              </div>
            </div>
            <h2 class="text-2xl font-semibold mb-4 align-self-start text-main_text_color dark:text-white roboto ">Sign up</h2>
            <form>

              <div class="mb-4">
                <input type="text"  name="fullName" placeholder="Full Name" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="fullName">
              </div>

              <div class="mb-4">
                <input type="email"  name="email" placeholder="Email" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="email">
              </div>

              <div class="mb-4"> 
                <input v-if="showPassword" type="text"  name="password" placeholder="Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="password">
                <input v-else="showPassword" type="password"  name="password" placeholder="Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100  " v-model="password">
                  <button class="absolute " @click="toggleShow">
                    <span >
                      <i  :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                    </span>
                  </button>
              </div>

              <div class="mb-4"> 
                <input v-if="showPassword" type="text"  name="confirm_password" placeholder="Confirm Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="passwordConfirmation">
                <input v-else="showPassword" type="password"  name="confirm_password" placeholder="Confirm Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 " v-model="passwordConfirmation">
                  <button  @click="toggleShow" class="absolute ">
                    <span >
                      <i  :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                    </span>
                  </button>
              </div>

              <div class="mb-4">
                <select type="email"  name="email" placeholder="Email" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm focus:bg-slate-100 sm:text-sm h-10 pl-2 " v-model="role">
                    <option value="" disabled selected hidden >Register As ..</option>                 
                    <option value="user">user</option>
                    <option value="restaurant">restaurant</option>
                </select>
              </div>

              <button  type="button" class="w-full bg-sidebar_color text-white py-2 px-4 rounded-md hover:bg-btn_submit_hover outline-none roboto  " @click="register()">Sign up</button>
        
              <div class="flex justify-end items-center mt-3">
                <span class=" font-sm text-xs mb-4 align-self-start text-main_text_color dark:text-white roboto ">
                    Already have an account?
                   <router-link :to="{ name: 'SignIn' }"><small class="  text-sidebar_color dark:text-secondary_color hover:text-btn_submit roboto ">Sign In </small></router-link>
                </span>
              </div>
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
import 'vue-toast-notification/dist/theme-sugar.css';
import SatAuthHeader from '@/stores/SatAuthHeader'

const IsLoading = ref(false);
const store = MainStore();
const user_store = UserStore();
const router = useRouter();
const $toast = useToast();
const showPassword = ref(false);
const fullName = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const role = ref('');
const validationError = ref(null);


const toggleShow = () => {
  showPassword.value = !showPassword.value;
};

const register = () => {
  IsLoading.value = true;
  axios.post(store.laravelApi + 'auth/register', {
    fullName: fullName.value,
    email: email.value,
    password: password.value,
    password_confirmation: passwordConfirmation.value,
    role: role.value,
  })
  .then((response) => {
    if(response.status === 200){
    const token = response.data.access_token;
    localStorage.setItem('access_token', token);
    localStorage.setItem('IsLogin', true);
    localStorage.setItem('user_id', JSON.stringify(response.data.user.id));
    store.setUserData()
    SatAuthHeader(token)
    router.push({ name: 'home' });
    }
    
  })
  .catch((error) => {
    if (error.response && error.response.status === 422) {
      const validationErrors = error.response.data.errors;
      displayValidationErrors(validationErrors);
    } else {
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
</script>
