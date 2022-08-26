<template>
<div>
  <!-- <nav><h2 class="text-center bg-red-300 font-serif">Voici ma navbar. ça apparaît partout.</h2></nav> -->

  <div class="fixed top-0 z-50 w-full bg-white"> 
            <Navigation @affiche="affiche" @menuprojet="menuprojet" @cachecatalogue="cachecatalogue" @cachemenuprojet="cachemenuprojet"
              @montreparametre="montreparametre" @closeparametre="closeparametre"  @affichemenumobile="affichemenumobile"
              @cachemenumobile="cachemenumobile" />

            <div class="absolute shadow-lg left-64 z-10 w-50 top-20 bg-white px-20 rounded cat"> 
            <catalogue v-if="etat"/> 
            </div>

            <div class=" absolute top-20 left-96 z-10 bg-white px-20   rounded menu" >
              <transition> 
              <menuprojet class="py-5" v-if="statut" /> 
              </transition>
            </div>

            <div class="absolute bg-white rounded z-10  right-0 "> 

                <transition>
                  <Parametre v-if="val"/> 
                </transition>
            </div>

            <div class="absolute bg-white rounded z-30  left-0 "> 

                <transition>
                  <Menu class="w-32"   @menuprojetmobile="menuprojetmobile"  v-if="position"/> 
                  </transition>

                 
            </div>
             <div class="absolute bg-white rounded z-25  left-10" > 
                        <menuprojet class="py-5" v-click-outside.prevent="cachemenuprojetmobile" v-if="pos" /> 
                  </div>
            <hr>
        </div>

  
</div>
</template>

<script>


export default  {

   data(){
    return {
        etat:false,
        statut:false,
        val:false,
        position:false,
        pos:false,
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
       console.log("bonjour");
    },
    cachecatalogue(){
      this.etat=false;
     
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

    affichemenumobile(){
        this.position=!this.position;
    },
    cachemenumobile(){
        this.position=false;
    },
    menuprojetmobile(){
        this.pos=!this.pos;
    },
    cachemenuprojetmobile(){
        this.pos=false;
    }
}
};

</script>

<style scoped>


@media screen and (max-width: 430px){

  .menu{
    left: 0px;
}
.cat{
  left: 0px;
  padding: 1px 0px;
}
}

</style>

