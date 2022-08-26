<template>
  <div>
    <h1>VOICI LE CONTENU DU DASHBOARD !</h1>
  </div>
</template>

<script>
definePageMeta({
  layout: "dashboard",
});

export default {
  name: "DashbordIndex",
  data(){
    return {
    };
  }
};
</script>

<style scoped>
a.nuxt-link-active {
  font-weight: bold;
}
/* exact link will show the primary color for only the exact matching link */
a.nuxt-link-exact-active {
  color: #00c58e;
}
</style>
