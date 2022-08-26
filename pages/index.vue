<template>
  <div class="overflow-hidden">
    
    <div class="mb-1"> 
          <bloc-carousel @next="next" @prev="prev"> 
              <carouselSlider v-for="(slide,index) in slides " :key="slide" :index="index" :visibleSlide="visibleSlide" :direction="direction">
                  <img class="w-full  h-96 image-style" :src="slide"/>
              </carouselSlider>
          </bloc-carousel>


      </div>

      <div class="flex  mb-10 " style="background-color:#F5F5F5;">
            <!-- <div class="w-1/6"> 
              
              
            </div> -->

            <div class="w-4/6 mx-auto mb-10 " >
              <div class="flex justify-around mb-10 jour">
                
                <button class=" text-white px-4" style="background-color:#007D74;" > MON </button>
                
                <button class="text-black px-4 "> TUES </button>
                <button class="text-black px-4"> WES </button>
                <button class="text-black px-4"> THU</button>
                <button class="text-black px-4"> FRI </button>
                <button class="text-black px-4"> SAT </button>
                <button class="text-black px-4"> SUN </button>


              </div>
           
              
                 <div class="flex  gap-5 mb-6 flex flex-wrap position"> 
                <img src="./../assets/img/acceuil-image/im19.PNG" alt="photos"> 
                <img src="./../assets/img/acceuil-image/im21.PNG" alt="photos"> 
                <img src="./../assets/img/acceuil-image/im23.PNG" alt="photos"> 
                <img class="position-img" src="./../assets/img/acceuil-image/im24.PNG" alt="photos"> 
              </div>
            

            

            <div class="flex gap-5 mb-10 position"> 

              <img src="./../assets/img/acceuil-image/im25.PNG" alt="photos"> 
              <img src="./../assets/img/acceuil-image/im26.PNG" alt="photos"> 
              <img class="position-img" src="./../assets/img/acceuil-image/im27.PNG" alt="photos"> 
              <div class="my-auto">  <img  class="h-24 image" src="./../assets/img/acceuil-image/im31.PNG" alt="photos"> </div>

            </div>

             

        </div>
    
    </div>

      <div class="py-10 "> 

          <p class="text-center text-3xl mb-4"> <span><b>   THE BEST </b> </span > <span style="color:#007D74;">   PROJECT </span></p>
          <p class="text-center mb-4"> Les plus appréciés </p>
        </div>

         <div class="flex flex-wrap w-4/6 mx-auto gap-5 mb-24 image-phone "> 
                <img   src="./../assets/img/acceuil-image/im19.PNG" alt="photos"> 
                <img   src="./../assets/img/acceuil-image/im21.PNG" alt="photos"> 
                <img  src="./../assets/img/acceuil-image/im23.PNG" alt="photos"> 
                <img class="position-img" src="./../assets/img/acceuil-image/im24.PNG" alt="photos"> 
                <div  class=" my-auto ">  <img  class="h-24 image" src="./../assets/img/acceuil-image/im30.PNG" alt="photos"> </div> 
              </div>

          <div class="flex  justify-between w-4/6 mx-auto gap-5 mb-24 alignement">
              
              <div class="mb-6"> 
                  <p class="text-3xl mb-10"> <b> ABOUT </b> <span style="color:#007D74;"> US</span> </p>
                  <p class="text-2xl"> Nous sommes une plateforme qui 
                     distribue des livres,
                    romans ,BD et qui favorise la 
                     collaboration entre différentes
                      personnes  un meme project
                  </p>
              </div>

              <div class="border-l-2 px-10 bloc" style="border-color:#007D74;"> 
              <div class="flex justify-around mb-10 "> 
                <div class="shadow-2xl bg-white px-10 py-10 bloc-div"> 

                      <p class="text-center mb-3  text-2xl" style="color:#007D74;"> 1000+</p>
                     <p  class="text-center"> oeuvres </p>
                     <p  class="text-center"> disponible</p>
                  
               </div>

              <div class="border border-1  bg-white px-10 py-10 bloc-div" style="border-color:#007D74;"> 
                   <p class="text-center mb-3 text-2xl" style="color:#007D74;"> 1000+</p>
                   <p  class="text-center"> Auteur </p>
              </div>

              <div class="border border-1 bg-white px-10 py-10 hidden position-phone bloc-div" style="border-color:#007D74;"> 
                  <p class="text-center mb-3  text-2xl" style="color:#007D74;"> 500+</p>
                  <p  class="text-center"> Projets </p>
                  <p  class="text-center"> En cours </p>
               </div>

              
            </div>

             <div class="border border-1 bg-white px-10 py-10 w-2/4 mx-auto position-img" style="border-color:#007D74;"> 
                  <p class="text-center mb-3 px-5 text-2xl" style="color:#007D74;"> 500+</p>
                  <p  class="text-center px-5"> Projets </p>
                  <p  class="text-center px-5"> En cours </p>
               </div>
            </div>

          </div>

          <div class="my-16 ">
            <p class="text-3xl text-center py-5" style="color:#007D74;" > AVIS</p>
            <p class="text-2xl text-center"> Nos utilisateurs vous font part de leurs <br> avis sur la plateforme</p> 
         </div>

      <div class="relative"> 
          <div class="w-4/6 mx-auto mb-32"  style="background-color:#F5F5F5; height: 26rem;"> 
          </div>

          <div class="absolute top-16 "> 
            <!-- <div class="flex gap-16 px-52  mb-10 element"> 
             
          </div>
           -->  <div class="px-10 element-sha"> 
                <element-carousel />
                </div>
          <!-- <div class="flex justify-center gap-4"> 
            <p class="bg-white px-2 py-2">  <i class="fa-solid fa-2x fa-arrow-left-long"></i> </p>
            <p class="px-2 py-2 text-white" style="background-color:#007D74;">  <i class="fa-solid fa-2x fa-arrow-right-long"></i> </p>
             
          </div>
         -->
        </div>

        </div>

        <!-- <element-carousel /> -->

  </div>
