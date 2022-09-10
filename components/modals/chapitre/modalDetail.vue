<template>
<transition name="modal-fade">
    <!-- Main modal -->
    <div v-if="showModal" id="defaultModal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="overlay top-0 right-0 left-0 bottom-0 fixed" v-on:click="toggleModal"></div>
        <div class="relative w-full max-w-2xl h-full md:h-auto  m-auto sm:bg-gray-100 container-all rounded-2xl overflow-auto">
            <!-- header -->
            <div class="flex relative justify-between top-0 right-0 left-0 sm:h-14 h-10 bg-white border-b rounded-header">
                <p class="m-text-normal uppercase font-bold pl-8 inline-flex items-center">Informations sur le chapitre</p>
                <button v-on:click="toggleModal" type="button" class="absolute sm:top-3 top-1  right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <!-- <span class="sr-only">Close modal</span> -->
                </button>
            </div>
            <!-- Modal content -->
            <div class="sm:py-8 px-6 py-3 content-modal overflow-y-auto">
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="m-text-big text-indigo">
                            APercu
                        </h3>
                        <hr class="hr-header w-52 text-indigo mt-11 absolute">

                    </div>
                    <!-- Modal body -->
                    <div class="p-6">
                        <div class=" ">
                            <div class="py-4 flex ">
                                <p>Numero</p>
                                <p class="ml-32">{{ numero }}</p>
                            </div>
                            <div class="py-4 flex">
                                <p>Nom</p>
                                <p class="ml-[150px]">{{ nom }}</p>
                            </div>
                            <div class="py-4 flex">
                                <p>Type</p>
                                <p class="ml-[150px]">{{ type }}</p>
                            </div>
                            <div class="py-4 flex">
                                <p>Date de Creation</p>
                                <p class="ml-16">{{ dateCreation }}</p>
                            </div>
                            <div class="py-4 flex">
                                <p>Contenu du chapitre</p> <a :href="fileLink">
                                    <p class="cursor-pointer ml-14 md:ml-10 sm:w-64 sm:h-28 rounded-2xl border-dashed border border-gray-300 bg-gray-50 sm:flex"> <span class="sm:pt-10 sm:pl-16 pl-10 pt-2 block"><i class="fa-solid fa-2x m-auto fa-file-export"></i></span><span class="m-text-small italic block m-auto text-center p-1">Click here to view file</span></p>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="flex flex-col sm:pl-24 pl-5">
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
                        <div class="py-4">
                        <p class="cursor-pointer"><svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></p>
                        </div>
                    </div> -->
                    </div>
                    <!-- Modal footer -->
                    <div class="sm:p-6 p-1 rounded-b border-gray-200 ">
                        <button type="button" class="btn-pub sm:ml-[450px] ml-[200px] text-white inline-flex items-center focus:ring-4 focus:outline-none focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-linear">
                            <i class="fa-solid fa-paper-plane cursor-pointer"></i><span class="ml-3">Publish</span>
                        </button>

                    </div>
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
        margin-left: 80% !important;
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
export default {
    name: "modalDetail",
    props: {
        showModal: false,
        toggleModal: false,
        numero: "",
        nom: "",
        type: "",
        dateCreation: "",
        fileLink: ""
    },
};
</script>
