<template>
    <div>
        <div class="ml-5 border-b border-gray-200 w-full">
        <div class="flex justify-around place-items-center h-28 settingbloc">
            <img src="~/assets/img/settings/profile-pic.png" alt="profile pic" class="w-20 mr-6">
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="oldpass">Old password </label> <input type="password" name="oldpass" id="oldpass" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-1">
            </div>
        </div>
    </div>
    <div class="ml-5 border-b border-gray-200 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="newpass">New password </label> <input type="password" name="newpass" id="newpass"
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-1">
            </div>
        </div>
    </div>
    <div class="ml-5 py-5 w-full">
        <div class="settingbloc">
            <div class="ligne flex justify-end place-items-center">
            <label for="newpass2">Re-enter new password </label> <input type="password" name="newpass2" id="newpass2" 
            class="border border-gray-400 h-9 my-2 w-72 ml-4 pl-1">
            </div>
        </div>
        <div class="flex justify-end place-items-center h-28 settingbloc">
            <button class="text-white bg-vertbleu border-vertbleu py-1 px-4">Change password</button>
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