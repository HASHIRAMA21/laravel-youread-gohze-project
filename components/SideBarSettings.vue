<template lang="">
    <div class="sideBarSettings flex">
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

@media screen and (max-width: 660px) {
ul{
  flex-direction: row; flex-basis: 100%; justify-content: space-around;
  @apply flex-wrap; @apply pb-2;
}
a.router-link-exact-active, a.nuxt-link-exact-active {
    border-bottom: 2px solid var(--vertbleu);
    border-left: none; padding-left: 0px;
  }
}

</style>