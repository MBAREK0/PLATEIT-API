<template>
  
  <div class="w-full  flex  items-center justify-center"  v-if="store.miniDataPreloading">
    <div class="loader"></div>
  </div>
  <div v-else>
    <section class="game-section  relative" v-if="u_store.$state.menu.length > 0">
    
        <div class="btn-conteiner absolute left-5 top-1/2 hidden md:block " @click="scrollLeft" >
          <button class="btn-content" >
              <span class="icon-arrow">
                  <i class="material-icons">chevron_left</i>
              </span>
          </button>
        </div>

        <div class="owl-carousel custom-carousel owl-theme overflow-x-auto w-full px-20  " ref="carousel"  @scroll="handleScroll()">
  
          <div class="item active relative" :style="{ backgroundImage: 'url(http://localhost:8000' + plate.image + ')' }" v-for="(plate, index) in u_store.$state.menu" :key="plate.id">
            <div v-if="userId == store.$state.user.id">
              <span class="material-icons text-gray-400 cursor-pointer absolute top-4 right-3"  @click="togleMore(index)" style="z-index: 200 !important;">more_vert</span>
              <div class=" absolute  z-999  shadow-lg top-4 right-3" style="z-index: 200 !important; width: 10rem;"  v-if="activeModalIndex === index" >
                <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg  shadow-sm">
                        <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:bg-main_color_dark cursor-pointer"  @click="togleUpdateMenu(plate)">
                            <span class="material-icons">edit</span>
                            <p class="text-sm">Edit</p>

                        </div>
                        <hr>
                        <div class="flex gap-2 items-center px-2 py-1 text-main_text_color hover:text-sidebar_text_color hover:bg-main_color_dark cursor-pointer" @click="handleDeleteSubmit(plate.id)">
                            <span class="material-icons">delete</span>
                            <p class="text-sm" >Delete</p>
                        </div>
                </div>
              </div>
            </div>
            <div class="item-desc w-full">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">{{ plate.name }}</h4>
                  <h4 class="text-lg roboto"> {{ plate.price }} $</h4>
                </div>
                <p class="text-xs w-full mt-3">{{ plate.description }}</p>
            </div>
          </div>
        </div>

        <div class="btn-conteiner absolute  right-5 top-1/2 hidden md:block " @click="scrollRight"  >
          <button class="btn-content" >
              <span class="icon-arrow">
                  <i class="material-icons">chevron_right</i>
              </span>
          </button>
        </div>
    
    </section>
    <div class="inter text-xs " v-else>
            Restaurant does not have a menu yet
    </div>
  </div>
  <div class="Hiddenbackdrop " @click="togleMore()" v-if="Hiddenbackdrop" ></div>
  <!-- edit form  -->
  <div class="Hiddenbackdrop flex justify-center items-center" style="z-index: 900 !important;" v-if="showUpdateModal" >
    <div class="lg:w-1/2 w-10/12"  >
        <div class="mt-4 flex flex-col bg-secondary_color dark:bg-secondary_color_dark rounded-lg p-4 shadow-sm " style="max-height: 40rem !important ; overflow-y: scroll;">

            <h2 class=" text-main_text_color   font-bold text-2xl">Update {{ plateName  }} Plate</h2>

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
                <img :src="'http://localhost:8000' + image" alt=" Image" v-if="image" >
            </div>
            

            <div class="mt-4 flex justify-between items-center ">
                <div class="mt-4 flex flex-row space-x-2 text-start ms-2">
                <div class="flex-1">
                    <div class="messageBox">
                        <div class="fileUploadWrapper">
                            <label for="file">
                                <img src="../../assets/icons/pic-icon .svg" class="hover:h-10 hover:w-7 cursor-pointer transition-transform duration-300" alt="pic">
                            </label>
                            <input type="file" id="file" name="file" class="hidden"   @change="handleFileChange" />
                        </div>
                    </div>
                </div>
                </div>
                <div class=" flex justify-between gap-5">
                    <button class="bg-secondary_color border border-sidebar_color_dark hover:bg-btn_submit_hover hover:text-white text-main_text_color  lg:h-8 md:h-8 rounded-lg text-xs  w-24 " @click="togleUpdateMenu()">cansel</button>
                    <button class="bg-btn_primary_color hover:bg-btn_submit_hover text-white  lg:h-8 md:h-8 rounded-lg text-xs  w-24 " @click="handleUpdateSubmit()" >update Plate</button>
                </div>
            </div>
        </div>
  </div>
  </div>
 
