<template>
  <div class="container">
    <div class="mt-14">
      <figure class="circle-md bg-indigo first-figure"></figure>
    </div>
    <div class="flex container-small justify-center">
      <div>
        <div>
          <p class="uppercase font-bold m-text-big mt-1 mb-5">
            parcourir les categories
          </p>
        </div>
        <div
          class="
            grid
            xl:grid-cols-4
            container-cat
            gap-4
            lg:grid-cols-3
            sm:grid-cols-2
            button
          "
        >
          <div
            v-for="(cat, index) in categorieList"
            :key="index"
            class="mt-3 cursor-pointer"
          >
            <categorie class="" :name="cat.name" :imageUrl="cat.image" />
          </div>
        </div>
      </div>
      <div class="ml-8 mt-8 disappear">
        <figure class="circle-xl bg-orange"></figure>
      </div>
      <div class="disappear">
        <figure class="circle-md bg-indigo ml-7 mt-64"></figure>
      </div>
      <div class="disappear margin-prc">
        <figure class="circle-lg bg-indigo-light ml-7 mt-96"></figure>
      </div>

    </div>
  </div>
</template>
<style scoped>
.margin-prc{
  margin-top: 20%;
}
@media only screen and (max-width: 1024px) {
  .disappear {
    display: none;
  }
  
}
.first-figure {
  margin-left: 35%;
}

.container {
  margin: auto;
  margin-bottom: 100px;
  justify-content: center;
}

.shadow-card {
  box-shadow: 0px 2px 10px 0px #00000040;
  width: 255px;
  height: 150px;
  border-radius: 15px;
}
</style>
<script>
import _categorieList from "~/assets/js/categories";
export default {
  name: "recherche",
  setup() {
    const categorieList = ref(_categorieList);
    return { categorieList };
  },
};
</script>