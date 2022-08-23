<template>
<div class="annonceSettings">
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="flex place-items-center">
            <!-- <input type="checkbox" name="receiveNotif" id="receiveNotif" 
            class="border border-gray-400 my-2 w-5 h-6 mr-4" 
            v-model="mainStore.currentUser.receiveComments"> -->
            <Vue3ToggleButton v-model:isActive="mainStore.currentUser.receiveComments"
             :trackActiveColor="'#007D74'" :trackWidth="'50px'" :trackHeight="'20px'"
              :handleDiameter="'20px'" :handleDistance="'28px'"> </Vue3ToggleButton>
            <label for="receiveNotif" class="ml-4">Receive comments from users</label>
            </div>
            <div class="text-sm text-gray-600">
                Receive comments from users
            </div>
        </div>
    </div>
    <div class="ml-5  py-5 w-full">
        <div class="settingbloc">
            <div class="flex place-items-center">
            <Vue3ToggleButton v-model:isActive="mainStore.currentUser.receiveLikes"
             :trackActiveColor="'#007D74'" :trackWidth="'50px'" :trackHeight="'20px'"
              :handleDiameter="'20px'" :handleDistance="'28px'"> </Vue3ToggleButton>
            <label for="receiveNotif" class="ml-4">Receive likes from users</label>
            </div>
            <div class="text-sm text-gray-600">
                Receive likes from users
            </div>
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
input{outline: none;}
.fakediv i{
    top: 14px;
}

@media screen and (min-width: 650px) {
.settingbloc{
    margin-left: 17%;
}
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