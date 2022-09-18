<template>
  <EasyDataTable v-if="items.length > 0"
    buttons-pagination
    :headers="headers"
    :items="items"
    :rows-per-page="5"
    :rows-items="[3,5,10,15,25,50,100]"
    :rows-per-page-message="'lignes par page'"
    :loading="loading" :class="'w-full'"
  >
    <template #loading>
      <img
        src="https://thumbs.gfycat.com/AngelicYellowIberianmole.webp"
        style="width: 60px; height: 100px"
      />
    </template>
    <!-- <template #item-player="{ player, avator, page }">
      <div class="player-wrapper">
        <img class="avator" :src="avator" alt="" />
        <a target="_blank" :href="page">{{ player }}</a>
      </div>
    </template>
    <template #item-team="{ teamName, teamUrl }">
      <a target="_blank" :href="teamUrl">{{ teamName }}</a>
    </template> -->
    <template #item-profession="{profession}">
      <div class="text-white text-center bg-indigo-light rounded-xl py-0 md:py-0.5 px-1">
        {{profession}}
      </div>
    </template>
    
    <template #item-action="item">
      <div class="action-wrapper">
        <div class="flex gap-5 md:gap-8">
      <div>
        <i class="fa-solid fa-pen-to-square text-green-500 cursor-pointer" 
        @click="()=>{currentItem = {...item}; toggleModalUpdate();}"></i>
        </div>
      <div><i class="fa-solid fa-trash-can text-green-500 cursor-pointer" 
      @click="()=>{currentItem = {...item}; toggleModalDelete();}"></i></div>
    </div>
      </div>
    </template>
  </EasyDataTable>

  <div class="mt-10 px-40 font-bold" v-else>
          <p>Aucun membre pour le moment !</p>
  </div>

  <DeleteModal :showModal="showModalDelete" :closeFunction="toggleModalDelete"
    :entite="'member'" :item="currentItem" @delete-member="deleteItem" />

  <UpdateMemberModal :showModal="showModalUpdate" :closeFunction="toggleModalUpdate"
    :entite="'member'" :item="currentItem" @update-member="updateItem" />

</template>

<script lang="ts">
import { defineComponent, ref, reactive } from "vue";
// import { mockClientItems, mockItems } from "./mock";

import EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import { Header, Item } from "vue3-easy-data-table";

import _listeMembres from '~/assets/js/listeMembres';

export default defineComponent({
  components: {EasyDataTable},
  setup() {
    const headers: Header[] = [
      { text: "Nom", value: "nom", sortable: true },
      { text: "Prénom", value: "prenom", sortable: true },
      { text: "Contact", value: "contact", sortable: true },
      { text: "Rôle", value: "role", sortable: true },
      { text: "Profession", value: "profession", sortable: true },
      { text: "Action", value: "action" }
    ];

    const showModalDelete = ref(false), showModalUpdate = ref(false);

    const itemsSelected = ref([]);
    const items = ref([]);
    const currentItem = ref({});  //L'élément sur lequel on cherche à agir actuellement.
    const loading = ref(true);
    setTimeout(() => {
      loading.value = false;
      items.value = _listeMembres;
    }, 500);  //On met un peut de retard pour simuler le chargement du tableau.

    const isEditing = ref(false);
    // const editingItem = reactive({
    //   height: "",
    //   weight: "",
    //   id: 0,
    // });

    function toggleModalDelete(){
      showModalDelete.value = !showModalDelete.value;
      if(!showModalDelete.value) currentItem.value = {};
      }
    
    function toggleModalUpdate(){
      showModalUpdate.value = !showModalUpdate.value;
      if(!showModalUpdate.value) currentItem.value = {};
      }
      
    const deleteItem = (val: Item) => {
      items.value = items.value.filter((item) => item.id !== val.id);
      showModalDelete.value = false; //On ferme la boîte de dialogue
    };

    const createItem = (val: Item) => { //console.log(val);
      let id  = items.value.findIndex((item) => item.id === val.id);

      if(id>=0) {console.log(items.value[id].username + ' est déjà dans la liste des membres');
      }
      else {items.value.push({...val});}
    };

    const updateItem = (val: Item) => {
      // console.log('valeur: ', val);
      let id  = items.value.findIndex((item) => item.id === val.id);

      if(id>=0) items.value[id] = val;
      showModalUpdate.value = false; //On ferme la boîte de dialogue
    };

    return {
      loading,
      headers,
      items,
      createItem,
      deleteItem,
      updateItem,
      isEditing,
      itemsSelected,
      currentItem, showModalDelete, showModalUpdate,
      toggleModalDelete, toggleModalUpdate
    };
  },
});
</script>

<style>

td, th{
  font-size: 0.9rem;
  padding-top: 9px !important; padding-bottom: 9px !important;
}

@media screen and (max-width: 430px) {
td, th{
  font-size: 0.8rem;
}
}

.player-wrapper {
  padding: 5px;
  display: flex;
  align-items: center;
  justify-items: center;
}
.avator {
  margin-right: 10px;
  display: inline-block;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  box-shadow: inset 0 2px 4px 0 rgb(0 0 0 / 10%);
}
</style>
