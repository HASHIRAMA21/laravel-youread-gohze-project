<template>
<div>
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
            class="border border-gray-400 h-9 my-2 w-72 ml-4">
            </div>
            <div class="ligne flex justify-end place-items-center">
            <label for="lastname">Last name </label> <input type="text" name="lastname" id="lastname"
            class="border border-gray-400 h-9 my-2 w-72 ml-4">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="job">Job </label> <input type="text" name="job" id="job" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="email">Email </label> <input type="email" name="email" id="email" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="location">Location </label> <input type="text" name="location" id="location" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4" autocomplete="false">
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
export default {
    
}
</script>
<style scoped>
.settingbloc{
    width: 500px;
}
input{outline: none;}
@media screen and (max-width: 950px) {
.settingbloc{
    width: 400px;
}
}
@media screen and (max-width: 650px) {
.settingbloc{
    width: fit-content;
}
}
@media screen and (max-width: 430px) {
.w-full{
    width: inherit;
}
input{width: 200px;}
.settingbloc{
    width: 90%;
}
.ligne{width: 100%; justify-content: space-between;}
}
</style>