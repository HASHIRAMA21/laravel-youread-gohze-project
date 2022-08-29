<template>
  <transition name="modal-fade">
     <div
      class="bloc-modale flex fixed z-10 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" v-on:click="toggleModale"></div>
      <div>
        <span class="font-bold absolute title">Ajouter un Chapitre</span>
      </div>
      <div
        v-on:click="toggleModale"
        class="btn-modale btn fixed btn-danger cursor-pointer"
      >
        X
      </div>
      <div class="bg-white z-10 w-full container-header"></div>
      <hr class="first-hr" />
      <div class="container fixed px-7 py-16">
        <div class="container-content card fixed">
          <div class="px-10">
            <p class="text-indigo">Editer le formulaire</p>
            <hr class="second-hr my-6" />
            <hr class="second-hr-double text-indigo" />
          </div>
          <div class="mt-4 px-10">
            <!-- <div><p class="m-text-normal text-indigo font-bold">Editer un Chapitre</p></div> -->
            <div class="flex"></div>
          </div>

          <div class="mt-4 px-10">
            <div class="flex text-neutral-500 container-infos justify-around">
              <div class="flex display-none flex-col justify-between">
                <div class="py-4"><p>Numero</p></div>
                <div class="py-4"><p>Nom</p></div>
                <div class="py-4"><p>Type</p></div>
                <div class="py-4"><p>Date de Creation</p></div>
              </div>
              <div class="flex flex-col">
                <div class="py-4">
                  <input
                    v-model="numero"
                    class="
                      input-custom
                      block
                      mt-0.5
                      text-xs
                      uppercase
                      input-lg
                      text-gray-700
                      border border-gray-200
                      pl-4
                      rounded-lg
                      focus:bg-white focus:outline-none
                    "
                  />
                </div>
                <div class="py-4">
                  <input
                    v-model="nom"
                    class="
                      input-custom
                      block
                      mt-0.5
                      text-xs
                      uppercase
                      input-lg
                      text-gray-700
                      border border-gray-200
                      pl-4
                      rounded-lg
                      focus:bg-white focus:outline-none
                    "
                  />
                </div>
                <div class="py-4">
                  <input
                    v-model="type"
                    class="
                      input-custom
                      block
                      mt-0.5
                      text-xs
                      uppercase
                      input-lg
                      text-gray-700
                      border border-gray-200
                      pl-4
                      rounded-lg
                      focus:bg-white focus:outline-none
                    "
                  />
                </div>
                <div class="py-4">
                  <input
                    v-model="dateCreation"
                    class="
                      input-custom
                      block
                      mt-0.5
                      text-xs
                      uppercase
                      input-lg
                      text-gray-700
                      border border-gray-200
                      pl-4
                      rounded-lg
                      focus:bg-white focus:outline-none
                    "
                  />
                </div>
              </div>
            </div>
            <div class="sm:hidden container-infos-sm">
              <div>
                <div>Numero</div>
                <div class="">
                  <input
                    v-model="numero"
                    class="
                      input-custom
                      block
                      mt-0.5
                      text-xs
                      uppercase
                      input-lg
                      text-gray-700
                      border border-gray-200
                      pl-4
                      rounded-lg
                      focus:bg-white focus:outline-none
                    "
                  />
                </div>
              </div>
              <div class="mt-2">
                <div>Nom</div>
                <div>
                  <div class="">
                    <input
                      v-model="nom"
                      class="
                        input-custom
                        block
                        mt-0.5
                        text-xs
                        uppercase
                        input-lg
                        text-gray-700
                        border border-gray-200
                        pl-4
                        rounded-lg
                        focus:bg-white focus:outline-none
                      "
                    />
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <div>Type</div>
                <div>
                  <div class="">
                    <input
                      v-model="type"
                      class="
                        input-custom
                        block
                        mt-0.5
                        text-xs
                        uppercase
                        input-lg
                        text-gray-700
                        border border-gray-200
                        pl-4
                        rounded-lg
                        focus:bg-white focus:outline-none
                      "
                    />
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <div>Date de Creation</div>
                <div>
                  <div class="">
                    <input
                      v-model="dateCreation"
                      class="
                        input-custom
                        block
                        mt-0.5
                        text-xs
                        uppercase
                        input-lg
                        text-gray-700
                        border border-gray-200
                        pl-4
                        rounded-lg
                        focus:bg-white focus:outline-none
                      "
                    />
                  </div>
                </div>
              </div>
            </div>
            <div>
              <button class="btn-ok text-white float-right mt-10">
                <i class="fa-regular fa-file-pen"></i
                ><span class="ml-3">Create</span>
              </button>
              <!-- <button class="btn-ok text-white">Yes, Publish</button> -->
            </div>
            <div>
              <button
                class="btn-close float-right bg-white lg:hidden"
                v-on:click="toggleModale"
              >
                Fermer
              </button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button
          class="btn-close btn-close-hidden float-right bg-white absolute"
          v-on:click="toggleModale"
        >
          Fermer
        </button>
      </div>
      <div class="bg-white container-footer"></div>
    </div>
  </transition>
