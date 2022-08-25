<template>
<div class="personalInfo">
        <div class="ml-5 border-b border-gray-200 w-full">
        <div class="flex justify-end place-items-center h-28 settingbloc">
            <img src="~/assets/img/settings/profile-pic.png" alt="profile pic" class="w-20 mr-6">
            <button class="border border-black bg-white py-1 px-4 mx-3">Delete</button>
            <button class="text-white bg-vertbleu border-vertbleu py-1 px-4">Update</button>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="firstname">First name </label> <input type="text" name="firstname" id="firstname" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-3" v-model="mainStore.currentUser.firstname">
            </div>
            <div class="ligne flex justify-end place-items-center">
            <label for="lastname">Last name </label> <input type="text" name="lastname" id="lastname"
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-3" v-model="mainStore.currentUser.lastname">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="job">Job </label> <input type="text" name="job" id="job" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-3" 
            v-model="mainStore.userJobsText">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="email">Email </label> <input type="email" name="email" id="email" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-3" v-model="mainStore.currentUser.email">
            </div>
        </div>
    </div>
    <div class="ml-5 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="location">Location </label> 
            <div class="fakediv relative">
                <i class="fa-solid fa-location-dot ml-6 absolute left-0 text-2xl"></i>
                <input type="text" name="location" id="location" v-model="mainStore.currentUser.location" 
                    class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-9" autocomplete="false">
            </div>
            </div>
        </div>
        <div class="flex justify-end place-items-center h-28 settingbloc">
            <button class="border border-black bg-white py-1 px-4 mx-3">Delete</button>
            <button class="text-white bg-vertbleu border-vertbleu py-1 px-4">Update</button>
        </div>
    </div>
</div>

</template>
<script>
import {onMounted} from 'vue'
import {useMainStore} from '~/store'

export default {
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
input{width: 220px;}
.settingbloc{
    width: 90%;
}
.ligne{width: 100%; justify-content: space-between;}
}
</style>