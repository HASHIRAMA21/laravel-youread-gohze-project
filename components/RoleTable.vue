<template>
  <EasyDataTable v-if="items.length > 0"
    buttons-pagination
    :headers="headers"
    :items="items"
    :rows-per-page="5"
    :rows-items="[5,10,15,25,50,100]"
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
          <p>Aucun rôle pour le moment !</p>
  </div>

  <DeleteModal :showModal="showModalDelete" :closeFunction="toggleModalDelete"
    :entite="'role'" :item="currentItem" @delete-role="deleteItem" />

  <UpdateRoleModal :showModal="showModalUpdate" :closeFunction="toggleModalUpdate"
    :entite="'role'" :item="currentItem" @update-role="updateItem" />

</template>

<script lang="ts">
import { defineComponent, ref, reactive } from "vue";
// import { mockClientItems, mockItems } from "./mock";

import EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import { Header, Item } from "vue3-easy-data-table";

import _listeRoles from '~/assets/js/listeRoles';

export default defineComponent({
  components: {EasyDataTable},
  setup() {
    const headers: Header[] = [
      { text: "ID", value: "id", sortable: true },
      { text: "Libellé", value: "libelle", sortable: true },
      { text: "Action", value: "action" }
    ];

    const showModalDelete = ref(false), showModalUpdate = ref(false);

    const itemsSelected = ref([]);
    const items = ref([]);
    const currentItem = ref({});  //L'élément sur lequel on cherche à agir actuellement.
    const loading = ref(true);
    setTimeout(() => {
      loading.value = false;
      items.value = _listeRoles;
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

    const createItem = (val: Item) => {
      let id = 1, len = items.value.length;
      if(len > 0) id = items.value[len-1].id + 1;

      val.id = id;
      items.value.push({...val});
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
/* .operation-wrapper .operation-icon {
  width: 20px;
  cursor: pointer operation-icon;
} */
table, table td, table th{
  font-size: 0.9rem;
}
@media screen and (max-width: 430px) {
table, table td, table th{
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
