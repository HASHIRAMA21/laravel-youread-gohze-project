<template>
<div class="mt-6 content-all grid grid-cols-1">
    <div class="title">
        <p class="m-text-bigger-normal uppercase w-full font-bold">
            liste des chapitres
        </p>
        <p class="m-text-small mt-2">
            <nuxt-link to="/" class="text-indigo"> Home / </nuxt-link>
            <span class="text-indigo">Projets / </span><span>Chapitres</span>
        </p>
    </div>
    <div class="contenant w-full bg-white mt-10 rounded-lg grid">
        <div class="pr-8 display-none-sm">
            <button class="text-white m-text-small mt-10 button-add relative w-32  float-right" v-on:click="toggleModalAdd">
                <img src="@/assets/img/listChapitres/Group.png" class="inline-block" />
                <span class="ml-1">New Chapter</span>
            </button>
        </div>
        <div class="md:p-8 p-2.5 container-table">

            <div class="display-none-sm">
                <p class="uppercase">liste des chapitres</p>
            </div>
            <div class="pr-8 display-none-lg flex">
              <button class="text-white m-text-small mt-4 button-add relative w-32 " v-on:click="toggleModalAdd">
                  <img src="@/assets/img/listChapitres/Group.png" class="inline-block" />
                  <span class="ml-1">New Chapter</span>
              </button>
              <div class="flex mt-6 px-4 justify-around w-44">
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="cursor-pointer fa-solid fa-eye text-indigo" v-on:click="()=>{currentItem = chapterChecked; toggleModalDetail();}"></i>
                </div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="cursor-pointer fa-solid fa-pen-to-square text-indigo" v-on:click="()=>{currentItem = chapterChecked; toggleModalEdit();}"></i>
                </div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="cursor-pointer fa-solid fa-trash-can text-indigo" v-on:click="toggleModalDelete"></i>
                </div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="cursor-pointer fa-solid fa-paper-plane text-indigo" v-on:click="toggleModalPublish"></i></div>
              </div>
            </div>
            <div class="m-auto" v-if="chapitres.length > 0">
                <div class="">
                    <div class="w-full flex items-center  font-sans overflow-hidden">
                        <div class="w-full">
                            <div class="rounded my-6 max-width-table overflow-auto">
                                <table class=" w-full table-auto">
                                    <thead>
                                        <tr class="bg-indigo text-white uppercase m-text-normal leading-normal font-bold">
                                            <th class="py-3 px-6 text-left display-none-lg">#</th>
                                            <th class="py-3 px-6 text-left flex"><span class="cursor-pointer block"  v-on:click="sortChapters()"><i class="fa-solid fa-arrow-down-short-wide"></i></span><span class="ml-3 block">Numero</span></th>
                                            <th class="py-3 px-6 text-left">Nom</th>
                                            <th class="py-3 px-6 text-center">DateCreation</th>
                                            <th class="py-3 px-6 text-center">Statut</th>
                                            <th class="py-3 px-6 text-center display-none-sm">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-light">
                                        <tr class="border-b border-gray-200 hover-bg cursor-pointer" v-for="(chapitre, index) in dataPage" :key="index">
                                            <td class="py-3 px-6 text-left whitespace-nowrap display-none-lg">
                                              <div class="flex items-center mr-4">
                                                  <input id="chapterChecked" v-on:click="dataChecked(chapitre)" type="checkbox" value="" class="w-4 h-4 text-teal-600 bg-gray-100 rounded-xl border-gray-300 focus:ring-teal-50 focus:ring-2 ">
                                                  <!-- <label for="teal-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teal</label> -->
                                              </div>
                                            </td>
                                            <td class="py-3 px-6 text-left whitespace-nowrap" v-on:click="()=>{currentItem = chapitre; toggleModalDetail();}">
                                                <div class="items-center m-text-normal ">
                                                    <div class="ml-10">
                                                        {{chapitre.numero}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left" v-on:click="()=>{currentItem = chapitre; toggleModalDetail();}">
                                                <div class="items-center m-text-normal ">
                                                    <div class="mr-2">
                                                        {{chapitre.nom}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center" v-on:click="()=>{currentItem = chapitre; toggleModalDetail();}">
                                                <div class="flex items-center justify-center m-text-normal ">
                                                    {{chapitre.dateCreation}}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center" v-on:click="()=>{currentItem = chapitre; toggleModalDetail();}">
                                                <span class="bg-indigo-light text-white py-1 px-6 rounded-full m-text-normal font-bold ">{{chapitre.statut}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center display-none-sm">
                                                <div class="flex item-center justify-around">
                                                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                      <i class="cursor-pointer fa-solid fa-eye text-indigo" v-on:click="()=>{currentItem = chapitre; toggleModalDetail();}"></i>
                                                  </div>
                                                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                      <i class="cursor-pointer fa-solid fa-pen-to-square text-indigo" v-on:click="()=>{currentItem = chapitre; toggleModalEdit();}"></i>
                                                  </div>
                                                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                      <i class="cursor-pointer fa-solid fa-trash-can text-indigo" v-on:click="toggleModalDelete"></i>
                                                  </div>
                                                  <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                      <i class="cursor-pointer fa-solid fa-paper-plane text-indigo" v-on:click="toggleModalPublish"></i></div>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 px-40 font-bold w-full" v-else>
                <p>Aucun chapitre pour le moment !</p>
            </div>
        </div>
        <div class="justify-end 
   inline-flex
   rounded-xl
   ">
            <ul class="flex items-center -mx-[6px] mb-2.5 px-8">
                <li class="px-[6px] cursor-pointer" v-on:click="getPreviousPage()">
                    <a class="bg-indigo-extralight hover-pagination
            w-7
            h-7
            flex
            items-center
            justify-center
            rounded-full
            border border-[#EDEFF1]
            text-[#838995] text-base
            hover:bg-primary hover:border-primary hover:text-white
            ">
                        <span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                    </a>
                </li>
                <li class="cursor-pointer" v-for="(page, index) in totalPages()" :key="index" v-on:click="getDataPage(page)">
                    <a v-if="isActive(page)" class="bg-indigo  text-white
            w-7
            h-7
            flex
            items-center
            justify-center
            rounded-full
            border border-[#EDEFF1]
            text-base
            hover:border-primary hover:text-white
            ">
                        {{page}}
                    </a>
                    <a v-else class=" w-7
            h-7
            flex
            items-center
            justify-center
            rounded-full
            border border-[#EDEFF1]
            text-base
            text-gray hover-pagination
            bg-indigo-extralight hover:border-primary hover:text-white">{{page}}</a>
                </li>
                <li class="px-[6px] cursor-pointer" v-on:click="getNextPage()">
                    <a class="bg-indigo-extralight hover-pagination
            w-7
            h-7
            flex
            items-center
            justify-center
            rounded-full
            border border-[#EDEFF1]
            text-[#838995] text-base
            hover:bg-primary hover:border-primary hover:text-white
            ">
                        <span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <modalPublish :showModal="showModalPublish" :toggleModal="toggleModalPublish"></modalPublish>
        <modalDelete :showModal="showModalDelete" :toggleModal="toggleModalDelete"></modalDelete>
        <modalDetail :showModal="showModalDetail" :toggleModal="toggleModalDetail" :numero="currentItem.numero" :nom="currentItem.nom" :dateCreation="currentItem.dateCreation" :type="currentItem.type" :fileLink="currentItem.fileLink"></modalDetail>
        <modalEdit :showModal="showModalEdit" :toggleModal="toggleModalEdit" :numero="currentItem.numero" :name="currentItem.nom" :dateCreation="currentItem.dateCreation" :type="currentItem.type" :fileLink="currentItem.fileLink"></modalEdit>
        <modalAdd :showModal="showModalAdd" :toggleModal="toggleModalAdd"></modalAdd>
    </div>
</div>
</template>

<style scoped>
.active {
    background-color: #015B52;
    color: white
}

/* #015B52;
}
.bg-indigo{
    background-color: #007D74;
}
.bg-indigo-light{
    background-color: #1CC9BD; */
.hover-pagination:hover {
    background-color: #015B52;
    /* #1CC9BD */
}

.hover-bg:hover {
    background-color: #E6FFFE;
}

@media screen and (max-width: 479px) {
    .max-width-table {
        max-width: 90vw
    }

    .container-table {
        padding: 10px
    }
}

@media screen and (min-width: 480px) and (max-width: 641px) {
    .max-width-table {
        max-width: 92vw
    }
}
@media screen and (max-width: 640px){
  .display-none-sm{
    display: none;
  }
  .content-all {
    padding: 10px;
    /* margin-top: 80px */
}
}
@media screen and (min-width: 641px){
  .display-none-lg{
    display:none;
  }
  .content-all {
    padding: 20px;
    /* margin-top: 80px */
}
}



/* .button-add {
    margin-left: 85%;
} */

/* @media screen and (max-width: 767px) {
  .container {
    /* max-width: 707px; */
/* background-color: red; */
/* overflow: auto;
} */

/* }
@media screen and (max-width: 1024px) {
  .button-add {
    margin-left: 81%;
  }
  .title {
    padding-left: 50px;
  }
} */
/* @media screen and (max-width: 640px) {
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
/* } */
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
// import { Header, Item } from "vue3-easy-data-table";
import modalAdd from "../../components/modals/chapitre/modalAdd.vue"
import modalPublish from "../../components/modals/chapitre/modalPublish.vue";
import modalDelete from "../../components/modals/chapitre/modalDelete.vue";
import modalDetail from "../../components/modals/chapitre/modalDetail.vue";
import modalEdit from "../../components/modals/chapitre/modalEdit.vue";
import _chapitres from "@/assets/js/chapitres";
definePageMeta({
    layout: "dashboard"
});

export default {
    name: "listChapitres",
    components: {
        modalAdd,
        modalDelete,
        modalDetail,
        modalEdit,
        modalPublish
        // chapitre
    },
    setup() {
        const chapitres = ref(_chapitres);
        const elementPerPage = ref(10);
        const showModalPublish = ref(false);
        const showModalEdit = ref(false);
        const showModalDetail = ref(false);
        const showModalDelete = ref(false);
        const showModalAdd = ref(false);
        const currentItem = ref({});
        const dataPage = ref([]);
        const actualPage = 1;
         const chapterChecked = ref();
        return {
            chapitres,
            showModalPublish,
            showModalEdit,
            showModalDetail,
            showModalDelete,
            showModalAdd,
            currentItem,
            elementPerPage,
            dataPage,
            actualPage,
            chapterChecked,
        }

    },
    mounted() {
        this.getDataPage(1)
    },

    methods: {
        toggleModalAdd: function () {
            this.showModalAdd = !this.showModalAdd;
        },
        toggleModalPublish: function () {
            this.showModalPublish = !this.showModalPublish;
        },
        toggleModalDelete: function () {
            this.showModalDelete = !this.showModalDelete;
        },
        toggleModalDetail: function () {
            this.showModalDetail = !this.showModalDetail;
        },
        toggleModalEdit: function () {
            this.showModalEdit = !this.showModalEdit;
        },
        totalPages() {
            return Math.ceil(this.chapitres.length / this.elementPerPage)
        },
        getDataPage(nbPage) {
            this.actualPage = nbPage;
            this.dataPage = []
            let ini = (nbPage * this.elementPerPage) - this.elementPerPage;
            let fin = (nbPage * this.elementPerPage);
            for (let index = ini; index < fin; index++) {
                this.dataPage.push(this.chapitres[index]);
            }
            this.dataPage = this.chapitres.slice(ini, fin);
        },
        getPreviousPage() {
            if (this.actualPage > 1) {
                this.actualPage--;
            }
            this.getDataPage(this.actualPage);
        },
        getNextPage() {
            if (this.actualPage < this.totalPages()) {
                this.actualPage++;
            }
            this.getDataPage(this.actualPage);
        },
        isActive(nbPage) {
            return nbPage == this.actualPage;
        },
        sortChapters(){
         this.dataPage.sort(function commpare(a , b) {
            if(a.numero < b.numero)
              return -1;
            else
              return 1;
            return 0;
          });
          this.chapitres.sort(function commpare(a , b) {
            if(a.numero < b.numero)
              return -1;
            else
              return 1;
            return 0;
          });
        },
        dataChecked(chap){
          this.chapterChecked = chap;
        }

    },

}
</script>
