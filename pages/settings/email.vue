<template>
<div class="emailSettings">
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="flex justify-end place-items-center">
            <Vue3ToggleButton v-model:isActive="mainStore.currentUser.receiveNotifications"
             :trackActiveColor="'#007D74'" :trackWidth="'50px'" :trackHeight="'20px'"
              :handleDiameter="'20px'" :handleDistance="'28px'"> </Vue3ToggleButton>
            <label for="receiveNotif" class="ml-4">Receive notifications</label>
            </div>
        </div>
    </div>
    <div class="ml-5 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="email">Email </label> <input type="email" name="email" id="email" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-3" v-model="mainStore.currentUser.email">
            </div>
        </div>
        <div class="flex justify-end place-items-center h-28 settingbloc">
            <button class="text-white bg-vertbleu border-vertbleu py-1 px-4">Update email</button>
        </div>
    </div>
</div>

</template>
<script>
import {onMounted} from 'vue'
import {useMainStore} from '~/store'
import { Vue3ToggleButton } from 'vue3-toggle-button'
import '~/node_modules/vue3-toggle-button/dist/style.css'

export default {
    components: {
      Vue3ToggleButton
    },
    setup() {
    const mainStore = useMainStore();

    onMounted(function(){ //Je rends tous les input non éditables. On peut modifier ça si besoin
    //   document.querySelectorAll('.personalInfo input').forEach(element => element.setAttribute('readonly', true));
    });

    return {mainStore};
  }
}
</script>
<style scoped>
div.toggle-slider{height: 20px;}
.settingbloc{
    width: 500px;
}
input{outline: none;}
.fakediv i{
    top: 14px;
}

@media screen and (max-width: 900px) {
.settingbloc{
    width: 400px;
}
div.ml-5.w-full{@apply ml-0;}
}

@media screen and (max-width: 430px) {
.w-full{
    width: inherit;
}
input[type=text], input[type=email]{width: 220px;}
.settingbloc{
    width: 90%;
}
.ligne{width: 100%; justify-content: space-between;}
}
</style>