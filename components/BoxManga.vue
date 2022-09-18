<template>
    <div class="boxManga relative flex justify-center place-items-center w-52 h-64 mx-1 my-4 rounded overflow-hidden">
        <img :src="img" alt="affiche" class="w-full">
        <div class="text flex absolute font-mono font-bold text-white bottom-2 w-full justify-center text-center uppercase">
            {{titre}}
        </div>
    </div>
</template>
<script>
export default {
    props:{
        titre: {type: String, required: true}, //titre du manga
        img: {type: String, required: true}, //url de l'affiche du manga
    }
}
</script>
<style>
@media screen and (max-width: 750px) {
.boxManga{
width: 160px; height: 200px;
}
.text{ font-size: 0.9rem;}
}
</style>