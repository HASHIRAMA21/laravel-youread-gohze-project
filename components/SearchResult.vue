<template>
    <div class="searchResult border-t border-gray-500 hover:bg-gray-300 py-1 flex gap-3 place-items-center">
        <img :src="user.photoprofil" alt="photo profil" class="w-10">
        <div class="text-sm">
        <div class="font-bold">{{user.nom + ' ' + user.prenom}}</div>
        <div class="text-gray-700">{{user.username}}</div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        user: {type: Object, required: true} //L'utilisateur qu'on veut afficher
    }
}
</script>