</template>

<script>
export default {
  name: "IndexPage",
  data(){
      
    return {
       
       slides:
       [ "./../assets/img/acceuil-image/caroussel-image/im20.JPG", 
        "./../assets/img/acceuil-image/caroussel-image/im22.JPG",
        "./../assets/img/acceuil-image/caroussel-image/im28.PNG"
      ] ,
       
       visibleSlide:0,
        direction:'right',

    };
  },

  methods:{

    next() { 
      if(this.visibleSlide >= this.slides.length-1){
          this.visibleSlide=0;
          // this.direction="left"
          this.direction="right"
      }else{
        this.visibleSlide++;
        // this.direction="right"
         this.direction="left"
      }
      
    },

    prev(){

        if(this.visibleSlide <= 0){
          this.visibleSlide=this.slides.length-1;
          this.direction="right"
      }else{
        this.visibleSlide--;
        this.direction="left"
      }
      // this.direction="right"
    }
  },
  
  mounted(){
    if(this.direction == "left"){ 
    setInterval(() => {
      this.next()
    }, 2000);
    }else{
      setInterval(() => {
      this.prev()
    }, 2000);
    }
  }

};
</script>

<style scoped>

@import url("./../assets/fontAwesome/css/all.min.css");



@media screen and (max-width: 430px){

.position{
  gap:4px;
}

.position img{
  width: 30%;
}
.position-img{
  display:none;
}

.position div img{
  width: 100%;
  height: 40%;
}
.position-phone{
  display: block;
}

.image-phone{
 gap:4px;
}


.image-phone img {
 width: 25%;
}

.image-phone div img {
    width: 100%;
  height: 50%;
}

.alignement{
  display: block;
  justify-content: center;
  gap:0px;
  text-align: center;
}

.bloc{
  border-left: 0px;
  padding: 0px;
}
.bloc-div{
  padding: 0px 6px;
  size: 20px ;
}

.element{
  gap:0px;
  padding: 0px;
}

.element-sha{
  padding: 0px;
  
}

.jour button {
  padding: 5px;
}
.image-style{
  height: 230px;
}
.image{
  height: 40px !important;
  weight: 40px !important;
}
}
</style>
