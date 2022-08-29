<template>
  <transition name="modal-fade">
    <div
      class="bloc-modale flex fixed z-10 justify-center items-center"
      v-if="showModal"
    >
      <div class="overlay" v-on:click="toggleModale"></div>
      <div>
        <span class="font-bold absolute title m-text-normal"
          >Infos sur le Chapitre</span
        >
      </div>
      <div
        v-on:click="toggleModale"
        class="btn-modale btn fixed btn-danger cursor-pointer"
      >
        X
      </div>
      <div class="bg-white z-10 w-full container-header"></div>
      <hr class="first-hr" />
      <div class="container fixed py-16">
        <div class="container-content card fixed">
          <div class="text-padding">
            <p class="text-indigo md:px-20">Apercu</p>
            <hr class="second-hr my-6" />
            <hr class="second-hr-double text-indigo" />
          </div>
          <div class="mt-4 text-padding md:px-20">
            <div>
              <p class="m-text-normal text-indigo font-bold">
                Details du Chapitre
              </p>
            </div>
            <div class="flex"></div>
          </div>
          <div class="mt-4 text-padding md:px-20">
            <div class="flex text-neutral-500 container-infos">
              <div class="flex flex-col">
                <div class="py-4"><p>Numero</p></div>
                <div class="py-4"><p>Nom</p></div>
                <div class="py-4"><p>Type</p></div>
                <div class="py-4"><p>Date de Creation</p></div>
              </div>
              <div class="flex flex-col">
                <div class="py-4">
                  <p>{{ numero }}</p>
                </div>
                <div class="py-4">
                  <p>{{ nom }}</p>
                </div>
                <div class="py-4">
                  <p>{{ type }}</p>
                </div>
                <div class="py-4">
                  <p>{{ dateCreation }}</p>
                </div>
              </div>
            </div>
            <div class="section-publish">
              <button class="btn-ok text-white float-right mt-10 ">
                <i class="fa-solid fa-paper-plane cursor-pointer"></i
                ><span class="ml-3">Publier</span>
              </button>
              <!-- <button class="btn-ok text-white">Yes, Publish</button> -->
            </div>
          </div>
        </div>
      </div>
      <div>
        <button class="btn-close bg-white" v-on:click="toggleModale">
          Fermer
        </button>
      </div>
      <div class="bg-white container-footer"></div>
    </div>
  </transition>
</template>


<script>
export default {
  name: "modaleDetail",
  props: {
    showModal: false,
    toggleModale: false,
    numero: "",
    nom: "",
    type: "",
    dateCreation: "",
  },
};
</script>


<style scoped>
@media screen and (min-width: 1024px) {
  .container {
    background: #fafafa;
  }
  .container-content {
    width: 746px;
  }
  .btn-close {
    margin-top: 325px;
    margin-left: 200px;
  }
  .btn-modale {
    margin-bottom: 690px;
    margin-left: 750px;
  }
}
@media screen and (min-width: 768px) and (max-width: 1023px) {
  .container-content {
    width: 700px;
  }

  .btn-modale {
    margin-bottom: 520px;
    margin-left: 650px;
  }
  .btn-close {
    margin-top: 225px;
    margin-left: 165px;
  }
}

@media screen and (min-width: 641px) and (max-width: 767px) {
  .container-content {
    width: 580px;
  }

  .btn-close {
    margin-top: 225px;
    margin-left: 165px;
  }
  .btn-modale {
    margin-bottom: 530px;
    margin-left: 520px;
  }
  .text-padding {
    padding-left: 20px;
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
}

@media screen and (max-width: 768px) {
  .container-content {
    max-width: 746px;
  }
  .section-publish{
    padding-right: 20px;
  }
}
@media screen and (max-width: 640px) {
  .container {
    max-width: 410px;
  }
  .container-infos {
    max-width: 400px !important;
    padding-right: 10px;
  }
  .container {
    padding-left: 1%;
  }
  .btn-close {
    margin-top: 225px;
    margin-left: 90px;
  }
  .btn-modale {
    margin-bottom: 530px;
    margin-left: 370px;
  }
  .text-padding {
    padding-left: 10px;
  }
  
}

.container-infos {
  justify-content: space-between;

  width: 400px;
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
  height: 697px;
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
  position: absolute;
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
  height: 550px;

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