</template>


<script>
import { ref } from 'vue';
import { UserStore } from "@/stores/UserStore";
import { MainStore } from "@/stores/MainStore";
import axios from 'axios';
export default {
  props: {
    userId: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      
      Hiddenbackdrop:false,
      activeModalIndex: null,
    };
  },
  beforeCreate() {
    // const u_store = UserStore();
    // u_store.GetRestaurantMenu(this.userId); 
 
    
    
  },
  beforeDestroy() {
    this.$refs.carousel.removeEventListener('scroll', this.handleScroll);
    
  },
  methods: {
    handleScroll() {
        const container = this.$refs.carousel;
        const containerRect = container.getBoundingClientRect();
        const containerCenter = containerRect.left + containerRect.width / 2;

        const items = container.querySelectorAll('.item');
        let closestItem = null;
        let minDistance = Infinity;

        items.forEach(item => {
            const itemRect = item.getBoundingClientRect();
            const itemCenter = itemRect.left + itemRect.width / 2;
            const distance = Math.abs(containerCenter - itemCenter);

            if (distance < minDistance) {
            minDistance = distance;
            closestItem = item;
            }
        });

        items.forEach(item => {
            item.classList.remove('active');
        });

        closestItem.classList.add('active');
    }
    ,
    scrollLeft() {
            const container = this.$refs.carousel;
            const start = container.scrollLeft;
            const end = container.scrollLeft - 300; 
            const distance = end - start;
            const duration = 500; 
            
            let startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = timestamp - startTime;
                container.scrollLeft = start + (progress / duration) * distance;
                if (progress < duration) {
                window.requestAnimationFrame(step);
                } else {
                container.scrollLeft = end;
                }
            }

            window.requestAnimationFrame(step);
    }
    ,
    scrollRight() {
            const container = this.$refs.carousel;
            const start = container.scrollLeft;
            const end = container.scrollLeft + 300;
            const distance = end - start;
            const duration = 500; 
            
            let startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = timestamp - startTime;
                container.scrollLeft = start + (progress / duration) * distance;
                if (progress < duration) {
                window.requestAnimationFrame(step);
                } else {
                container.scrollLeft = end;
                }
            }

            window.requestAnimationFrame(step);
    },
    togleMore(index) {
      if (this.activeModalIndex === index) {
        this.activeModalIndex = null;
      } else {
        this.activeModalIndex = index;
      }
      this.Hiddenbackdrop = !this.Hiddenbackdrop;
    },

  },
setup() {

    const u_store = UserStore();
    const store = MainStore();
    const showUpdateModal = ref(false);
    const plate_id = ref('');
    const plateName = ref('');
    const price = ref('');
    const description = ref('');
    const file = ref(null);
    const imagePreview = ref('');
    const image = ref('');
    const handleFileChange = (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile instanceof Blob) {
        file.value = selectedFile;
        const reader = new FileReader();
        reader.onload = () => {
            imagePreview.value = reader.result;
            image.value = null;
        };
        reader.readAsDataURL(selectedFile);
    } else {
        console.error('Selected file is not a valid Blob object.');
    }
};
    const handleUpdateSubmit = () => {
        const formData = new FormData();
        // console.log('Selected form file:', file.value);

        formData.append('id', plate_id.value);
        formData.append('name', plateName.value);
        formData.append('price', price.value);
        formData.append('description', description.value);
        if(file.value){
          formData.append('image', file.value);
        }else{
          formData.append('image', image.value);
        }

        axios.post(store.laravelApi + 'restaurant/save_plate', formData)
    .then(response => {
        store.showSuccesToast(response.data.message);
        let updatedPlate = response.data.plate;
        let foundIndex = u_store.$state.menu.findIndex(obj => obj.id === updatedPlate.id); // Find object index by id
        if (foundIndex !== -1) {
            u_store.$state.menu[foundIndex] = updatedPlate;
            console.log('Plate updated successfully:', updatedPlate);
        } else {
            console.error('Plate with ID', updatedPlate.id, 'not found in the menu array.');
        }
        showUpdateModal.value = false;
        plate_id.value = '';
        plateName.value = '';
        price.value = '';
        description.value = '';
        file.value = null;
        imagePreview.value = '';
        image.value = '';
        
    })
    .catch(error => {
        if (error.response && error.response.status === 422) {
            store.displayValidationErrors(error.response.data.errors);
        } else {
            console.error('Error updating plate:', error.message);
        }
    });
            
    };
    const handleDeleteSubmit = (p_id) => {
     
        axios.delete(store.laravelApi + 'restaurant/delete', {
          params: {
            id: p_id}
          
        })
            .then(response => {
                store.showSuccesToast(response.data.message);
                let id = response.data.id;
                let foundIndex = u_store.$state.menu.findIndex(obj => obj.id === id); // Find object index by id
                if (foundIndex !== -1) {
                  u_store.$state.menu.splice(foundIndex, 1);
                    
                } else {
                    console.error('Plate with ID', updatedPlate.id, 'not found in the menu array.');
                }
                
            })
    .catch(error => {
        if (error.response && error.response.status === 422) {
            store.displayValidationErrors(error.response.data.errors);
        } else {
            console.error('Error updating plate:', error.message);
        }
    });
            
    };
    const togleUpdateMenu = (plate = '') => {
      if (plate) {
        plateName.value = plate.name;
        price.value = plate.price;
        description.value = plate.description;
        image.value = plate.image;
        plate_id.value = plate.id;
        showUpdateModal.value = true;
      }else{
        showUpdateModal.value = false;
      }
    };
    return { u_store , showUpdateModal ,handleUpdateSubmit,handleFileChange,
            imagePreview ,image,file,description,price,plateName,togleUpdateMenu,
            handleDeleteSubmit ,store
    };
  },

  
};
</script>

