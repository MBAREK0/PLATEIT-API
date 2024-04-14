<template>
   
      <div class="card md:w-56 md:h-32 sm:w-74 sm:h-44  ">
        <div class="card-front w-full h-full">
          <img src="../../assets/images/gift.jpg" class="w-full h-full" alt="location">
        </div>
      </div>
    
</template>
  
<style scoped>
.card {
  transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; /* Added transform to the transition */
}

.card:hover {
  box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
  -webkit-box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
  transform: scale(1.05); /* Slight scale increase on hover */
}
</style>
  