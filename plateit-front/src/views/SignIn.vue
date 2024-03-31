<template>

    <main class=" bg-main_color dark:bg-gradient-to-r from-auth_png_color via-auth_png_color to-main_color_dark w-full md:w-full h-screen flex">
    
        <!-- Primary Column with Picture -->
        <div class="w-1/2 hidden md:flex lg:flex h-full justify-center bg-auth_png_color  items-center">
          <img src="../assets/images/auth-logo.png" alt="Image" class="">
        </div>
        <!-- Login Form Column -->
        <div class="w-full lg:w-1/2 md:w-1/2 2xl:w-1/2  bg-transparent p-8 flex justify-center flex-col  items-center ">
          <div class="flex flex-col w-full xl:w-3/4">
            <h2 class="text-2xl font-semibold mb-4 align-self-start text-main_text_color dark:text-white roboto ">Sign in</h2>
            <span class=" font-sm text-xs mb-4 align-self-start text-main_text_color dark:text-white roboto ">Not a member?   <router-link :to="{ name : 'SignUp' }"><small class=" roboto  text-sidebar_color dark:text-secondary_color hover:text-btn_submit ">Join PLATEIT</small></router-link></span>
            <form>
              <div class="mb-4">
                <input type="email"  name="email" placeholder="Email" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 ">
              </div>
              <div> 
                <input v-if="showPassword" type="text"  name="password" placeholder="Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 ">
                <input v-else="showPassword" type="password"  name="password" placeholder="Password" class="mt-1 block w-full bg-secondary_color border-none outline-none rounded-sm shadow-sm  sm:text-sm h-10 pl-2 focus:bg-slate-100 ">
                  <button class="m-0 p-0" @click="toggleShow">
                    <span >
                      <i  :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                    </span>
                  </button>
              </div>
              <button  type="button" class="w-full bg-sidebar_color text-white py-2 px-4 rounded-md hover:bg-btn_submit_hover outline-none  roboto ">Sign in</button>
              <div class="flex justify-end items-center mt-3">
                <span class=" font-sm text-xs mb-4 align-self-start text-main_text_color dark:text-white ">
                   <small class="  text-sidebar_color dark:text-secondary_color hover:text-btn_submit roboto ">Forgot your password?</small>
                </span>
              </div>
            </form>
          </div>
        </div>
    
      </main>
    </template>
    <script>
    export default {
      data() {
        return {
          showPassword: false,
          password: null
        };
      },
      computed: {
        buttonLabel() {
          return (this.showPassword) ? "Hide" : "Show";
        }
      },
      methods: {
        toggleShow() {
          this.showPassword = !this.showPassword;
        }
      }
    };
    </script>