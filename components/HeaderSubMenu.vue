<template>
    <div class="flex flex-col absolute top-16 right-0 bg-white rounded-md w-56
    text-sm">
        <div class="uppercase flex place-items-center justify-center px-2 py-3 border-b border-gray-300">
            {{mainStore.currentUser.firstname}}
        </div>
        <div class="uppercase flex place-items-center px-2 py-3  border-b border-gray-300">
            <NuxtLink to="/settings/personalInfo" class="p-1 block  w-full">
            <i class="fa-solid fa-gear pr-2"></i>Setting informations
            </NuxtLink>
        </div>
        <div class="uppercase flex place-items-center px-2 py-3">
            <NuxtLink to="/" class="p-1 block  w-full">
            <i class="fa-solid fa-arrow-right-from-bracket pr-2"></i>Log out
            </NuxtLink>
        </div>
    </div>
</template>

<script>
import {useMainStore} from '~/store'

export default {
    setup() {
    const mainStore = useMainStore();

    return {mainStore};
  }
}
</script>

<style scoped>
@media screen and (min-width: 430px) {
  a:hover{
  transform: scale(1.03);
  font-weight: 600;
}
}
</style>