<template>
  <div class="mt-14">
    <div class="xl:px-52 title">
      <p class="m-text-bigger-normal uppercase w-full font-bold">
        liste des chapitres
      </p>
      <p class="m-text-small mt-2">
        <nuxt-link to="/" class="text-indigo"> Home / </nuxt-link>
        <span class="text-indigo">Projets / </span><span>Chapitres</span>
      </p>
    </div>
    <div class="container m-auto bg-white">
      <div class="ml-9">
        <button
          class="text-white m-text-small mt-10 button-add relative"
          v-on:click="toggleModaleAdd"
        >
          <img
            src="../../assets/img/listChapitres/Group.png"
            class="inline-block"
          />
          <span class="ml-1">New Chapter</span>
        </button>
      </div>
      <div class="p-8">
        <div class=""><p class="uppercase">liste des chapitres</p></div>
        <div class="m-auto" v-if="chapitres.length > 0">
          <div
            class="header-table grid grid-cols-5 font-bold m-text-small mt-9"
          >
            <div><span>Numero</span></div>
            <div><span>Nom</span></div>
            <div><span>Date creation</span></div>
            <div><span>Statut</span></div>
            <div><span>Action</span></div>
          </div>
          <div class="mt-2"><hr /></div>
          <div v-for="(chap, index) in chapitres" :key="index">
            <chapitre
              :nom="chap.nom"
              :numero="index + 1"
              :dateCreation="chap.dateCreation"
              :statut="chap.statut"
              :detail="chap.actions.detail"
              :edit="chap.actions.edit"
              :del="chap.actions.del"
              :publish="chap.actions.publish"
              :type="chap.type"
            />
            <div class="mt-5"><hr /></div>
          </div>
        </div>
        <!-- <table class="m-auto" v-if="chapitres.length > 0">
          <thead>
            <tr>
              <td><span>Numero</span></td>
              <td><span>Nom</span></td>
              <td><span>Date creation</span></td>
              <td><span>Statut</span></td>
              <td><span>Action</span></td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(chap, index) in chapitres" :key="index">
              <td><chapitre :numero="chap.numero" /></td>
              <td><chapitre :nom="chap.nom" /></td>
              <td></td>
            </tr>
          </tbody>
        </table> -->
        <div class="mt-10 px-40 font-bold" v-else>
          <p>Aucun chapitre pour le moment !</p>
        </div>
      </div>
    </div>
    <modaleAdd
      :showModal="showModalAdd"
      :toggleModale="toggleModaleAdd"
    ></modaleAdd>
  </div>
</template>
<style scoped>
.button-add {
  margin-left: 85%;
}
@media screen and (max-width: 767px) {
  .container {
    max-width: 707px;
    /* background-color: red; */
    overflow: auto;
  }
}
@media screen and (max-width: 1024px) {
  .button-add {
    margin-left: 81%;
  }
  .title {
    padding-left: 50px;
  }
}
@media screen and (max-width: 640px) {
  .button-add {
    margin-left: 81%;
  }
  .title {
    padding-left: 6%;
  }
}
.container {
  margin-top: 44px;
  min-height: 123px;

  border-radius: 10px;
  box-shadow: 0px 1px 10px rgba(28, 201, 189, 0.29);
  margin-bottom: 100px;
  /* background-color: red; */
  /* margin: auto; */
}
button {
  background: linear-gradient(87.37deg, #148b77 3.62%, #6dc885 97.68%);
  border-radius: 10px;
  padding: 10px 12px 10px 12px;
}
/* .app-background{
        background-color: red;
    } */
</style>
<script>
definePageMeta({ layout: "dashboard" });
import chapitre from "../../components/chapitre.vue";
import modaleAdd from "../../components/modals/chapitre/modaleAdd.vue";

export default {
  name: "listChapitres",
  components: {
    chapitre,
    modaleAdd,
  },

  data() {
    return {
      chapitres: [
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
        {
          nom: "la colère d’Adam",
          dateCreation: "12/08/2016",
          statut: "Private",
          actions: {
            detail: "fa-solid fa-eye text-indigo",
            edit: "fa-solid fa-pen-to-square text-indigo",
            del: "fa-solid fa-trash-can text-indigo",
            publish: "fa-solid fa-paper-plane text-indigo",
          },
          type: "Roman",
        },
      ],
      showModalAdd: false,
    };
  },
  methods: {
    toggleModaleAdd: function () {
      this.showModalAdd = !this.showModalAdd;
    },
  },
};
</script>