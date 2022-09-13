<template>
  <div class="mt-12 dashboard-content-margin">
    <div class="title">
      <p class="m-text-bigger-normal uppercase w-full font-bold">
        Liste des rôles
      </p>
      <p class="m-text-small mt-2 font-semibold">
        <nuxt-link to="/" class="text-indigo"> Home / </nuxt-link>
        <span class="text-indigo">Rôles</span>
      </p>
    </div>
    <div class="contenant w-full bg-white mt-10">
      <div class="flex flex-row-reverse">
        <button class="text-white m-text-small mt-9 mr-9 button-add" v-on:click="toggleModaleAdd">
          <img
            src="../../assets/img/plus.png"
            class="inline-block"
          />
          <span class="ml-1">New Role</span>
        </button>
      </div>
      <div class="p-4 md:p-8">
        <div class=""><p class="uppercase font-semibold text-gray-600 mb-1">Liste des rôles</p></div>
        <RoleTable ref="RoleTable" />
      </div>
    </div>
    <CreateRoleModal :showModal="showModalAdd" :closeFunction="toggleModaleAdd"
    :entite="'role'" :item="{droit: ''}" @create-role="createItem" />
    
  </div>
</template>

<script>
definePageMeta({ layout: 'dashboard' });

import {ref} from 'vue';

export default {

  setup(){
    const showModalAdd = ref(false);
    const RoleTable = ref(null);

    function toggleModaleAdd(){
      showModalAdd.value = !showModalAdd.value;
    }

    function createItem(item){
      RoleTable.value.createItem(item);
      toggleModaleAdd();
    }

    return {RoleTable, showModalAdd, toggleModaleAdd, createItem};
  }
};
</script>

<style scoped>
.contenant {
  border-radius: 10px;
  box-shadow: 0px 1px 10px rgba(28, 201, 189, 0.29);
  margin-bottom: 50px;
  /* margin: auto; */
}
button {
  background: linear-gradient(87.37deg, #148b77 3.62%, #6dc885 97.68%);
  border-radius: 10px;
  padding: 10px 12px 10px 12px;
}
</style>