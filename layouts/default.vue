<template>
<div>
  <!-- <nav><h2 class="text-center bg-red-300 font-serif">Voici ma navbar. ça apparaît partout.</h2></nav> -->

  <div class="fixed top-0 z-50 w-full bg-white"> 
            <Navigation @affiche="affiche" @menuprojet="menuprojet" @cachecatalogue="cachecatalogue" @cachemenuprojet="cachemenuprojet"
              @montreparametre="montreparametre" @closeparametre="closeparametre" />

            <div class="absolute shadow-lg left-64 z-10 w-50 top-20 bg-white px-20 rounded "> 
            <catalogue v-if="etat"/> 
            </div>

            <div class=" absolute top-20 left-96 z-10 bg-white px-20   rounded" >
              <transition> 
              <menuprojet class="py-5" v-if="statut" /> 
              </transition>
            </div>

            <div class="absolute bg-white rounded z-10  right-0 "> 

                <transition>
                  <Parametre v-if="val"/> 
                </transition>
            </div>
            <hr>
        </div>

  <slot />
</div>
</template>


<script>


export default  {

   data(){
    return {
        etat:false,
        statut:false,
        val:false,
     //   slides: [
          //  require('./../test/photos/im28.PNG'),
          // require ('./../test/photos/im20.JPG'),
          // require ('./../test/photos/im22.JPG')

     //   ],
        visibleSlide:0,
        direction:'right',
    }
  },
  methods: {

    affiche(){
      this.etat=!this.etat;
    },
     menuprojet(){
      this.statut=!this.statut;
    },
    cachecatalogue(){
      this.etat=false;
      console.log("bonjour");
    },
    cachemenuprojet(){
      this.statut=false;
    },
    montreparametre(){
      this.val=!this.val;
      
    },
    closeparametre(){
      this.val=false;
    },
}
};

</script>
