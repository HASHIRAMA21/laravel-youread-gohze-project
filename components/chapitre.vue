<template>
  <div class="grid grid-cols-5 mt-3.5">
    <div>{{ numero }}</div>
    <div>{{ nom }}</div>
    <div>{{ dateCreation }}</div>
    <div>
      <button class="btn-st text-white">{{ statut }}</button>
    </div>
    <div class="grid grid-cols-4">
      <div><img src="../../assets/img/listChapitres/Group.png"/></div>
      <div><img src="../../assets/img/listChapitres/Group.png" /></div>
      <div><img src="../../assets/img/listChapitres/Group.png" /></div>
      <div><img src="../../assets/img/listChapitres/Group.png" /></div>
    </div>
  </div>
</template>
<style scoped>
.btn-st {
  position: absolute;
  width: 122px;
  height: 30px;
  background: #1cc9bd;
  border-radius: 20px;
}
</style>
<script>

export default {
  name: "chapitre",
  setup() {},
  props: {
    numero: "",
    nom: "",
    dateCreation: "",
    statut: ""
  },
};
</script>