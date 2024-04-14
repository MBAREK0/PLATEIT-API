<template>

    <section class="game-section  relative">
        <div class="btn-conteiner absolute left-5 top-1/2 " @click="scrollLeft">
                    <button class="btn-content" >
                        <span class="icon-arrow">
                            <i class="material-icons">chevron_left</i>
                        </span>
                    </button>
            </div>
        <div class="owl-carousel custom-carousel owl-theme overflow-x-auto w-full px-20 " ref="carousel">
          <div class="item active" style="background-image: url(https://th.bing.com/th/id/OIP.tcSxtD5KQEV0sD6NaEHfnAHaGl?rs=1&pid=ImgDetMain);">
            <div class="item-desc">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">Food Example</h4>
                  <h4 class="text-lg roboto"> 15 $</h4>
                </div>
                <p class="text-xs">Food Example is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                 </p>
            </div>
          </div>
          <div class="item active" style="background-image: url(https://th.bing.com/th/id/R.c8469790d5263afa81ab929649e96846?rik=vTAXoPP24rsM9Q&riu=http%3a%2f%2fimages6.fanpop.com%2fimage%2fphotos%2f43900000%2fBig-Mac-meal-mcdonalds-43949690-1024-1024.jpg&ehk=EA3WeD15eruw4qMY60s9JiM2zpy%2bU2RkjzHUC9Xjc4o%3d&risl=&pid=ImgRaw&r=0);">
            <div class="item-desc">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">Food Example</h4>
                  <h4 class="text-lg roboto"> 15 $</h4>
                </div>
                <p class="text-xs">Food Example is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                 </p>
            </div>
          </div>
          <div class="item active" style="background-image: url(https://th.bing.com/th/id/OIP.p6h7i0Olj6Rok08yY-JI7gHaFu?rs=1&pid=ImgDetMain);">
            <div class="item-desc">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">Food Example</h4>
                  <h4 class="text-lg roboto"> 15 $</h4>
                </div>
                <p class="text-xs">Food Example is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                 </p>
            </div>
          </div>
          <div class="item active" style="background-image: url(https://journalmetro.com/wp-content/uploads/2014/01/happymeal-newyogurt_.jpg?fit=920%2C920);">
            <div class="item-desc">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">Food Example</h4>
                  <h4 class="text-lg roboto"> 15 $</h4>
                </div>
                <p class="text-xs">Food Example is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                 </p>
            </div>
          </div>
          <div class="item active" style="background-image: url(https://www.fastfoodpost.com/wp-content/uploads/2022/02/Del-Taco-Introduces-New-Crispy-Jumbo-Shrimp-Stuffed-Quesadilla-Tacos-Brings-Back-Crispy-Jumbo-Shrimp-Burrito-And-Taco.jpg);">
            <div class="item-desc">
                <div class="flex justify-between items-center">
                  <h4 class="text-lg roboto">Food Example</h4>
                  <h4 class="text-lg roboto"> 15 $</h4>
                </div>
                <p class="text-xs">Food Example is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                 </p>
            </div>
          </div>

        </div>
        <div class="btn-conteiner absolute  right-5 top-1/2" @click="scrollRight">
                    <button class="btn-content" >
                        <span class="icon-arrow">
                            <i class="material-icons">chevron_right</i>
                        </span>
                    </button>
            </div>
    </section>

</template>


<script>
export default {
  mounted() {
    this.$refs.carousel.addEventListener('scroll', this.handleScroll);
    
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

  },
  
};
</script>

<style scoped>

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

</style>