<template>
    <div class="recentFiles flex flex-col bg-white mt-4 md:mt-6 mb-10 overflow-auto rounded-md
            px-2 md:px-4 lg:px-8 pt-2 md:pt-4 pb-8 md:pb-10">
            <div class="font-bold md:text-lg mb-2">
                Recent files
            </div>
            <div class="tableau">
                <table class="w-full text-sm lg:text-base">
                    <thead>
                        <tr class="text-left">
                            <th>Libellé</th><th>Date de création</th>
                            <th>Date de modification</th><th class="images">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(file, index) in files" :key="index">
                            <td>{{file.libelle}}</td>
                            <td>{{file.dateCreation}}</td>
                            <td>{{file.dateModif}}</td>
                            <td class="images"><ProjectMembers :showText="false" :imgWidth="36" :decalage="9" /></td>
                        </tr>
                    </tbody>
                </table>
 
            </div>
    </div>
</template>
<script>
import {ref} from 'vue';

export default {
  setup() {
    const files = ref([
      {libelle: 'Chapitre 1: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
      {libelle: 'Chapitre 2: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
      {libelle: 'Chapitre 3: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
      {libelle: 'Chapitre 4: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
      {libelle: 'Chapitre 5: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
      {libelle: 'Chapitre 6: The last man', dateCreation: '01 Juillet 2022', dateModif: '03 Juillet 2022'},
    ]);

    return { files };
  }
};
</script>
<style scoped>
/* th.images, td.images{max-width: 150px;} */
@media screen and (min-width: 640px) {
  .recentFiles {
    @apply mx-2 sm:mx-3 md:mx-5;
  }
}

@media screen and (max-width: 640px) {
th.images, td.images{max-width: 100px;}
.tableau{min-width: 420px;}
}
</style>