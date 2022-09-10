<template>
  <div class="mb-32">
    <div class="sm:hidden title-phone text-base flex py-3">
      <div class="ml-2">
        <img src="../../assets/img/annonces/bell.png"/>
      </div>
      <div class="ml-2"><span>vous avez une nouvelle annonce</span></div>
    </div>
    <div class="flex mt-5 sm:mt-16 w-full justify-center">
      <div class="">
        <div
          class="
            bg-white
            rounded-2xl
            w-64
            lg:w-64
            md:w-52 md:h-44
            lg:h-56
            h-56
            container
            disappear-bloc
          "
        >
          <div class="grid">
            <p
              class="
                uppercase
                text-center text-indigo
                font-bold
                mb-6
                mt-8
                w-full
                m-text-big
              "
            >
              annonces
            </p>
            <p class="uppercase text-center w-40 m-auto m-text-normal">
              vous avez une <span class="leading-8">nouvelle annonce </span>
            </p>
          </div>
        </div>
        <div class="disappear-bloc">
          <div class="">
            <figure class="circle-md bg-indigo figure-indigo"></figure>
          </div>
          <div>
            <figure class="circle-xl bg-indigo-light mt-56 ml-32"></figure>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-2xl container ml-12 content flex">
        <div class="w-full">
          <div v-for="(annonce, index) in annonces" :key="index">
            <nuxt-link :to="'detailAnnonce?id='+index" >
            <annonce
              :name="annonce.name"
              :imgUrl="annonce.imgUrl"
              :nbCommentaire="annonce.nbCommentaire"
            />
            </nuxt-link>
            <hr class="mt-4" />
          </div>
        </div>
      </div>
      <div class="disappear">
        <div class="">
          <figure class="circle-xl bg-orange mt-36 ml-36"></figure>
        </div>
        <div>
          <figure class="circle-sm bg-indigo-light mt-72 ml-40"></figure>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.container {
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
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
  name: "annonces",
  setup(){
    const annonces = ref(_annonces);
    return {annonces}
  },
};
</script>
