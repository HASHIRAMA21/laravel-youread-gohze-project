<template>
    <CreateRoleModal :showModal="showModal" :closeFunction="closeFunction"
    :update="true" :action="'update'"
    :entite="entite" :item="item" />
</template>
<script>
export default {
  name: "updateRoleModal",
  props: {
    showModal: false,
    closeFunction: false,
    entite: { type: String, required: true }, //La table sur laquelle on veut agir (role, chapitre, membre, etc.)
    item: { type: Object, required: true }, //L'occurrence qu'on veut modifier
  }
}
</script>