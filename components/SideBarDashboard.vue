<template lang="">
    <div class="sideBarDashboard flex justify-center bg-white overflow-auto">
      <div class="flex flex-col py-5">
        <div class="flex justify-center">
          <img src="~/assets/img/hibou-logo.png" alt="hibou-logo" class="h-10 md:h-12">
        </div>
        <div class="flex flex-col divLiens" @click="$emit('click-outside')">
            <NuxtLink to="/dashboard" class="block homelink">
            <i class="fa-solid fa-house pr-2"></i>Dashboard
            </NuxtLink>

            <div class="dropdown-title flex justify-between place-items-center cursor-pointer"
            @click="toggleDropDown">
              <div class="flex place-items-center">
                <i class="fa-solid fa-suitcase pr-2"></i>
                <span>Project title</span>
              </div>
              <i class="fa-solid fa-chevron-down text-xs"></i>
            </div>

            <div v-if="showDropDown" class="dropdown-body">
              <NuxtLink to="/dashboard/chapters" class="sublink text-sm block">
                <i class="fa-regular fa-circle text-xs pr-2"></i>Chapitres
              </NuxtLink>
            
              <NuxtLink to="/dashboard/chat" class="sublink text-sm block">
                <i class="fa-regular fa-circle text-xs pr-2"></i>Chat
              </NuxtLink>
            </div>

            <NuxtLink to="/dashboard/members" class="block">
              <i class="fa-solid fa-user-group pr-2"></i>Membres
            </NuxtLink>

            <NuxtLink to="/dashboard/roles" class="block">
              <i class="fa-solid fa-ruler pr-2"></i>Rôles
            </NuxtLink>

        </div>
      </div>
    </div>
</template>
<script>
import {ref} from 'vue'
export default {
  setup(){
    const showDropDown = ref(true);
    function toggleDropDown(){
      showDropDown.value = !showDropDown.value;
    }
    return {showDropDown, toggleDropDown};
  }
};
</script>
<style scoped>
.sideBarDashboard{box-shadow: 1px 0 3px rgba(0,0,0,0.2);}
.sideBarDashboard > div{min-width: 80%;}
.divLiens a, .divLiens .dropdown-title{
  margin: 5px 0px;
  padding: 10px 8px;
}
.divLiens a.homelink{
  margin: 15px 0px;
}
.divLiens a.sublink{
  padding-left: 30px; padding-top: 2px; padding-top: 2px;
}

a.router-link-exact-active,
a.nuxt-link-exact-active {
  color: white; border-radius: 7px;
  background: linear-gradient(to right, var(--vertfonce2) , var(--vertclair2));
}

@media screen and (min-width: 430px) {
  a:hover {
    transform: scale(1.05);
    font-weight: 600;
  }
}
</style>