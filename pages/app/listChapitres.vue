<template>
  <div class="mt-14">
    <div class="px-52">
      <p class="m-text-bigger-normal uppercase w-full font-bold">
        liste des chapitres
      </p>
      <p class="m-text-small mt-2">
         <nuxt-link to="/"
                     class="text-indigo"
          >
            Home /
          </nuxt-link>
        <span class="text-indigo">Projets / </span><span>Chapitres</span>
      </p>
    </div>
    <div class="container m-auto">
      <div class="ml-9">
          <div class="absolute"><img src="../../assets/img/listChapitres/Group.png"/></div>
        <button class="text-white m-text-small mt-10 button-add relative">
          <img src="../../assets/img/listChapitres/Group.png" class="inline-block"/> <span class="ml-1">New Chapter</span>
        </button>
      </div>
      <div class="p-8">
        <div class=""><p class="uppercase">liste des chapitres</p></div>
        <div class=" m-auto">
            <div class="header-table grid grid-cols-5 font-bold m-text-small mt-9">
                <div><span>Numero</span></div>
                <div><span>Nom</span></div>
                <div><span>Date creation</span></div>
                <div><span>Statut</span></div>
                <div><span>Action</span></div>
            </div>
            <div class="mt-2"><hr></div>
            <div v-for="(chap , index) in chapitres" :key="index">
                <chapitre :nom="chap.nom" :numero="index+1" :dateCreation="chap.dateCreation" :statut="chap.statut" />
                <div class="mt-5"><hr></div>
                <p> <i class="fa-brands fa-2x fa-twitter"></i></p>
            </div>
        </div>
         <p> <i class="fa-brands fa-2x fa-twitter"></i></p>
      </div>
    </div>
  </div>
</template>
<style scoped>
.button-add{
    margin-left: 85%;
}
.container {
    margin-top: 44px;
  height: 523px;
  width: 1107px;
  border-radius: 10px;
  box-shadow: 0px 1px 10px rgba(28, 201, 189, 0.29);
  /* margin: auto; */
}
button {
  background: linear-gradient(87.37deg, #148b77 3.62%, #6dc885 97.68%);
  border-radius: 10px;
  padding: 10px 12px 10px 12px;
}
/* .app-background{
        background-color: red;
    } */
</style>
<script>
import chapitre from '../../components/annonce.vue'

export default {
    name:"listChapitres",
    components:{
       chapitre
    },
   
    data(){
        return{

          chapitres:[
              {
                nom: "la colère d’Adam",
                dateCreation: "12/08/2016",
                statut: "Private"
              },
              {
                nom: "la colère d’Adam",
                dateCreation: "12/08/2016",
                statut: "Private"
              },
              {
                nom: "la colère d’Adam",
                dateCreation: "12/08/2016",
                statut: "Private"
              },
              {
                nom: "la colère d’Adam",
                dateCreation: "12/08/2016",
                statut: "Private"
              }
          ]
        }
    },

};
</script>