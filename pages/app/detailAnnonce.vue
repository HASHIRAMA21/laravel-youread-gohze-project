<template>
  <div class="" v-for="(annonce , key) in annonces" :key="key">
    <div class="mt-10  mb-5"  v-if="key==id">
      <div class="md:flex justify-center">
        <div>
        <div
          class="p-6
          md:p-4
          lg:p-6
            bg-white
            rounded-2xl
            w-64
            lg:w-64
            md:w-52 md:h-44
            container
          "
        >
          <div
            class="
              w-12 h-12 m-auto
            "
          >
            <img :src="annonce.imgUrl" class="w-full h-full object-cover"/>
          </div>
          <div><p class="m-text-bigger text-center">{{ annonce.nameChief }}</p></div>
          <div><p class="text-indigo font-italic m-text-small font-bold italic text-center">{{ annonce.permission }}</p></div>
          <div class="m-text-normal mt-4 "><p><span class="text-indigo font-semibold">Description: </span>{{ annonce.title}}</p></div>
          </div>
          <div>
            <figure class="disappear bg-indigo circle-sm mt-28 ml-1"></figure>
          </div>
        </div>
        <div class="bg-white rounded-2xl ml-12 container-block p-7 grid">
          <div><p class="m-text-big">{{ annonce.type }}</p></div>
          <div class="mt-2"><p class="m-text-small"><span class="text-gray">{{ annonce.datePub }}-</span><span class="text-indigo">{{ annonce.nbCandidat }} candidat(s)</span></p></div>
          <div class="flex mt-3 m-text-normal"><div class="w-7 h-5"><img src="@/assets/img/listeprojets/Vector.png" class="w-full h-full object-cover" /></div><div class="ml-4"><span>{{ annonce.searchProfil }}</span></div></div>
          <div class="flex mt-3 m-text-normal"><div class="w-7 h-5"><img src="@/assets/img/listeprojets/Vector1.png" class="w-full h-full object-cover" /></div><div class="ml-4"><span>{{ annonce.nbAuteur }} Auteurs et {{annonce.nbCritique}} critiques</span></div></div>
          <div class="flex mt-3 m-text-normal"><div class="w-7 h-6"><img src="@/assets/img/annonces/Vector.png" class="w-full h-full object-cover" /></div><div class="ml-4 uppercase text-yellow "><span>{{ annonce.status }}</span></div></div>
          <div class="mt-3 section-description"><p>Description</p><p>{{ annonce.description}}</p></div>
          <div>
          <button class="
              bg-indigo-dark
              button
              mb-6
              float-right
              md:w-40
              md:h-11
              w-40
              h-11
              mt-8
              text-white
              font-bold
              rounded-lg
              focus:outline-none
            "
          >
            Ecrire au Createur
          </button>
        </div>
        </div>
        <div class="flex disappear ml-14">
        <div>
          <figure class="circle-md bg-orange m-auto"></figure>
        </div>
        <div>
          <figure class="circle-md bg-orange mt-20 ml-9"></figure>
        </div>
        <div>
          <figure class="circle-md bg-orange mt-72 ml-9"></figure>
        </div>
        </div>
      </div>
      <div class="figures m-auto">
      <div><figure class="disappear bg-orange circle-lg ml-52"></figure></div>
      <div><figure class="disappear bg-indigo-light circle-lg ml-18 mt-10"></figure></div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.text-yellow{
  color: #F2BE3B;
}
.figures{
  width:1100px;
}
.button:hover {
  border: 2px solid #015b52;
  background-color: white;
  color: #015b52;
}
@media only screen and (min-width: 1024px) {
  .container-block {
    width: 618px;
    /* height: 100%; */
  }
}
@media only screen and (min-width: 640px) and (max-width: 1023px) {
  .container-block {
    width: 488px;
    /* height: 100%; */
  }
}
@media only screen and (max-width: 640px) {
  .button{
    font-size: 12px;
  }
  .container-block{
    width: 320px;
    /* height: 100%; */
    margin: auto;
  }
  button{
    width:120px
  }
}
@media only screen and (max-width: 767px){
  .container{
    margin: auto;
    margin-bottom:26px
  }
  .section-description{
    min-height:127px!important;
  }
  .container-block{
     /* min-height:527px!important; */
     margin:auto;
  }
} 

.text-extrasmall{
  font-size:8px
}
.container-block{
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
  /* width: 688px; */
  /* min-height:427px */
}
.container {
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
  min-height: 224px
}

.figure-indigo {
  margin-top: 57%;
  margin-left: 50%;
}

@media only screen and (max-width: 1024px) {
  .disappear {
    display: none;
  }
}
@media only screen and (max-width: 640px) {
  .disappear-bloc {
    display: none;
  }
}
@media only screen and (min-width: 1024px) {
  .content {
    width: 688px;
    height: 100%;
  }
}
@media only screen and (min-width: 640px) and (max-width: 1023px) {
  .content {
    width: 488px;
    height: 100%;
  }
}
@media only screen and (max-width: 640px) {
  .content {
    width: 320px;
    height: 100%;
    margin: auto;
  }
  .title-phone {
    margin: auto;
    width: 320px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
    height: 52px;
    margin-top: 50px;
  }
}
</style>
<script>
import _annonces from '~~/assets/js/annonces';
export default {
  setup(){
    const annonces = ref(_annonces);
    const route = useRoute();
    const id = route.query.id ? Number(route.query.id) : -1
    return {annonces,id}
  },
};
</script>
