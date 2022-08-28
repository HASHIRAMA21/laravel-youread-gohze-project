<template>
  <transition name="modal-fade">
    <div
      class="bloc-modale flex fixed z-10 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" v-on:click="toggleModale"></div>

      <div class="modale card fixed text-center">
        <div><i class="fa-regular fa-circle-exclamation text-orange fa-2xl"></i></div>
        <div class="mt-4"><p class="m-text-normal">Are you sure?</p></div>
        <div class="mt-2 m-text-extrasmall"><p class="text-gray-500">You won't be able to revert this!</p></div>
        <div class="flex mt-4 w-full justify-around px-20">
          <div>
            <button class="btn-ok text-white">{{textButton}}</button>
            <!-- <button class="btn-ok text-white">Yes, Publish</button> -->
          </div>
          <div><button class="btn-cancel bg-white" v-on:click="toggleModale">Cancel</button></div>
        </div>
        <div v-on:click="toggleModale" class="btn-modale btn btn-danger cursor-pointer">X</div>
      </div>
    </div>
  </transition>
</template>


<script>
export default {
  name: "smallModale",
  props: {showModal:false,toggleModale:false,textButton:""}
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
  min-height: 233px;
  width: 422px;
  padding: 60px 0;
  border-radius: 20px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.14);
}

.btn-modale {
  position: absolute;
  top: 10px;
  right: 10px;
}
</style>