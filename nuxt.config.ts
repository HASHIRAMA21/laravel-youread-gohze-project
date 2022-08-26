import { defineNuxtConfig } from 'nuxt'

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
    modules: ['@nuxtjs/tailwindcss', '@pinia/nuxt'],
    css: ['~/assets/css/all.min.css', '~/assets/css/stylerichelle.css', '~/assets/css/stylegeneral.css']
})
