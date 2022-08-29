<template lang="">
    <div>
        <div class="date-card flex flex-col bg-white mt-4 md:mt-6 overflow-auto
            px-2 md:px-4 lg:px-8 pt-2 md:pt-4 pb-8 md:pb-10 font-semibold">
            <div class="text-indigo">
                Date
            </div>
            <div class="flex flex-col px-3 md:px-4 lg:px-7 text-indigo">
                <div class="py-1">Juillet 2022</div>
                <div class="jours flex justify-between">
                <BoxDate v-for="(jour, index) in jours" :key="index" 
                    :nom="jour.nom" :numero="jour.numero" :thisDay="jour.thisDay" />
                </div>
            </div>
        </div>

        <div class="date-card-phone flex flex-col mt-3 md:mt-5 pb-3 font-semibold">
            <div class="px-3 py-1">
                Jours de la semaine
            </div>
            <div class="jours flex justify-between px-3 md:px-4 lg:px-7 overflow-auto text-indigo">
            <BoxDate v-for="(jour, index) in jours" :key="index" 
                :nom="jour.nom" :numero="jour.numero" :thisDay="jour.thisDay" />
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue';

export default {
  setup() {
    const jours = ref([
      {nom: 'Lun', numero: '05', thisDay: true},
      {nom: 'Mar', numero: '06', thisDay: false},
      {nom: 'Mer', numero: '07', thisDay: false},
      {nom: 'Jeu', numero: '08', thisDay: false},
      {nom: 'Ven', numero: '09', thisDay: false}
    ]);

    return { jours };
  }
};
</script>

<style scoped>
/* .jours{max-width: 90vw;} */
@media screen and (min-width: 640px) {
  .date-card {
    @apply mx-2 sm:mx-3 md:mx-5 rounded-md;
  }
}

@media screen and (min-width: 800px) {
  .date-card {display: flex;}
  .date-card-phone {display: none;}
}
@media screen and (max-width: 800px) {
  .date-card {display: none;}
  .date-card-phone {display: flex;}
}
</style>