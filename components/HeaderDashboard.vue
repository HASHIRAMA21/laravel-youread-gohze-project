<template>
    <div class="headerDashboard relative flex justify-between place-items-center bg-white
    pr-2 sm:pr-4 md:pr-8 pl-2 md:pl-4  mt-1 sm:mt-2 rounded-md
    dashboard-content-margin">
      <div class="flex place-items-center">
        <i class="fa-solid text-xl md:text-2xl" :class="sideBarVisible? 'fa-xmark' : 'fa-bars'"
        :title="sideBarVisible? 'Masquer le menu' : 'Afficher le menu'"
        @click="$emit('toggleSideBar')" id="toggleSideBar"></i>

        <i class="fa-solid fa-bars text-xl hide" 
          @click="$emit('toggleSideBarPhone')" id="toggleSideBarPhone"></i>
      </div>
      <div class="flex justify-between place-items-center gap-4 sm:gap-6 lg:gap-8">
        <i class="fa-regular fa-message"></i>
        <i class="fa-solid fa-magnifying-glass"></i>
        <i class="fa-regular fa-bell"></i>
        <span>{{mainStore.currentUser.firstname}}</span>
        <div class="relative" @click="toggleSubMenu">
          <img src="~/assets/img/settings/profile-pic.png" alt="profile pic" class="w-10">
          <div class="absolute bottom-0 right-1 circle-sm bg-green-500 border border-white"
           v-if="mainStore.currentUser.isOnline"></div>
        </div>
      </div>
      <HeaderSubMenu v-if="subMenuVisible" v-click-outside="closeSubMenu" />
    </div>
</template>
<script>
import {useMainStore} from '~/store'

export default {
    props:{
        sideBarVisible: {type: Boolean, required: true}, //indique si la sideBar (pour desktop) est visible
    },
    setup() {
    const mainStore = useMainStore();

    const subMenuVisible = ref(false);

    function toggleSubMenu() {
      subMenuVisible.value = !subMenuVisible.value;
    }

    function closeSubMenu() {
      subMenuVisible.value = false;
    }

    return { mainStore, subMenuVisible, toggleSubMenu, closeSubMenu };
  }
}
</script>
<style lang="scss" scoped>
@use "~/assets/css/variables.scss" as v;

.headerDashboard{
  box-shadow: 0 0 5px rgba(0,0,0,0.3);
}
@media screen and (max-width: v.$dashboard-switch) {
  #toggleSideBar{
  display: none;
}
  #toggleSideBarPhone{
  display:inline-block;
}
}
</style>