<template>
    <div class="boxDate flex flex-col place-items-center mr-3 pt-3 pb-5 rounded-md bg-white">
        <div class="flex justify-center text-center p-1 mb-3 w-2/3 rounded-2xl font-normal" 
        :class="thisDay? 'gradient-vert text-white' : 'bg-indigo-light'">
            {{nom}}
        </div>
        <div class="text-center p-3 text-3xl text-black">{{numero}}</div>
    </div>
</template>
<script>
export default {
    props:{
        nom: {type: String, required: true}, //le nom du jour
        numero: {type: String, required: true}, //Le numéro (date) du jour
        thisDay: {type: Boolean, default: false}, //Si c'est la date du jour actuel
    }
}
</script>
<style>
.boxDate{
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    min-width: 8rem; min-height: 8rem;
}
</style>