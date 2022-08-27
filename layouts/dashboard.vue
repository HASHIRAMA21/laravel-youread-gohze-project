<template>
  <div class="grid relative bg-grisbleu"
   :class="sideBarVisible ? '' : 'grid-phone'">

    <SideBarDashboard class="typeNormal" v-if="sideBarVisible" />

    <transition name="slide">
      <SideBarDashboard class="typePhone z-20 absolute hide" v-if="sideBarPhoneVisible" 
        v-click-outside="closeSideBarPhone" />
    </transition>

    <HeaderDashboard @toggleSideBar="toggleSideBar" @toggleSideBarPhone="toggleSideBarPhone"
    :sideBarVisible="sideBarVisible" class="z-10"/>
    <slot />
    <FooterDashboard />

  </div>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const sideBarVisible = ref(true);
    const sideBarPhoneVisible = ref(false);

    function toggleSideBar() {
      sideBarVisible.value = !sideBarVisible.value;
    }

    function toggleSideBarPhone() {
      sideBarPhoneVisible.value = !sideBarPhoneVisible.value;
    }

    function closeSideBarPhone() {
      sideBarPhoneVisible.value = false;
    }

    return { sideBarVisible, sideBarPhoneVisible, toggleSideBar, toggleSideBarPhone,
    closeSideBarPhone };
  },
};
</script>

<style scoped>
.grid {
  grid-template-columns: 240px 1fr;
  grid-template-rows: 60px minmax(90vh, 1fr) minmax(30px, max-content);
  grid-template-areas:
    "sidebar header"
    "sidebar content"
    "footer footer";
}

.grid-phone {
  /* Affichage sans la sidebar (lorsqu'on la masque ou que l'écran est petit) */
  grid-template-areas:
    "header header"
    "content content"
    "footer footer";
}

.sideBarDashboard.typePhone{background-color: rgb(228, 243, 13); width: 240px; height: 100%;}

.sideBarDashboard.typeNormal {
  grid-area: sidebar;
  background-color: rgb(159, 219, 174);
}
.headerDashboard {
  grid-area: header;
}
.footerDashboard {
  grid-area: footer;
}

@media screen and (max-width: 900px) {
  .sideBarDashboard.typeNormal {
    display: none;
  }
  .sideBarDashboard.typePhone{display: flex;}
  .grid {
    @apply grid-phone;
  }
}
</style>
