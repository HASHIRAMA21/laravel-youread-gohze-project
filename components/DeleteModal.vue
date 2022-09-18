<template>
  <transition name="modal-fade">
    <div
      class="bloc-modale flex fixed z-50 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" @click="closeFunction"></div>

      <div class="modale card fixed text-center w-72 sm:w-80 lg:w-96 px-0 py-7 sm:py-10 lg:py-12">
        <div><i class="fa-solid fa-circle-exclamation text-orange fa-2xl"></i></div>
        <div class="mt-4"><p class="m-text-normal">Are you sure?</p></div>
        <div class="mt-2 m-text-extrasmall"><p class="text-gray-500">You won't be able to revert this!</p></div>
        <div class="flex mt-4 w-full justify-around">
          <div>
            <button class="btn-ok text-white " @click="$emit(action + '-' + entite, item)">{{textButton}}</button>
            <!-- <button class="btn-ok text-white">Yes, Publish</button> -->
          </div>
          <div><button class="btn-cancel bg-white" @click="closeFunction">Cancel</button></div>
        </div>
        <div @click="closeFunction" class="btn-modale btn btn-danger cursor-pointer">
            <i class="fa-solid fa-xmark md:text-xl"></i>
        </div>
      </div>
    </div>
  </transition>
</template>


<script>
export default {
  name: "deleteModal",
  props: {showModal:false,closeFunction: false,textButton:{type: String, default:"Yes, delete it!"},
    action:{type: String, default:"delete"},
    entite:{type: String, required: true}, //La table sur laquelle on veut agir (role, chapitre, membre, etc.)
    item:{type: Object, required: true}, //L'occurrence qu'on veut supprimer
  }
};
</script>


<style scoped>
.btn-ok{

  width: 131px;
  height: 34px;
  background: #007D74;
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
  min-height: 200px;
  max-width: 100vw;
  border-radius: 20px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.14);
}

.btn-modale {
  position: absolute;
  top: 10px;
  right: 10px;
}
</style>