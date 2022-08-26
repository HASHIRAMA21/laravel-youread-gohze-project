<template>

    <div class="flex justify-between"> 
        <div class="flex  content-center gap-10 px-5  item-center element-nav">
            <p class="emplacement-icone fa-2x my-auto"> <i @click="affichemenumobile" v-click-outside.prevent="cachemenumobile" class="fa-solid fa-bars"></i> </p>
            <!-- <Menu v-if="position" @menuprojetmobile="menuprojetmobile" />  -->
             <!-- <button class="py-5"  v-click-outside.prevent="cachecatalogue" @click="affiche"  > CATALOGUE </button> -->
             <p class="my-auto">  <img src="./../assets/img/Navigation-images/im6.PNG" alt="photos"> </p>
             
              <button class="py-5 emplacement" > ACCEUIL  </button>
             <button class="py-5"  v-click-outside.prevent="cachecatalogue" @click="affiche"  > CATALOGUE </button>
             <!-- <p class="my-auto emplacement-icone">  <img src="./../assets/img/Navigation-images/im6.PNG" alt="photos"> </p> -->
             <button  class="py-5 emplacement" @click="menuprojet" v-click-outside.prevent="cachemenuprojet" > PROJECT  </button>
             <button class="py-5 emplacement"> ANNONCES</button>

        </div>

        <div class="flex  px-5 gap-10 element-nav"> 
            <p class="my-auto"> <i class="  fa-solid fa-magnifying-glass"></i> </p>
            <p class="my-auto mx-auto"> <button to="" @click="montreparametre" v-click-outside.prevent="closeparametre"  >  <img src="./../assets/img/Navigation-images/im29.PNG" alt="">  </button></p>

        </div>


    </div>
</template>

<script>


export default {
name:'Navigation',
data(){
    return {    
        etat:false,
        position:false
    }
},
methods:{
    affiche(){
        this.$emit('affiche');
    },

     menuprojet(){
        this.$emit('menuprojet');
    },
    cachecatalogue(){
        this.$emit('cachecatalogue');
    },
    cachemenuprojet(){
        this.$emit('cachemenuprojet');
    },
    montreparametre(){
      this.$emit('montreparametre');
      console.log("rochinel");
    },
    closeparametre(){
      this.$emit('closeparametre');
    },
    menuprojetmobile(){
        this.etat=!this.etat
    },

    affichemenumobile(){
        this.$emit('affichemenumobile');
        console.log('yo bro');

    },

    cachemenumobile(){
        this.$emit('cachemenumobile');
    }

}

}


</script>

<style> 

.emplacement-icone{
    display: none;
}

@media screen and (max-width: 430px){

.emplacement{
    display:none;
}
.emplacement-icone{
    display: flex;
}
.element-nav{
    padding: 0px  6px;
    
}
  
}

</style>