import { defineNuxtConfig } from 'nuxt'
import Icons from 'unplugin-icons/vite'
export default defineNuxtConfig({
  vite: {
    plugins: [
      Icons({
        autoInstall: true
      })
    ]
  },
  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ['@/assets/css/style.css'],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss'
  ],


  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    transpile: ["vee-validate/dist/rules", '@fortawesome/vue-fontawesome'],
  }
})

