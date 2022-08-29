export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.$router.options.scrollBehavior = async (to, from, savedPosition) => {
      if (to.fullPath !== from.fullPath && process.client) {
        window.scrollTo(0, 0);
      }
    };
  });