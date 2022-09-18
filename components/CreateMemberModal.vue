<template>
  <transition name="modal-fade">
    <div
      class="bloc-modale flex fixed z-50 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" @click="resetAndClose"></div>
      <div class="parent fixed bg-white p-1 sm:p-2 md:p-3">
        <div class="haut flex justify-between place-items-center font-bold py-1 sm:py-2 pl-4">
          <div>Ajouter un membre</div>
          <div @click="resetAndClose" class="btn-modale btn btn-danger cursor-pointer
          flex place-items-center">
            <i class="block fa-solid fa-xmark md:text-xl mr-3"></i>
        </div>
          </div>
          <div class="modale card text-sm sm:text-base
          mx-2 md:mx-4">
            <div class="flex flex-wrap container-infos justify-between">
              <div class="flex flex-col basis-2/3">
                <div class="py-4 relative" v-click-outside="resetResults"
                @keydown.esc="resetResults" >
                  <input
                    placeholder="write username" @input="getItems" v-model="searchedValue"
                    class="
                      block  text-sm md:text-base input-lg
                      text-black border border-black pl-4 rounded-lg
                      focus:bg-white focus:outline-none focus:border-blue-400
                    "
                  />
                  <div class="border border-black absolute bg-white overflow-auto max-h-80 w-full"
                  v-if="items.length">
                    <SearchResult v-for="(element, index) in items" :key="index" :user="element"
                    @click="selectResult(element)" />
                  </div>
                </div>
                <div>
                </div>
                <div v-if="selectedUser.id" class="py-4 flex gap-5 place-items-center">
                  <img :src="selectedUser.photoprofil" alt="photo profil"
                  class="w-12">
                  <div class="text-sm">
                    <div class="font-bold">{{selectedUser.nom + ' ' + selectedUser.prenom}}</div>
                    <div class="text-gray-700">{{selectedUser.username}}</div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col basis-1/3">
                <div class="py-4 flex justify-end">
                  <select v-model="item.profession"
                  class="
                      block text-sm md:text-base
                      text-yellow-400 border border-yellow-400 pl-4 rounded-lg
                      focus:bg-white focus:outline-none focus:border-blue-400
                    "
                  >
                    <option disabled value="">Profession</option>
                    <option>Auteur</option>
                    <option>Dessinateur</option>
                    <option>Scénariste</option>
                    <option>Critique</option>
                    <option>Relecteur</option>
                  </select>
                </div>
                <div class="py-4 flex justify-end">

                  <select v-model="item.role"
                  class="
                      block text-sm md:text-base
                      text-gray-700 border border-none pl-4
                      focus:bg-white focus:outline-none focus:border-blue-400
                    "
                  >
                    <option disabled value="">Rôle</option>
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
              <button class="btn-ok text-white mt-0 md:mt-2 mb-1 md:mb-2 gradient-vert2" 
              @click="createMember">
                <!-- <i class="fa-solid fa-circle-plus"></i> -->
                <span>Ajouter</span>
              </button>
            </div>
          </div>
      </div>
    </div>
  </transition>
</template>


<script>
import { ref, computed } from "vue";
import _users from '~/assets/js/users';


export default {
  name: "createMemberModal",
  emits: ['create-member'],

  props: {
    showModal: false,
    closeFunction: false,
    item: { type: Object,
            default: {profession:'', role: ''}
          } //Ceci va contenir les choix qu'on va faire via les balises select profession et rôle
  },

  setup(props, context){
    const selectedUser = ref({});  //L'utilisateur qu'on sélectionne pour ajouter comme membre
    const items = ref([]);
    const searchedValue = ref('');


    function getItems(){
      selectedUser.value = {}; //on reset d'abord l'utilisateur sélectionné avant de faire la recherche.

      let texte = searchedValue.value.trim();
      if(texte){
        items.value = _users.filter((value)=> value.username.indexOf(texte) > -1);
      }
      else resetResults();
    }

    function resetResults(){
      items.value = []; //console.log('reset de l\'input effectué');
    }

    function selectResult(element){
      selectedUser.value = element;
      resetResults();
      searchedValue.value = '';
    }

    function createMember(){
      let correct = true;
      if(!selectedUser.value.id) {console.log('Veuillez choisir un utilisateur'); correct = false}
      if(!props.item.profession) {console.log('Veuillez choisir une profession'); correct = false}
      if(!props.item.role) {console.log('Veuillez choisir un rôle'); correct = false}

      if(correct){
        selectedUser.value.profession = props.item.profession;
        selectedUser.value.role = props.item.role;
        
        context.emit('create-member', selectedUser.value);

        resetAll(); //Après avoir ajouté le membre, on reset le formulaire
      }
    }

    function resetAll(){
      selectedUser.value = {};
      searchedValue.value = ''; props.item.profession = ''; props.item.role = '';
      resetResults();
    }

    function resetAndClose(){
      resetAll();
      props.closeFunction();
    }

    return {selectedUser, getItems, items,
     searchedValue, resetResults, selectResult, createMember, resetAll, resetAndClose};
  }
};
</script>


<style lang="scss" scoped>
@use "~/assets/css/variables.scss" as v;

// .vue3-autocomplete-container{border: 2px dashed blue;}
.searchInput{color: blue; background-color: mediumseagreen;}
  // p, input.vue3-input, select{ height: 45px !important; border: 1px solid red !important;}
.container-infos{
  p{display: flex; place-items: center;}
  p, input, select{ height: 45px;}
  select{ width: 160px;}
}

.parent, .haut{
  border-top-left-radius: 12px; border-top-right-radius: 12px;
}
.parent, .bas{
  border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;
}

@media screen and (min-width: v.$dashboard-switch) {
  .modale {
  width: 530px;
}
input{ width: 320px;}
}

@media screen and (max-width: v.$dashboard-switch) {
  .modale {
  width: 480px;
}
input { width: 280px;}
}

@media screen and (max-width: 500px) {
  .modale {
  max-width: 92vw;
}
p, input, select{ height: 38px;}
// input, select{ max-width: 60vw;}
}

.btn-ok{
  width: 131px;
  height: 40px;
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

</style>