<template lang="">
    <div class="sideBarDashboard flex">
      <ul class="flex flex-col list-none justify-center py-5">
        <li>
          <NuxtLink to="/settings/personalInfo">Personal information</NuxtLink>
        </li>
        <li>
          <NuxtLink to="/settings/password">Password</NuxtLink>
        </li>
        <li>
          <NuxtLink to="/settings/email">Email</NuxtLink>
        </li>
        <li>
          <NuxtLink to="/settings/annonce">Annonce</NuxtLink>
        </li>
      </ul>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
li, a{display: block;}
a{
  margin: 10px 0px; padding: 5px 0px;
}
a.router-link-exact-active, a.nuxt-link-exact-active {
    border-left: 2px solid var(--vertbleu);
    padding-left: 5px;
  }

@media screen and (min-width: 430px) {
  a:hover{
  transform: scale(1.05);
  font-weight: 600;
}
}

</style>