<style scoped>
.transition-transform {
  transition: transform 0.3s ease;
}
/******* Common Element CSS Start ******/
* {
  margin: 0px;
  padding: 0px;
}
body {
  font-family: "Roboto", sans-serif;
  font-size: 16px;
}
.clear {
  clear: both;
}
img {
  max-width: 100%;
  border: 0px;
}
ul,
ol {
  list-style: none;
}
a {
  text-decoration: none;
  color: inherit;
  outline: none;
  transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
}
a:focus,
a:active,
a:visited,
a:hover {
  text-decoration: none;
  outline: none;
}
a:hover {
  color: #e73700;
}
h2 {
  margin-bottom: 48px;
  padding-bottom: 16px;
  font-size: 20px;
  line-height: 28px;
  font-weight: 700;
  position: relative;
  text-transform: capitalize;
}
h3 {
  margin: 0 0 10px;
  font-size: 28px;
  line-height: 36px;
}
button {
  outline: none !important;
}
/******* Common Element CSS End *********/

/* -------- title style ------- */
.line-title {
  position: relative;
  width: 400px;
}
.line-title::before,
.line-title::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  height: 4px;
  border-radius: 2px;
}
.line-title::before {
  width: 100%;
  background: #f2f2f2;
}
.line-title::after {
  width: 32px;
  background: #e73700;
}

/******* Middle section CSS Start ******/
/* -------- Landing page ------- */

.game-section .owl-stage {
  margin: 15px 0;
  display: flex;
  display: -webkit-flex;
}
.game-section .item {
  margin: 0 15px 60px;
  width: 320px;
  height: 400px;
  display: flex;
  display: -webkit-flex;
  align-items: flex-end;
  -webkit-align-items: flex-end;
  background: #343434 no-repeat center center / cover;
  border-radius: 16px;
  overflow: hidden;
  position: relative;
  transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
  cursor: pointer;
}
.game-section .item.active {
  width: 500px;
  box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
  -webkit-box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
}
.game-section .item:after {
  content: "";
  display: block;
  position: absolute;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
  background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
}
.game-section .item-desc {
  padding: 0 24px 12px;
  color: #fff;
  position: relative;
  z-index: 1;
  overflow: hidden;
  transform: translateY(calc(100% - 54px));
  -webkit-transform: translateY(calc(100% - 54px));
  transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
}
.game-section .item.active .item-desc {
  transform: none;
  -webkit-transform: none;
}
.game-section .item-desc p {
  opacity: 0;
  -webkit-transform: translateY(32px);
  transform: translateY(32px);
  transition: all 0.4s ease-in-out 0.2s;
  -webkit-transition: all 0.4s ease-in-out 0.2s;
}
.game-section .item.active .item-desc p {
  opacity: 1;
  -webkit-transform: translateY(0);
  transform: translateY(0);
}
.game-section .owl-theme.custom-carousel .owl-dots {
  margin-top: -20px;
  position: relative;
  z-index: 5;
}
/******** Middle section CSS End *******/

/***** responsive css Start ******/

