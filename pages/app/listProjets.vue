<template>
    <div class="container pt-20">
        <div>
        <div class="lg:m-0 m-auto-resp lg:text-left lg:w-full ">
            <p class="uppercase text-indigo font-bold m-text-bigger">liste des projets</p>
        </div>
        <div>
            <figure class="float-right bg-indigo circle-md mr-6"></figure>
        </div>
        <div class=" m-auto-resp lg:w-full">
            <p class="uppercase text-xs md:pt-12 pt-4"> non acheve(s)</p>
            <hr class="first-hr mt-2">
        </div></div>
        <!-- projets  non acheves -->
        <div class="flex mt-8  w-full justify-center">
            <div class="grid lg:grid-cols-2">
                <div class="mt-7 lg:ml-11" v-for="(projet, index) in projetsNonAchieved" :key="index">
                    <projet :name="projet.name" :description="projet.description" :isAchieved="projet.isAchieved"
                        :iconeBag="projet.iconeBag" :iconePeople="projet.iconePeople" :nbAuthor="projet.nbAuthor"
                        :nbCriticize="projet.nbCriticize" :searchProfil="projet.searchProfil" />
                    <!-- <div class="shadow-card  ml-9">

                </div> -->
                </div>
            </div>
            <div class="flex disappear">
                <div>
                    <figure class="circle-md bg-indigo-light mt-44 ml-2.5"></figure>
                </div>
                <div>
                    <figure class="circle-xl bg-orange ml-11"></figure>
                </div>
                <div>
                    <figure class="circle-sm bg-indigo-light mt-80"></figure>
                </div>
            </div>
        </div>

        <div>
            <p class="uppercase text-xs pt-12"> acheve(s)</p>
            <hr class="first-hr mt-2">
        </div>
        <!-- projets acheves -->
        <div class="flex mt-8  w-full justify-center">
            <div class="grid lg:grid-cols-2">
                <div class="flex mt-7 lg:ml-11" v-for="(projet, index) in projetsAchieved" :key="index">
                    <projet :name="projet.name" :description="projet.description" :isAchieved="projet.isAchieved"
                        :iconeBag="projet.iconeBag" :iconePeople="projet.iconePeople" :nbAuthor="projet.nbAuthor"
                        :nbCriticize="projet.nbCriticize" :searchProfil="projet.searchProfil" />
                    <!-- <div class="shadow-card  ml-9">

                </div> -->
                </div>
            </div>
            <div class="flex disappear">
                <div>
                    <figure class="circle-md bg-indigo-light mt-44 ml-2.5"></figure>
                </div>
                <div>
                    <figure class="circle-xl bg-orange ml-11"></figure>
                </div>
                <div>
                    <figure class="circle-sm bg-indigo-light mt-80"></figure>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>



.first-hr {
    border: 1px solid #202020;
}
@media screen and (max-width: 640px) {
   .m-auto-resp{
    width: 312px; 
    margin-left: 3%;
} 
.container {
    width: 340px;
    margin: auto;
    margin-bottom: 100px;
}
}
@media screen and (min-width: 641px) and (max-width: 1023px) {
   .m-auto-resp{
    margin: auto;
    max-width: 672px; 
} 
.container {
    width: 400px;
    margin: auto;
    margin-bottom: 100px;
}
}
@media screen and (min-width: 1024px) {
    .container {
    width: 1200px;
    margin: auto;
    margin-bottom: 100px;
}
}
</style>
<script>
import projet from '~~/components/projet.vue';
export default {
    name: "listProjets",
    components: { projet },
    data() {
        return {
            projetsAchieved: [
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: true,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },

                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: true,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: true,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },

            ],
            projetsNonAchieved: [
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: false,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: false,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: false,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                },
                {
                    name: 'sorciere et magie',
                    searchProfil: 'Auteur/Critique',
                    description: 'Gon Freecss a douze ans, et rêve de devenir hunter (chasseur en anglais).Les hunters sont des citoyens délite autorisés à faire quasiment tout ce quils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de lassociation ;',
                    iconeBag: '../../assets/img/listeprojets/Vector.png',
                    isAchieved: false,
                    iconePeople: '../../assets/img/listeprojets/Vector (1).png',
                    nbAuthor: 3,
                    nbCriticize: 2,
                }
            ]
        }
    },
}
</script>