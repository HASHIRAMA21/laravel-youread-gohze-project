<template>
  <div class="dashboard">
    <div
      class="grid headergrid w-full fixed top-0 right-0 z-30"
      :class="sideBarVisible ? 'headergrid-normal' : 'headergrid-phone'"
    >
      <HeaderDashboard
        @toggleSideBar="toggleSideBar"
        @toggleSideBarPhone="toggleSideBarPhone"
        :sideBarVisible="sideBarVisible"
        class="z-30"
      />
    </div>
    <div
      class="grid maingrid relative bg-grisbleu"
      :class="sideBarVisible ? 'maingrid-normal' : 'maingrid-phone'"
    >
      <SideBarDashboard
        class="typeNormal z-40 fixed top-0 left-0"
        v-if="sideBarVisible"
      />

      <transition name="slide">
        <SideBarDashboard
          class="typePhone z-40 hide fixed top-0 left-0"
          v-if="sideBarPhoneVisible"
          v-click-outside="closeSideBarPhone"
          @click-outside="closeSideBarPhone"
        />
      </transition>

      <div class="pageContent" :class="sideBarVisible ? 'sideBarVisible' : ''">
        <slot />
      </div>
      <FooterDashboard />
    </div>
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

    return {
      sideBarVisible,
      sideBarPhoneVisible,
      toggleSideBar,
      toggleSideBarPhone,
      closeSideBarPhone,
    };
  },
};
</script>

<style lang="scss" scoped>
@use "~/assets/css/variables.scss" as v;

.maingrid {
  grid-template-columns: var(--sidebar-width) 1fr;
  grid-template-rows: var(--header-height) minmax(90vh, 1fr) minmax(
      30px,
      max-content
    );
}
.headergrid {
  grid-template-columns: var(--sidebar-width) 1fr;
  grid-template-rows: var(--header-height);
}

.maingrid-normal {
  grid-template-areas:
    "sidebar vide"
    "sidebar content"
    "sidebar footer";
}
.headergrid-normal {
  grid-template-areas: "vide header";
}

.maingrid-phone {
  /* Affichage sans la sidebar (lorsqu'on la masque ou que l'écran est petit) */
  grid-template-areas:
    "vide vide"
    "content content"
    "footer footer";
}
.headergrid-phone {
  /* Affichage sans la sidebar (lorsqu'on la masque ou que l'écran est petit) */
  grid-template-areas: "header header";
}
.sideBarDashboard.typePhone {
  width: var(--sidebar-width);
  height: 100vh;
}

.sideBarDashboard.typeNormal {
  grid-area: sidebar;
  height: 100vh;
  width: var(--sidebar-width);
}
.headerDashboard {
  grid-area: header;
}
.pageContent {
  grid-area: content;
}
.footerDashboard {
  grid-area: footer;
}

@media screen and (max-width: v.$dashboard-switch) {
  .sideBarDashboard.typeNormal {
    display: none;
  }
  .sideBarDashboard.typePhone {
    display: flex;
  }
  .maingrid {
    @apply maingrid-phone;
  }
  .headergrid {
    @apply headergrid-phone;
  }
}
</style>
