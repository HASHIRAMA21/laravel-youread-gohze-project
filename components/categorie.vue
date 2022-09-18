<template>
  <div class="shadow-card grid grid-cols-2 bg-pink">
    <div class="">
      <p class="font-semibold ml-3.5 w-full">{{ name }}</p>
    </div>
    <div>
      <img :src="imageUrl" alt="image"/>
      <!-- <clipPath id="test" clipPathUnits="objectBoundingBox">
        <polygon points="0.5 0,1 0.5,0.5 1,0 0.5" />
      </clipPath> -->
    </div>
  </div>
</template>
<style scoped>
/* .test {
  clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
} */
p {
  margin-top: 50%;
  margin-bottom: 50%;
}

.shadow-card {
  box-shadow: 0px 2px 10px 0px #00000040;
  width: 255px;
  height: 150px;
  border-radius: 15px;
}

.shadow-card {
  overflow: hidden;
}
@media only screen and (min-width: 640px) {
  .shadow-card:hover {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    -webkit-transition: 0.7s ease-in-out;
    transition: 0.7s ease-in-out;
    opacity: 0.8;
    background-color: #0d3330;
    color: white;
  }
}
img {
  width: 100%;
  height: 100%;
  /* object-fit: cover; */
}

.bg-pink {
  background-color: #fffdf9;
  height: 100%;
}
</style>
<script>
export default {
  name: "Categorie",
  props: {
    name: "",
    imageUrl: "",
  },
};
</script>