@media (min-width: 992px) and (max-width: 1199px) {
  h2 {
    margin-bottom: 32px;
  }
  h3 {
    margin: 0 0 8px;
    font-size: 24px;
    line-height: 32px;
  }

  /* -------- Landing page ------- */
  .game-section {
    padding: 50px 30px;
  }
  .game-section .item {
    margin: 0 12px 60px;
    width: 260px;
    height: 360px;
  }
  .game-section .item.active {
    width: 400px;
  }

}

@media (min-width: 768px) and (max-width: 991px) {
  h2 {
    margin-bottom: 32px;
  }
  h3 {
    margin: 0 0 8px;
    font-size: 24px;
    line-height: 32px;
  }
  .line-title {
    width: 330px;
  }

  /* -------- Landing page ------- */
  .game-section {
    padding: 50px 30px 40px;
  }
  .game-section .item {
    margin: 0 12px 60px;
    width: 240px;
    height: 330px;
  }
  .game-section .item.active {
    width: 360px;
  }

}

@media (max-width: 767px) {
  body {
    font-size: 14px;
  }
  h2 {
    margin-bottom: 20px;
  }
  h3 {
    margin: 0 0 8px;
    font-size: 19px;
    line-height: 24px;
  }
  .line-title {
    width: 250px;
  }

  /* -------- Landing page ------- */
  .game-section {
    padding: 30px 15px 20px;
  }
  .game-section .item {
    margin: 0 10px 40px;
    width: 200px;
    height: 280px;
  }
  .game-section .item.active {
    width: 270px;
    box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
    -webkit-box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
  }

}
.custom-carousel {
  display: flex; /* Use flexbox to layout cards */
  flex-wrap: nowrap; /* Prevent cards from wrapping onto multiple lines */
  overflow-x: auto; /* Enable horizontal scrolling */
  -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS devices */
  width: 100%; /* Ensure the container takes full width */
}
.custom-carousel::-webkit-scrollbar {
  display: none !important;
}

.custom-carousel {
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* Internet Explorer 10+ */
}
.item {
  flex: 0 0 auto; /* Allow cards to shrink or grow as needed */
  width: 320px; /* Set a fixed width for the cards */
  margin-right: 15px; /* Add some space between cards */
}
.btn-conteiner {
  display: flex;
  justify-content: center;
  --color-text: #9ee5fa;
  --color-background: rgb(63 96 128);
  --color-outline: #9ee5fa80;
  --color-shadow: #00000080;
  z-index: 100;
}

.btn-content {
  display: flex;
  align-items: center;
  padding: 0px 3px;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
  font-size: 25px;
  color: var(--color-text);
  background: var(--color-background);
  transition: 1s;
  border-radius: 100px;
  box-shadow: 0 0 0.2em 0 var(--color-background);
}

.btn-content:hover,
.btn-content:focus {
  transition: 0.5s;
  -webkit-animation: btn-content 1s;
  animation: btn-content 1s;
  outline: 0.1em solid transparent;
  outline-offset: 0.2em;
  box-shadow: 0 0 0.4em 0 var(--color-background);
  background-color: #1A5DB4;
}

.btn-content .icon-arrow {
  transition: 0.5s;
  margin-right: 0px;
  transform: scale(0.6);
}

.btn-content:hover .icon-arrow {
  transition: 0.5s;
  margin-right: 25px;
}

.icon-arrow {
  width: 20px;
  margin-left: 15px;
  position: relative;
  top: 6%;
}

/* SVG */
#arrow-icon-one {
  transition: 0.4s;
  transform: translateX(-60%);
}

#arrow-icon-two {
  transition: 0.5s;
  transform: translateX(-30%);
}

.btn-content:hover #arrow-icon-three {
  animation: color_anim 1s infinite 0.2s;
}

.btn-content:hover #arrow-icon-one {
  transform: translateX(0%);
  animation: color_anim 1s infinite 0.6s;
}

.btn-content:hover #arrow-icon-two {
  transform: translateX(0%);
  animation: color_anim 1s infinite 0.4s;
}

/* SVG animations */
@keyframes color_anim {
  0% {
    fill: white;
  }

  50% {
    fill: var(--color-background);
  }

  100% {
    fill: #9ee5fa;
  }
}

/* Button animations */
@-webkit-keyframes btn-content {
  0% {
    outline: 0.2em solid var(--color-background);
    outline-offset: 0;
  }
}

@keyframes btn-content {
  0% {
    outline: 0.2em solid var(--color-background);
    outline-offset: 0;
  }
}
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