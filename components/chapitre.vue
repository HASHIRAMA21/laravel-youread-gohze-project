<template>
  <div class="sm:grid sm:grid-cols-5 mt-3.5">
    <div>{{ numero }}</div>
    <div>{{ nom }}</div>
    <div>{{ dateCreation }}</div>
    <div>
      <button class="btn-st text-white">{{ statut }}</button>
    </div>
    <div class="grid grid-cols-4">
      <div>
        <i
          :class="detail"
          v-on:click="toggleModaleDetail"
          class="cursor-pointer"
        ></i>
      </div>
      <div>
        <i
          :class="edit"
          v-on:click="toggleModaleEdit"
          class="cursor-pointer"
        ></i>
      </div>
      <div>
        <i
          :class="del"
          v-on:click="toggleModaleDelete"
          class="cursor-pointer"
        ></i>
      </div>
      <div>
        <i
          :class="publish"
          v-on:click="toggleModalePublish"
          class="cursor-pointer"
        ></i>
      </div>
    </div>
    <modalePublish
      :showModal="showModalPublish"
      :toggleModale="toggleModalePublish"
    ></modalePublish>
    <modaleDelete
      :showModal="showModalDelete"
      :toggleModale="toggleModaleDelete"
    ></modaleDelete>
    <modaleDetail
      :showModal="showModalDetail"
      :toggleModale="toggleModaleDetail"
      :numero="numero"
      :nom="nom"
      :dateCreation="dateCreation"
      :type="type"
    ></modaleDetail>

    <modaleEdit
      :showModal="showModalEdit"
      :toggleModale="toggleModaleEdit"
      :numero="numero"
      :nom="nom"
      :dateCreation="dateCreation"
      :type="type"
    ></modaleEdit>
  </div>
</template>
<style scoped>
.btn-st {
  position: absolute;
  min-width: 122px;
  height: 30px;
  background: #1cc9bd;
  border-radius: 20px;
}
</style>
<script>
import modalePublish from "./modals/chapitre/modalePublish.vue";
import modaleDelete from "./modals/chapitre/modaleDelete.vue";
import modaleDetail from "./modals/chapitre/modaleDetail.vue";
import modaleEdit from "./modals/chapitre/modaleEdit.vue";

export default {
  name: "chapitre",
  components: {
    modalePublish,
    modaleDelete,
    modaleDetail,
    modaleEdit,
  },
  methods: {
    toggleModalePublish: function () {
      this.showModalPublish = !this.showModalPublish;
    },
    toggleModaleDelete: function () {
      this.showModalDelete = !this.showModalDelete;
    },
    toggleModaleDetail: function () {
      this.showModalDetail = !this.showModalDetail;
    },
    toggleModaleEdit: function () {
      this.showModalEdit = !this.showModalEdit;
    },
  },
  setup() {},
  data() {
    return {
      showModalPublish: false,
      showModalDelete: false,
      showModalDetail: false,
      showModalEdit: false,
    };
  },
  props: {
    numero: "",
    nom: "",
    dateCreation: "",
    statut: "",
    type: "",

    detail: "",
    edit: "",
    del: "",
    publish: "",
  },
};
</script>