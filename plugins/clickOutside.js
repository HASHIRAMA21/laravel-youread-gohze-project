import vClickOutside from "click-outside-vue3";
// plugin permettant d'utiliser la directive v-click-outside

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.use(vClickOutside);
});