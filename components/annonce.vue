<template>
  <div class="cursor-pointer w-full flex mt-4 annonce">
    <div class="rounded-full w-16 h-16 md:ml-11 ml-4 justify-center">
      <img :src="imgUrl" class="w-full object-cover" />
    </div>
    <div class="content m-text-bigger-normal ml-5 lg:ml-9">
      <p>{{ name }}</p>
      <p class="text-gray m-text-extra-small float-left mt-4">
        {{ nbCommentaire }} commentaires
      </p>
    </div>
  </div>
</template>
<style scoped>
@media only screen and (min-width: 640px) {
  .annonce:hover {
    -webkit-transform: scale(1.08);
    transform: scale(1.08);
    -webkit-transition: 0.7s ease-in-out;
    transition: 0.7s ease-in-out;
    opacity: 1;
    /* background-color: black; */
    color: #007d74;
    font-weight: bold;
  }
}
/* .content{
       /* margin: auto; */
/* margin-left: 36px; */
/* } */
</style>
<script>
export default {
  name: "annonce",
  props: {
    name: "",
    imgUrl: "",
    nbCommentaire: "",
  },
};
</script>