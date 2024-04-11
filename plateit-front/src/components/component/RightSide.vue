<template>
    <div class="  flex flex-col gap-4  h-screen pl-3 pr-3 ">
        <span class="material-icons text-2xl absolute top-2 right-2 phone tablet" @click="store.toggleTrendSidebar()">close</span>
        <div class="flex flex-col items-center ">
            <div class="relative w-10/12 mt-10 ">
                <input type="text" class="border border-black-300 focus:border-black-300 outline-none rounded-lg py-1 px-3 w-full" placeholder="Search...">
                <span class="material-icons absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer">search</span>
            </div>
        </div>

        <div class="flex flex-col gap-4  w-full h-full">
            <div class=" flex flex-col gap-4 justify-start items-center  h-1/2">
                <div class="flex  gap-2 justify-start w-full pt-3 pb-3 ">
                    <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.55556 0.785714C1.55556 0.57733 1.47361 0.37748 1.32775 0.23013C1.18189 0.0827803 0.984057 0 0.777778 0C0.571498 0 0.373668 0.0827803 0.227806 0.23013C0.0819444 0.37748 8.10665e-08 0.57733 8.10665e-08 0.785714V5.5C-0.000182895 6.40566 0.309387 7.28356 0.876317 7.98514C1.44325 8.68671 2.23272 9.16887 3.11111 9.35V21.2143C3.11111 21.4227 3.19306 21.6225 3.33892 21.7699C3.48478 21.9172 3.68261 22 3.88889 22C4.09517 22 4.293 21.9172 4.43886 21.7699C4.58472 21.6225 4.66667 21.4227 4.66667 21.2143V9.35C5.54506 9.16887 6.33453 8.68671 6.90146 7.98514C7.46839 7.28356 7.77796 6.40566 7.77778 5.5V0.785714C7.77778 0.57733 7.69583 0.37748 7.54997 0.23013C7.40411 0.0827803 7.20628 0 7 0C6.79372 0 6.59589 0.0827803 6.45003 0.23013C6.30417 0.37748 6.22222 0.57733 6.22222 0.785714V5.5C6.22248 5.98766 6.073 6.46339 5.7944 6.86163C5.5158 7.25987 5.12179 7.56102 4.66667 7.72357V0.785714C4.66667 0.57733 4.58472 0.37748 4.43886 0.23013C4.293 0.0827803 4.09517 0 3.88889 0C3.68261 0 3.48478 0.0827803 3.33892 0.23013C3.19306 0.37748 3.11111 0.57733 3.11111 0.785714V7.72357C2.65599 7.56102 2.26198 7.25987 1.98338 6.86163C1.70478 6.46339 1.5553 5.98766 1.55556 5.5V0.785714ZM12.4444 21.2143V11H10.1111C9.90483 11 9.707 10.9172 9.56114 10.7699C9.41528 10.6225 9.33333 10.4227 9.33333 10.2143V3.92857C9.33333 2.88671 9.84044 1.91243 10.5327 1.21157C11.2264 0.512286 12.1909 0 13.2222 0C13.4285 0 13.6263 0.0827803 13.7722 0.23013C13.9181 0.37748 14 0.57733 14 0.785714V21.2143C14 21.4227 13.9181 21.6225 13.7722 21.7699C13.6263 21.9172 13.4285 22 13.2222 22C13.0159 22 12.8181 21.9172 12.6722 21.7699C12.5264 21.6225 12.4444 21.4227 12.4444 21.2143Z" fill="white"/>
                    </svg>
                    <p class="roboto"> Trend Restaurant </p>
                </div>

              <div class="w-full  overflow-y-scroll Trend-Restaurant ">
                <div class="flex justify-center w-full items-start gap-2">
                    <div class="acc w-full mb-3 justify-self-end flex items-center gap-2 md:gap-1  ">
                        <div>
                            <img src="../../assets/images/postexample.png" class="profile-pic" alt="profile">
                        </div>
                        <div class="lg:text-sm xl:text-md md:text-sm sm:text-xs text-start  inter flex flex-col justify-start items-start">
                            <p class="text-xs">Restaurant </p>
                            <small class="opacity-75">address</small> 
                        </div>
                    </div>

                    <div class="w-1/3 flex justify-center items-center gap-2">
                        <p class="text-md hover:ms-3 translate-x-0 duration-75 cursor-pointer roboto">1250</p>
                        <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 21C4.70072 21 0 16.2993 0 10.5C0 4.70072 4.70072 0 10.5 0C16.2993 0 21 4.70072 21 10.5C21 16.2993 16.2993 21 10.5 21ZM15.75 10.2126V5.25H13.4827V10.1555C13.4827 12.3296 11.6097 12.2246 11.6097 12.2246V5.25H9.33253V12.2246C9.33253 12.2246 7.51734 12.2437 7.51734 10.1837V5.25H5.25V10.0012C5.25 13.9486 8.71762 14.0923 9.32334 14.0923V14.8588H7.93012V15.8839H9.32597V17.0625H11.6097V15.8839H13.0692V14.8588H11.6097V14.1028C13.5017 14.1028 15.75 13.1152 15.75 10.2126Z" fill="white"/>
                        </svg>
                    </div>
                </div>
              </div>                

                
            </div>

            <div class=" flex flex-col gap-4 justify-start items-center  h-1/2">
                <div class="flex  gap-2 justify-start w-full pt-3 pb-3 ">
                    <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.55556 0.785714C1.55556 0.57733 1.47361 0.37748 1.32775 0.23013C1.18189 0.0827803 0.984057 0 0.777778 0C0.571498 0 0.373668 0.0827803 0.227806 0.23013C0.0819444 0.37748 8.10665e-08 0.57733 8.10665e-08 0.785714V5.5C-0.000182895 6.40566 0.309387 7.28356 0.876317 7.98514C1.44325 8.68671 2.23272 9.16887 3.11111 9.35V21.2143C3.11111 21.4227 3.19306 21.6225 3.33892 21.7699C3.48478 21.9172 3.68261 22 3.88889 22C4.09517 22 4.293 21.9172 4.43886 21.7699C4.58472 21.6225 4.66667 21.4227 4.66667 21.2143V9.35C5.54506 9.16887 6.33453 8.68671 6.90146 7.98514C7.46839 7.28356 7.77796 6.40566 7.77778 5.5V0.785714C7.77778 0.57733 7.69583 0.37748 7.54997 0.23013C7.40411 0.0827803 7.20628 0 7 0C6.79372 0 6.59589 0.0827803 6.45003 0.23013C6.30417 0.37748 6.22222 0.57733 6.22222 0.785714V5.5C6.22248 5.98766 6.073 6.46339 5.7944 6.86163C5.5158 7.25987 5.12179 7.56102 4.66667 7.72357V0.785714C4.66667 0.57733 4.58472 0.37748 4.43886 0.23013C4.293 0.0827803 4.09517 0 3.88889 0C3.68261 0 3.48478 0.0827803 3.33892 0.23013C3.19306 0.37748 3.11111 0.57733 3.11111 0.785714V7.72357C2.65599 7.56102 2.26198 7.25987 1.98338 6.86163C1.70478 6.46339 1.5553 5.98766 1.55556 5.5V0.785714ZM12.4444 21.2143V11H10.1111C9.90483 11 9.707 10.9172 9.56114 10.7699C9.41528 10.6225 9.33333 10.4227 9.33333 10.2143V3.92857C9.33333 2.88671 9.84044 1.91243 10.5327 1.21157C11.2264 0.512286 12.1909 0 13.2222 0C13.4285 0 13.6263 0.0827803 13.7722 0.23013C13.9181 0.37748 14 0.57733 14 0.785714V21.2143C14 21.4227 13.9181 21.6225 13.7722 21.7699C13.6263 21.9172 13.4285 22 13.2222 22C13.0159 22 12.8181 21.9172 12.6722 21.7699C12.5264 21.6225 12.4444 21.4227 12.4444 21.2143Z" fill="white"/>
                    </svg>
                    <p class="roboto"> Collaborations </p>
                </div>

                <div class="flex justify-center w-full items-start gap-2">
                    <div class="acc w-full mb-3 justify-self-end flex items-center gap-2 md:gap-1  ">
                        <div>
                            <img src="../../assets/images/giftexampl.jpg" class="profile-pic" alt="profile">
                        </div>
                        <div class="lg:text-sm xl:text-md md:text-sm sm:text-xs text-start  inter flex flex-col justify-start items-start">
                            <p class="text-xs">Restaurant </p>
                            <small class="opacity-75 text-xs">collaboration</small> 
                        </div>
                    </div>

                    <div class="w-1/3 flex justify-center items-center gap-2">
                        <p class="text-md hover:ms-3 translate-x-0 duration-75 cursor-pointer roboto">1250</p>
                        <svg class=" points-icon   w-5 h-5 md:w-5 md:h-5 sm:w-4 sm:h-4 xs:w-4 xs:h-4  " viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 21C4.70072 21 0 16.2993 0 10.5C0 4.70072 4.70072 0 10.5 0C16.2993 0 21 4.70072 21 10.5C21 16.2993 16.2993 21 10.5 21ZM15.75 10.2126V5.25H13.4827V10.1555C13.4827 12.3296 11.6097 12.2246 11.6097 12.2246V5.25H9.33253V12.2246C9.33253 12.2246 7.51734 12.2437 7.51734 10.1837V5.25H5.25V10.0012C5.25 13.9486 8.71762 14.0923 9.32334 14.0923V14.8588H7.93012V15.8839H9.32597V17.0625H11.6097V15.8839H13.0692V14.8588H11.6097V14.1028C13.5017 14.1028 15.75 13.1152 15.75 10.2126Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                
            </div>
 
        </div>
    </div>

</template>

<script>
  import { MainStore } from "../../stores/MainStore";

  export default {

    setup() {
      const store = MainStore();
      return {store}
    }
  };
</script>
<style scoped>
@media (min-width: 1024px){
.points-icon {
    margin-left: 0.18rem;
}
}
@media (min-width: 768px){
.points-icon {
    margin-left: 0.18rem;
}
}
.acc{
    justify-self: flex-end !important;
}
.flex{
    display: flex !important;
}
@media (min-width: 320px){
    .points-icon {
    margin-left: 0.3rem;
}

}



</style>