<template>
    <div class="listemangas relative">
        <div class="titrepage flex place-items-center pl-24 py-4">
            <div class="texte text-vertbleu text-3xl font-bold font-serif">MANGAS</div>
            <div class="w-16 ml-7">
                <img src="~/assets/img/listemangas/hibou.png" alt="hibou" class="w-full">
            </div>
            <div class="rondsPermanents relative">
                <div class="absolute -top-8 left-7 circle-lg bg-orange"></div>
                <div class="absolute -top-1 left-24 circle-lg bg-indigo-light"></div>
            </div>
        </div>
        
        <div class="contenu flex justify-center">
            <div class="flex flex-col p-4 mb-10 rounded-lg myshadow">
                <div class="flex justify-between place-items-center border-b border-gray-400 font-semibold">
                    <div class="text-lg">Liste Des Histoires</div>

                    <div class="filtre relative text-vertbleu text-sm cursor-pointer">
                        <div @click="toggleFilterBox" v-click-outside="hideFilterBox">
                            Trier
                            <i class="fa-solid fa-arrow-up-short-wide text-lg"></i>
                        </div>

                        <div class="filterBox absolute right-0 top-8 w-36 z-10 text-black bg-white border border-green-600"
                        v-if="showFilterBox">
                            <div class="px-3 py-2 flex gap-2 place-items-center hover:bg-gray-200"
                            @click="()=>setFilterMode('asc')">
                                <input type="radio" name="ordre-tri" id="ascendant" :checked="filterMode==='asc'">
                                <label for="ascendant">de A à Z</label>
                            </div>
                            <div class="px-3 py-2 flex gap-2 place-items-center hover:bg-gray-200"
                            @click="()=>setFilterMode('desc')">
                                <input type="radio" name="ordre-tri" id="descendant" :checked="filterMode==='desc'">
                                <label for="descendant">de Z à A</label>
                            </div>
                            <div class="px-3 py-2 flex gap-2 place-items-center hover:bg-gray-200"
                            @click="()=>setFilterMode('')">
                                Annuler
                            </div>
                        </div>
                    </div>

                </div>
                <div class="liste flex flex-wrap justify-around mb-14">
                    <BoxManga v-for="(manga, index) in subArray" :key="index"
                    :img="manga.img" :titre="manga.titre" />
                </div>
                <div class="flex justify-end place-items-center border-t pt-3 mb-5 border-gray-400 font-semibold">
                                        
                    <NuxtLink  v-for="(el, index) in nbPages" :key="index"
                    :to="'?page='+(index+1)"
                    class="text-lg link-page flex w-9 h-9  justify-center place-items-center rounded "
                    :class="page===(index+1) ? 'border border-vertbleu text-vertbleu font-bold' : ''">
                    {{index + 1}}
                    </NuxtLink>

                </div>
            </div>
        </div>
        <div class="rondsNonPermanents">
            <div class="absolute top-20 left-16 circle-md bg-indigo"></div>
            <div class="absolute top-1/3 left-8 circle-lg bg-orange"></div>
            <div class="absolute top-1/2 left-16 circle-sm bg-orange"></div>
            <div class="absolute top-2/3 left-12 circle-md bg-indigo-light"></div>

            <div class="absolute top-16 right-16 circle-md bg-indigo"></div>
            <div class="absolute top-40 right-8 circle-lg bg-orange"></div>
            <div class="absolute top-1/3 right-12 circle-sm bg-indigo-light"></div>
            <div class="absolute top-1/2 right-7 circle-sm bg-indigo-light"></div>
            <div class="absolute top-2/3 right-12 circle-lg bg-indigo"></div>

        </div>
    </div>
</template>

<script>
import {ref, computed} from 'vue'
import _listemangas from '~/assets/js/listemangas'

export default {
    scrollToTop: true,
    props:{
        nbImg: {type: Number, default: 12} //Nombre maximal d'images à afficher par page
    },
    
    setup(props){
        
        /* Les noms des membres du projet, avec leur photo de profil */
        const listemangas = ref(_listemangas);
        const showFilterBox = ref(false);
        const filterMode = ref(''); // '' pour aucun tri, 'asc' pour ascendant, 'desc' pour descendant
        const route = useRoute();

        const nbPages = computed(() => {
            return Math.ceil(listemangas.value.length/props.nbImg);
        });

        const page = computed(() => {
            let _page = 1;
            if(route.query.page) _page = Number(route.query.page);
            if(!_page || !Number.isInteger(_page) || _page<1 || _page >nbPages.value) _page = 1;
            
            return _page;
        });

        const subArray = computed(() => {
            let tableau = listemangas.value.slice(); //On copie le tableau listemangas

            if(filterMode.value==='asc') tableau.sort((a,b)=>a.titre.localeCompare(b.titre));
            else if(filterMode.value==='desc') tableau.sort((a,b)=>b.titre.localeCompare(a.titre));

            return tableau.slice(props.nbImg*(page.value-1),props.nbImg*page.value);
        });

        function toggleFilterBox(){
            showFilterBox.value = !showFilterBox.value;
        }

        function hideFilterBox(){
            showFilterBox.value = false;
        }

        function setFilterMode(valeur){
            filterMode.value = valeur; console.log(filterMode.value);
        }

        return { listemangas, subArray, nbPages, page, showFilterBox, filterMode,
        setFilterMode, toggleFilterBox, hideFilterBox}
    }
}
</script>

<style scoped>
.myshadow{
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    flex-basis: 80%;
}
.filterBox{
    box-shadow: 0 0 4px rgba(0, 175, 0, 0.3);
}

@media screen and (max-width: 950px) {
.myshadow{
flex-basis: 88%;
}
.rondsNonPermanents{
    display: none;
}
}

@media screen and (max-width: 800px) {
.myshadow{
flex-basis: 95%;
}
.titrepage{
    padding-left: 40px;
}
}

@media screen and (max-width: 430px) {
.listemangas{
    padding: 0px 2px;
}
.titrepage{
    padding-left: 0px;
}
    .myshadow{
    /* box-shadow: none; */box-shadow: 0 0 8px rgba(0,0,0,0.3);
    flex-basis: 93%;
    padding: 2px;
    }
.listemangas .liste{
    justify-content: space-around;
}
}
</style>