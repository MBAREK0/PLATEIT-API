<template>
 
    <div class="w-full  flex lg:justify-center justify-center md:justify-end pc ">
            <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center " >    
                <div class="w-full">

                    <div class="bg-sidebar_color dark:bg-sidebar_color_dark w-full h-10 flex items-center pl-3 border-l border-r border-opacity-50 border-white border-1 ">
                        <div class="flex justify-start items-center gap-2">
                            <i class="material-icons cursor-pointer text-white" @click="goToPreviousPage">arrow_back</i>
                            <small class="font-bold text-white">{{ page }} </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </template>
  
  <script>
  export default {
    props: {
    page: String
    },
    methods: {
      goToPreviousPage() {
        // Navigates to the previous page in the browser's history
        this.$router.go(-1);
      }
    }
  };
  </script>