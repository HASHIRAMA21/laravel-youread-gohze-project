<template>
<transition name="modal-fade">
    <!-- Main modal -->
    <div v-if="showModal" id="defaultModal" tabindex="-1" aria-hidden="true" class="sm:py-8 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full test">
        <div class="overlay top-0 right-0 left-0 bottom-0 fixed" v-on:click="toggleModal"></div>
        <div class="relative w-full max-w-2xl h-full md:h-auto  m-auto sm:bg-gray-100 container-all rounded-2xl overflow-auto">
            <!-- header -->
            <div class="flex sm:relative fixed z-10 mt-[10px] sm:mt-0 justify-between top-0 right-0 left-0 sm:h-14 h-10 bg-white border-b rounded-header">
                <p class="m-text-normal uppercase font-bold pl-8 inline-flex items-center">Editer un chapitre</p>
                <button v-on:click="toggleModal" type="button" class="absolute sm:top-3 top-1  right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <!-- <span class="sr-only">Close modal</span> -->
                </button>
            </div>
            <!-- Modal content -->
            <div class="sm:py-8 px-6 py-3 mt-[55px] sm:mt-[0px] overflow-y-auto content-modal">
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="m-text-big text-indigo">
                            Editer le formulaire
                        </h3>
                        <hr class="hr-header w-52 text-indigo mt-11 absolute">

                    </div>
                    
                    <!-- Modal body -->
                    <Form class="w-full p-6" @submit="checkForm">
                        <div class="md:flex md:items-center mb-6 m-text-normal">
                            <div class="md:w-1/3">
                                <label class="block mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Numero
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input v-model="numero" class="bg-gray-100 appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-800 focus:border-2" id="inline-full-number" type="number">
                                <!-- <span class="error"></span> -->
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6 m-text-normal">
                            <div class="md:w-1/3">
                                <label class="block mb-1 md:mb-0 pr-4" for="inline-password">
                                    Nom
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input v-model="name" class="bg-gray-100 appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-800 focus:border-2" id="inline-name" type="text">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6 m-text-normal">
                            <div class="md:w-1/3">
                                <label class="block mb-1 md:mb-0 pr-4" for="inline-password">
                                    Type
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input v-model="type" class="bg-gray-100 appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-800 focus:border-2" id="inline-type" type="text">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6 m-text-normal justify-around">
                            <div class="md:w-1/3">
                                <label class="block  mb-1 md:mb-0 pr-4" for="inline-password">
                                    Date de Creation
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input v-model="dateCreation" class="bg-gray-100 appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-800 focus:border-2" id="inline-date" type="text" disabled>
                            </div>
                        </div>
                        <div class="md:flex mb-6 m-text-normal justify-around">
                            <div class="md:w-1/3">
                                <label class="block  mb-1 md:mb-0 pr-4" for="inline-password">
                                    Contenu du Chapitre
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex justify-center items-center w-full">
                                    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-[174px] bg-gray-50 rounded-lg border border-gray-300 border-dashed cursor-pointer">
                                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="mb-3 w-10 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500">PDF,DOC</p>
                                        </div>
                                        <input v-on:change="contentChapter" id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="sm:p-6 p-1 rounded-b border-gray-200 ">
                            <button type="submit" class="btn-pub sm:ml-[432px] ml-[200px] text-white inline-flex items-center focus:ring-4 focus:outline-none focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-linear">
                                <i class="fa-solid fa-paper-plane cursor-pointer"></i><span class="ml-3">Publish</span>
                            </button>

                        </div>
                    </Form>
                </div>
            </div>
            <!-- footer -->
            <div class="relative top-0 right-0 left-0 sm:h-14 h-10 bg-white border-b rounded-footer sm:p-2 p-1">
                <button v-on:click="toggleModal" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-500 rounded-lg border text-sm font-medium px-5 sm:py-2.5 py-1.5 focus:z-10 btn-close">Close</button>
            </div>
        </div>
    </div>
</transition>
</template>

<style>
input:invalid {
    border-color: red;
}

@media screen and (max-width: 640px) {
    .display-none-sm {
        display: none;
    }

    .btn-pub {
        margin-left: 60% !important
    }
    .content-modal{
        max-height: 70vh;
    }
}

@media screen and (min-width:641px) {
    .btn-close {
        margin-left: 82% !important;
    }

    .container-all {
        margin-top: 20px !important;
    }

}

.btn-close {
    margin-left: 68%;
}

/* .btn-pub{
        margin-left: 63%;
    } */

.rounded-footer {
    border-radius: 0px 0px 10px 10px
}

.rounded-header {
    border-radius: 10px 10px 0px 0px
}

.container-all {
    margin-top: 5px
}

.hr-header {
    border-color: #188E78;
}

.bg-linear {
    background: linear-gradient(85.99deg, #188E78 8.01%, #6AC684 84.46%);
}

.bg-linear:hover {
    background: linear-gradient(85.99deg, #188E78 8.01%, #188E78 94.46%);
}

.overlay {
    background-color: #000000da;
}

.modal-fade-enter,
.modal-fade-leave-to {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.5s ease;
}
</style>

<script>
import { Form, Field } from "vee-validate";
export default {
    name: "modalEdit",
    components: {
    Form,
    Field
  },
    props: {
        showModal: false,
        toggleModal: false,
        numero: "",
        name: "",
        type: "",
        dateCreation: "",
        fileLink: ""
    },
    setup() {
        const errors = ref([]);
        return {
            errors
        }
    },
    methods: {
        
        checkForm: function (e) {
            if (this.name && this.age) {
                return true;
            }

            this.errors = [];

            if (!this.name) {
                this.errors.push('Name required.');
            }
            if (!this.age) {
                this.errors.push('Age required.');
            }

            e.preventDefault();
        },
         isRequired(value) {
      return value ? true : "This field is required";
    },
    }
};
</script>