</template>


<script>

export default {
  name: "modaleAdd",
  
  props: { showModal: false, toggleModale: false},
  data(){
    return{
        numero:"",
        nom:"",
        type:"",
        dateCreation:""
    }
  },
  methods: {
    // Validator function
    
  },
};
</script>


<style scoped>
input {
  padding: 12px;
}
@media screen and (min-width: 1024px) {
  .container {
    background: #fafafa;
    height: 697px;
  }
  input {
    width: 450px;
  }
  .container-content {
    width: 746px;
  }
  .btn-close {
    margin-top: 325px;
    margin-left: 235px;
  }
  .btn-modale {
    margin-bottom: 690px;
    margin-left: 750px;
  }
}
@media screen and (min-width: 768px) and (max-width: 1023px) {
  .container-content {
    width: 700px;
    max-height: 500px !important;
    overflow: auto;
  }
  .btn-close-hidden {
    display: none;
  }
  input {
    width: 450px;
  }
  .btn-modale {
    margin-bottom: 430px;
    margin-left: 620px;
  }
  .btn-close {
    margin-top: 125px;
    margin-right: -130px;
  }
}

@media screen and (min-width: 641px) and (max-width: 767px) {
  .container-content {
    width: 580px;
    max-height: 500px !important;
    overflow: auto;
  }
  .btn-close {
    margin-top: 125px;
    margin-right: -130px;
  }
  .btn-modale {
    margin-bottom: 435px;
    margin-left: 520px;
  }
  .text-padding {
    padding-left: 20px;
  }
  .btn-close-hidden {
    display: none;
  }
}

@media screen and (min-width: 641px) {
  .container {
    padding-left: 30px;
  }
}

@media screen and (max-width: 1024px) {
  .container-header,
  .container-footer,
  .first-hr,
  .title {
    display: none;
  }
  .container {
    height: 597px;
  }
}

@media screen and (max-width: 768px) {
  .container-content {
    max-width: 746px;
  }
}

@media screen and (max-width: 640px) {
  input {
    width: 320px;
  }
  .container {
    max-width: 450px;
  }
  .container-infos {
    max-width: 450px !important;
    padding-right: 10px;
  }
  .container-content {
    width: 400px;
    max-height: 500px !important;
    overflow: auto;
  }
  .btn-close-hidden {
    display: none;
  }
  /* .container {
    padding-left: 1%;
  } */
  .btn-close {
    margin-top: 30px;
    margin-left: 93px;
  }
  .btn-modale {
    margin-bottom: 430px;
    margin-left: 350px;
  }
  .text-padding {
    padding-left: 10px;
  }
  .container-infos {
    display: none;
  }
}
/* ok */
.container-infos {
  justify-content: space-between;
}
.second-hr-double {
  border: 0.1px solid;
  width: 40%;
  margin-top: -25px;
  position: absolute;
}

.first-hr {
  width: 800px;
  z-index: 10;
  position: absolute;
  margin-bottom: 650px;
  border: 0.1px solid #e9e4e4;
}
.container-footer {
  width: 800px;
  height: 50px;
  margin-top: 680px;

  border-radius: 0px 0px 20px 20px;
  position: absolute;
}
.container-header {
  width: 800px;
  height: 40px;
  margin-bottom: 690px;
  border-radius: 20px 20px 0px 0px;
  position: absolute;
}

.container {
  width: 800px;
  border-radius: 20px 20px 0px 0px;
}
.btn-ok {
  width: 131px;
  height: 34px;
  background: #007d74;
  border-radius: 5px;
}
.btn-close {
  width: 100px;
  height: 34px;
  color: #ea5455;
  border: 1px solid #ea5455;
  border-radius: 5px;

  z-index: 10;
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

.container-content {
  max-height: 550px;
  overflow: auto;
  background: #ffffff;
  box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.05);
  border-radius: 15px;

  padding: 60px 0;
}

.btn-modale {
  z-index: 100;
  position: absolute;
}
.title {
  margin-top: -360px;
  margin-left: -370px;
  z-index: 100;
}
</style>