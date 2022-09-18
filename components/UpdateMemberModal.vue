<template>
  <transition name="modal-fade">
    <div
      class="bloc-modale flex fixed z-50 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" @click="closeFunction"></div>
      <div class="parent fixed">
        <div class="haut bg-white flex justify-between place-items-center font-bold py-1 sm:py-2 pl-4">
          <div>{{titre}}</div>
          <div @click="closeFunction" class="btn-modale btn btn-danger cursor-pointer
          flex place-items-center">
            <i class="block fa-solid fa-xmark md:text-xl mr-3"></i>
        </div>
          </div>
              <div class="bg-gray-50 border">
          <div class="modale card text-sm sm:text-base px-3 md:px-6 py-5 sm:py-7 
          mx-2 md:mx-4 mt-3 md:mt-6 mb-3 md:mb-6">
        <div class="border-b border-gray-400">
          <div class="w-2/3 sm:w-1/2 border-b border-vertbleu text-vertbleu px-2 py-2">Editer le formulaire</div>
        </div>
          <div class="mt-4">
            <div class="flex container-infos justify-between">
              <div class="flex flex-col">
                <div class="py-4"><p>Rôle</p></div>
              </div>
              <div class="flex flex-col">

                <div class="py-4">
                  <select v-model="item.role"
                  class="
                      block text-sm md:text-base input-lg
                      text-gray-700 border border-gray-200 pl-4 rounded-lg
                      focus:bg-white focus:outline-none focus:border-blue-400
                    "
                  >
                    <option disabled value="">Please select one</option>
                    <option>Chef d'équipe</option>
                    <option>Superviseur</option>
                    <option>Censeur</option>
                    <option>Administrateur</option>
                    <option>Secrétaire</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="flex justify-end">
              <button class="btn-ok text-white mt-0 md:mt-2 gradient-vert2" 
              @click="$emit(action + '-' + entite, item)">
                <i class="fa-solid fa-circle-plus"></i
                ><span class="ml-3">{{buttonText}}</span>
              </button>
            </div>
          </div>
      </div>
      </div>
        <div class="bas bg-white flex justify-end py-1 md:py-3 pr-10">
        <button class="btn-close bg-gray-600 text-white px-4 py-1 rounded-md text-sm md:text-base" 
        v-on:click="closeFunction">
          Fermer
        </button>
      </div>
      </div>
    </div>
  </transition>
</template>


<script>
import { computed } from "vue";

export default {
  name: "updateMemberModal",
  props: {
    showModal: false,
    closeFunction: false,
    update: { type: Boolean, default: true }, //true si c'est pour update, false si c'est pour créer.
    action: { type: String, default: "update"},
    entite: { type: String, required: true }, //La table sur laquelle on veut agir (role, chapitre, membre, etc.)
    item: { type: Object, required: true }, //L'occurrence qu'on veut update (modifier)
  },

  setup(props){
    const titre = computed(() => {
      return props.update ? "Editer un membre" : "Ajouter un membre";
    });
    const buttonText = computed(() => {
      return props.update ? "Update" : "Create";
    });

    return {titre, buttonText};
  }
};
</script>


<style lang="scss" scoped>
@use "~/assets/css/variables.scss" as v;

.container-infos{
  p{display: flex; place-items: center;}
  p, input, select{ height: 36px;}
}

.parent, .haut{
  border-top-left-radius: 12px; border-top-right-radius: 12px;
}
.parent, .bas{
  border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;
}

@media screen and (min-width: v.$dashboard-switch) {
  .modale {
  width: 510px;
}
input, select{ width: 320px;}
}

@media screen and (max-width: v.$dashboard-switch) {
  .modale {
  width: 420px;
}
input, select{ width: 280px;}
}

@media screen and (max-width: 500px) {
  .modale {
  max-width: 90vw;
}
input, select{ max-width: 60vw;}
}

.btn-ok{
  width: 131px;
  height: 34px;
  border-radius: 5px;
  }
.btn-cancel{
  width: 100px;
  height: 34px;
  color: #EA5455;
  border: 1px solid #EA5455;
  border-radius: 5px;
}
.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.5s ease;
}
.bloc-modale {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.overlay {
  background-color: #000000da;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.modale {
  background: white;
  color: #333;
  border-radius: 20px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.14);
}
</style>