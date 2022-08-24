<template>
    <div class="container">
        <div class="ml-44 mt-14">
            <figure class="circle-md bg-indigo first-figure"></figure>
        </div>
        <div>
            <p class="uppercase font-bold text-xl mt-1 title xl:ml-14 lg:ml-16  md:ml-28 sm:ml-16 ml-10">parcourir les categories</p>
        </div>
        <div class="flex justify-center">
            <div class="grid xl:grid-cols-4 container-cat gap-4 lg:grid-cols-3 sm:grid-cols-2 button">
                <div v-for="(cat, index) in categories" :key="index" class="mt-3 cursor-pointer">
                    <categorie class="" :name="cat.name" :imageUrl="cat.image" />
                </div>
            </div>
            <div class="ml-8 mt-8 disappear">
                <figure class="circle-xl bg-orange "></figure>
            </div>
            <div class="disappear">
                <figure class="circle-md bg-indigo ml-7 mt-64 "></figure>
            </div>
        </div>

        <div class="float-right mr-16 mt-5">
            <figure class="circle-lg bg-indigo-light"></figure>
        </div>
        <div class="ml-32 mt-28">
            <figure class="circle-md bg-indigo"></figure>
        </div>
    </div>
</template>
<style scoped>
@media only screen and (max-width: 1024px) {
   .disappear{ display: none ; }
}
.first-figure{
    margin-left: 35%;
}
.container-cat {
    max-width: 85%;
    
}
@media only screen and (max-width: 640px){
    .title{text-align: center;}
}
.title{
    /* width: 76%;
    margin: auto; */
    /* max-width: 85%; */
    margin-bottom: 20px;
}
p{
    width: 85%;
}
.container {
    margin: auto;
    /* width: 80%; */
    margin-bottom: 100px;
    justify-content: center;
}



.shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    width: 255px;
    height: 150px;
    border-radius: 15px;
}
</style>
<script>

import categorie from '../../components/categorie.vue';
export default {
    name: "recherche",
    components: {
        categorie
    },
    data() {
        return {
            categories: [
                {
                    image:'../../assets/img/categorielivres/planete.png',
                    name: 'Science Fiction',
                },
                {
                    image: '../../assets/img/categorielivres/robot.png',
                    name: 'BD',
                },
                {
                    image: '../../assets/img/categorielivres/main.png',
                    name: 'Humorisme',
                },
                {
                    image: '../../assets/img/categorielivres/grenouille.png',
                    name: 'Animaux',
                },
                {
                    image: '../../assets/img/categorielivres/homme.png',
                    name: 'Romans',
                },
                {
                    image: '../../assets/img/categorielivres/skyscaper.png',
                    name: 'politique',
                },
                {
                    image: '../../assets/img/categorielivres/book.png',
                    name: 'Education',
                },
                {
                    image: '../../assets/img/categorielivres/grenouille.png',
                    name: 'Animaux',
                },
                {
                    image: '../../assets/img/categorielivres/planete.png',
                    name: 'Science Fiction',
                },
                {
                    image: '../../assets/img/categorielivres/robot.png',
                    name: 'Robot',
                },
                {
                    image: '../../assets/img/categorielivres/main.png',
                    name: 'Humanisme',
                },
                {
                    image: '../../assets/img/categorielivres/grenouille.png',
                    name: 'Animaux',
                },
            ],
        }
    },
}
</script>