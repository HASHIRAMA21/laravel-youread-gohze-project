<template>
    <div class="">
        <div class="flex mt-16 w-full justify-center">
            <div class="">
                <div class="bg-white rounded-2xl w-64 lg:w-64 md:w-52 md:h-44 lg:h-56 h-56 container disappear-bloc">
                    <div class="grid">
                        <p class="uppercase text-center text-indigo font-bold mb-6 mt-8 w-full">annonces</p>
                        <p class="uppercase text-center w-40  m-auto"> vous avez une nouvelle annonce</p>
                    </div>
                </div>
                <div class="disappear-bloc">
                    <div class="">
                        <figure class="circle-md bg-indigo figure-indigo"></figure>
                    </div>
                    <div>
                        <figure class="circle-xl  bg-indigo-light mt-56 ml-32"></figure>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl container ml-12 content flex ">
                <div class="w-full">
                    <div v-for="(annonce, index) in annonces" :key="index" >
                        <annonce :name="annonce.name" :imgUrl="annonce.imgUrl" :nbCommentaire="annonce.nbCommentaire" />
                        <hr class="mt-4">
                    </div>

                </div>
            </div>
            <div class="disappear">
                <div class="">
                    <figure class="circle-xl  bg-orange mt-36 ml-36"></figure>
                </div>
                <div>
                    <figure class="circle-sm bg-indigo-light mt-72 ml-40"></figure>
                </div>
            </div>
        </div>

    </div>
</template>
<style scoped>
@media only screen and (max-width: 1024px) {
   .disappear{ display: none ; }
}
@media only screen and (max-width: 640px) {
   .disappear-bloc{ display: none ; }
}
.container {
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
}

.figure-indigo {
    margin-top: 57%;
    margin-left: 50%;
}

/* .figure-orange{
        margin-top: 50%;
        margin-left: 30%;
    } */
@media only screen and (min-width: 1024px) {
    .content {
        width: 688px;
        height: 100%;
    }
}
@media only screen and (min-width: 768px) {
    .content {
        width: 488px;
        height: 100%;
    }
}
@media only screen and (max-width: 640px) {
    .content {
        width: 320px;
        height: 100%;
        margin: auto;
    }
}
</style>
<script>
import annonce from '../../components/annonce.vue';
export default ({
    name: "annonces",
    components: { annonce },
    data() {
        return {
            annonces: [
                {
                    name: "Recherche d'un critique pour notre livre surnaturel, il doit etre...",
                    imgUrl: '../../assets/img/annonces/Ellipse 49.png',
                    nbCommentaire: 21
                },
                {
                    name: "Recherche d'un critique pour notre livre surnaturel, il doit etre...",
                    imgUrl: '../../assets/img/annonces/Ellipse 50.png',
                    nbCommentaire: 21
                },
                {
                    name: "Recherche d'un critique pour notre livre surnaturel, il doit etre...",
                    imgUrl: '../../assets/img/annonces/Ellipse 51.png',
                    nbCommentaire: 21
                },
                {
                    name: "Recherche d'un critique pour notre livre surnaturel, il doit etre...",
                    imgUrl: '../../assets/img/annonces/Ellipse 52.png',
                    nbCommentaire: 21
                },

            ]
        }
    }
})
</script>
