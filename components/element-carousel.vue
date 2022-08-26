<template>
  <Carousel class="px-5" :items-to-show="2.5" :wrap-around="true">
    <Slide v-for="slide in 3" :key="slide">
        <div class="shadow-2xl p-4  bg-white carousel__item">
            <p class="mb-5 py-3 flex "> <img src="./../assets/img/acceuil-image/im29.PNG" alt=""> <span class="px-5 my-auto"> <b> johana</b></span></p>
                <p class="mb-5 text-left"> Lorem ipsum dolor sit amet, 
                 consectetur adipiscing elit. Praesent  
                   congue metus vel </p>
                <div class="flex justify-end gap-2" style="color:#F7CB29;">
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                </div>
        </div>
      <!-- <div class="shadow-2xl px-10 py-5 element-sha bg-white carousel__item"> 
                <p class="mb-5 py-3 flex "> <img src="./../assets/img/acceuil-image/im29.PNG" alt=""> <span class="px-5 my-auto"> <b> johana</b></span></p>
                <p class="mb-5"> Lorem ipsum dolor sit amet,<br> 
                 consectetur adipiscing elit. Praesent <br> 
                   congue metus vel </p>
                <div class="flex justify-end gap-2" style="color:#F7CB29;">
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                </div>
        </div>
    

    
      <div class="shadow-2xl px-10 py-5 element-sha bg-white carousel__item"> 
                <p class="mb-5 py-3 flex "> <img src="./../assets/img/acceuil-image/im29.PNG" alt=""> <span class="px-5 my-auto"> <b> johana</b></span></p>
                <p class="mb-5"> Lorem ipsum dolor sit amet,<br> 
                 consectetur adipiscing elit. Praesent <br> 
                   congue metus vel </p>
                <div class="flex justify-end gap-2" style="color:#F7CB29;">
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                </div>
        </div>
    
    
      <div class="shadow-2xl px-10 py-5 element-sha bg-white carousel__item"> 
                <p class="mb-5 py-3 flex "> <img src="./../assets/img/acceuil-image/im29.PNG" alt=""> <span class="px-5 my-auto"> <b> johana</b></span></p>
                <p class="mb-5"> Lorem ipsum dolor sit amet,<br> 
                 consectetur adipiscing elit. Praesent <br> 
                   congue metus vel </p>
                <div class="flex justify-end gap-2" style="color:#F7CB29;">
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                </div>
        </div>
    
    
      <div class="shadow-2xl px-10 py-5 element-sha bg-white carousel__item"> 
                <p class="mb-5 py-3 flex "> <img src="./../assets/img/acceuil-image/im29.PNG" alt=""> <span class="px-5 my-auto"> <b> johana</b></span></p>
                <p class="mb-5"> Lorem ipsum dolor sit amet,<br> 
                 consectetur adipiscing elit. Praesent <br> 
                   congue metus vel </p>
                <div class="flex justify-end gap-2" style="color:#F7CB29;">
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                   <i  class="fa-solid fa-star"></i>
                </div>
        </div> -->
    </Slide>

    <!-- <template #addons>
      <Navigation />
    </template> -->
  </Carousel>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
  name: 'WrapAround',
  components: {
    Carousel,
    Slide,
    Navigation,
  },
});
</script>

<style>
.carousel__item {
  min-height: 200px;
  width: 100%;
  /* background-color: var(--vc-clr-primary); */
  /* color:  var(--vc-clr-white); */
  font-size: 20px;
  /* border-radius: 8px; */
  /* display: flex;
  justify-content: center;
  align-items: center; */
}

.carousel__slide {
  padding: 5px;
  min-width: 230px
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
}

@media screen and (max-width: 430px){
        .carousel__item {
            padding: 10px;
            font-size: medium;
        }
        .carousel__item p{
            margin-bottom: 10px;
        }
        .carousel__item p:first-child{
            margin-bottom: 0px;
        }
}
</style>