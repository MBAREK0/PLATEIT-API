<template>
    <MainLayout>
        <prePage :page="page"/>
    <div class="w-full mt-3 flex lg:justify-center justify-center md:justify-end">
        <div class=" lg:w-3/5 md:w-4/5 w-full flex justify-center lg:px-10 md:px-5 px-5" >
            <div class=" w-full  flex flex-col items-center   ">
                <div class="w-full flex justify-center mt-3">
                    <img src="../assets/logo.png" alt="logo" class="w-1/5">

                </div>
                <div class="w-full flex justify-start items-start flex-col mt-3 text-start ">
                    <div class="flex items-center gap-3">
                      <span class="material-icons p-0 m-0   " style="font-size: 1rem;" >restaurant</span>
                      <h3>PLATES</h3>
                    </div>
                    <p class="text-xs roboto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil quia tempora eligendi. Officiis corporis minus saepe, dicta cupiditate exercitationem aliquid eaque quo? Eum dolore ut, odio tempore a deserunt enim!
                    </p>

                </div>
                <section class="w-full h-screen  flex  items-center justify-center"  v-if="P_store.postLoading">
                            <div class="loader"></div>
                </section>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-10 mt-6" v-else-if="gifts && gifts.length>0">
                   
                    <div class="flex flex-col gap-2" v-for="gift in gifts" :key="gift.id">
                      <gift :gift="gift" /> 
                      <div class="flex justify-between items-center">
                        <div class="flex gap-2 text-xs roboto items-center">
                          <span>{{gift.PointsCost}}</span>
                            <img src="../assets/icons/points.svg" class="w-3 h-3" alt="points icon">
                          </div>
                            <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  rounded-md text-xs font-bold  px-1 py-1"  @click="claim_gift(gift.id)">GET</button>
                          </div>
                          <p class="text-xs roboto ">{{gift.description}}</p>
                    </div>
                </div>
                <div class=" w-full h-screen items-center justify-center flex " v-else>
                            <p class="text-center dark:text-white text-main_text_color">No gifts available Please try agrin later</p>
                </div>
 
                <div class="backdrop" @click="store.toggleAllModels()"  v-if="store.backdrop"></div>
            </div>
        </div>
    </div>
    
    </MainLayout>
</template>

<script setup>
import  MainLayout  from "../components/MainLayout.vue";
import  gift  from "../components/component/GiftCard.vue";
import prePage from "../components/component/PrePage.vue";
import { PostStore } from "@/stores/PostStore";
import { onMounted , ref} from 'vue';
import axios from 'axios';

import { MainStore } from "../stores/MainStore";

   const store = MainStore();
   const P_store = PostStore();
  const page = "Market Place";
  const gifts = ref([]);
  const get_gifts = async () => {
    P_store.postLoading = true;
  try {
    const response = await axios.get(store.laravelApi + 'get_gifts');

    gifts.value = response.data.data;
  

  } catch (error) {
    console.error('Error fetching saved posts:', error);
  }
  P_store.postLoading = false ;
};

const claim_gift = async (gift) => {
    P_store.postLoading = true;
       await axios.post(store.laravelApi + 'claim_gifts', {
          
                gift_id:gift
            
        })
        .then(response => {
          
          store.showSuccesToast(response.data.messge)

        })
        .catch(error =>{
            console.log('error',error.response.data.message);
            store.showErrorToast(error.response.data.error)
        });
        P_store.postLoading = false ;
    }


onMounted(() => {
    get_gifts();
});


</script>

<style scoped>

/* loader */
.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  border-radius: 50%;
}

.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  width: 36px;
  height: 36px;
}

.loader {
  border: 4px solid rgba(0, 0, 0, .1);
  border-left-color: transparent;
  width: 36px;
  height: 36px;
  animation: spin89345 1s linear infinite;
}

@keyframes spin89345 {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>