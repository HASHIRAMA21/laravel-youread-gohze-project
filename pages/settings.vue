<template>
  <div class="settings flex flex-col">
    <div
      class="
        title
        text-vertbleu
        font-bold
        text-xl
        flex
        place-items-center
        h-20
        border-b border-gray-200
      "
    >
      Settings

      <!-- <i
        class="fa-solid fa-bars ml-8"
        @click="toggleSideBar"
        v-click-outside="closeSideBar2"
        id="toggleSideBar"
      ></i> -->
    </div>
    <div class="contenu flex relative">
      <div class="sidebar border-r border-gray-200 text-base pr-5">
        <SideBarSettings />
      </div>
      <!-- <transition name="slide"> -->
        <!-- La sidebar pour téléphones -->
        <!-- <SideBarSettings
          class="
            sidebar2
            absolute
            bg-white
            border border-green-700
            text-base
            pr-5
          "
          v-if="sideBarVisible"
        /> -->
      <!-- </transition> -->
      <div class="child font-semibold">
        <NuxtChild />
      </div>
    </div>
  </div>
</template>
<script>
import { ref } from "vue";

export default {
  setup() {
    const sideBarVisible = ref(false);

    function toggleSideBar() {
      sideBarVisible.value = !sideBarVisible.value;
    }
    function closeSideBar2() {
      if (sideBarVisible.value) sideBarVisible.value = false;
    }

    return {
      sideBarVisible,
      toggleSideBar,
      closeSideBar2,
    };
  }
};
</script>
<style scoped>
.title,
.contenu {
  padding-left: 70px;
}
.child {
  flex-basis: 70%;
}
/* .sidebar2 {
  display: none;
  position: absolute;
  z-index: 5;
}
#toggleSideBar {
display: none;
} */

@media screen and (min-width: 1100px) {
  .child {
    flex-basis: 80%;
  }
}

@media screen and (max-width: 750px) {
  .title,
  .contenu {
    padding-left: 20px;
  }
}

@media screen and (max-width: 660px) {
.contenu{
  flex-direction: column;
  padding-left: 0px;
}
.sidebar{padding-right: 0px; border-right: none; @apply border-b;}
}

@media screen and (max-width: 430px) {
  /* .sidebar {
    display: none;
  } */
  /* .sidebar2 {
    display: inherit; min-width: 65%; left: 0px;
  } */
  .child {
    flex-basis: 100%;
  }
  .title,
  .contenu {
    padding-left: 0px;
  }
  .settings {
    padding: 0px 3px;
  }
  /* #toggleSideBar {
    display: block;
  } */
}

/* Transitions */
.slide-enter-active, .slide-leave-active {
  transition: all 1s ease;
}

.slide-enter,
.slide-leave-active {
  transform: translateX(-300px); opacity: 0;
}
</style>