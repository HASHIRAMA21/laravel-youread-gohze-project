<template>
    <div class="">
        <div class="flex mt-16 w-full justify-center">
            <div class="">
                <div class="bg-white rounded-2xl w-64 h-56 container">
                    <div class="grid">
                        <p class="uppercase text-center text-indigo font-bold mb-6 mt-8 w-full">annonces</p>
                        <p class="uppercase text-center w-40  m-auto"> vous avez une nouvelle annonce</p>
                    </div>
                </div>
                <div>
                    <div class="">
                        <figure class="circle-md bg-indigo figure-indigo"></figure>
                    </div>
                    <div>
                        <figure class="circle-xl  bg-indigo-light mt-56 ml-32"></figure>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl container ml-12 content flex">
                <div class="w-full">
                    <div v-for="(annonce, index) in annonces" :key="index" >
                        <annonce :name="annonce.name" :imgUrl="annonce.imgUrl" :nbCommentaire="annonce.nbCommentaire" />
                        <hr class="mt-4">
                        <!-- Composant permettant d'afficher des images superposées, suivies par un texte -->
                        <div class="projectMembers flex place-items-center w-full py-3 pl-4">
                            <div class="images flex">
                                <div class="img cercle relative" v-for="(participant, index) in subArray" :key="index"
                                :style="{left: (-decalage*index) + 'px'}">
                                    <img :src="participant.img" alt="profile pic" 
                                    :style="{'min-width': imgWidth + 'px', 'min-height': imgWidth + 'px',
                                    width: imgWidth + 'px', height: imgWidth + 'px'}"
                                    >
                                </div>
                            </div>
                            <div class="texte pl-4 relative" :style="{left: (-decalage*(subArray.length-1)) + 'px'}">
                                {{texte}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>
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
.texte{
    min-width: 230px;
    font-weight: normal;
}

@media screen and (max-width: 430px) {
.projectMembers{
    padding-left: 0px;
}
}

@media screen and (max-width: 370px) {
.texte{
    left: 0px !important; padding: 0px;
}
.projectMembers{
    flex-direction: column;
    place-items: inherit;
}
}
.container {
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
}

.figure-indigo {
    margin-top: 57%;
    margin-left: 50%;
}

.content {
    width: 688px;
    height: 100%;
}
</style>
<script>
import annonce from '../../components/annonce.vue';
import {ref, computed} from 'vue'
export default ({
    name: "annonces",
    components: { annonce },
     props:{
        imgWidth: {type: String, default: '40'}, //largeur d'une image, en pixels
        decalage: {type: Number, default: 10}, //décalage d'une image sur celle qui la précède
        nbImg: {type: Number, default: 4} //Nombre maximal d'images à afficher
    },
    setup(props){
        /* Les noms des membres du projet, avec leur photo de profil */
        const participants = ref([
            {nom: 'Bradley', img:  '../assets/img/profile-pics/profile-pic1.png'},
            {nom: 'Rochinel', img: '../assets/img/profile-pics/profile-pic2.png'},
            {nom: 'Richelle', img: '../assets/img/profile-pics/profile-pic3.png'},
            {nom: 'Elohim', img: '../assets/img/profile-pics/profile-pic4.png'},
            {nom: 'Johanna', img: '../assets/img/profile-pics/profile-pic5.png'},
            {nom: 'Aurel', img: '../assets/img/profile-pics/profile-pic1.png'},
            {nom: 'Martin', img: '../assets/img/profile-pics/profile-pic3.png'},
            {nom: 'Pierre', img: '../assets/img/profile-pics/profile-pic4.png'}
        ]);

        const texte = computed(() => {
            let plus1 = participants.value.length > 1, plus2 = participants.value.length > 2;
            let terminaison = plus2 ? 's' : '';
            let jonction = plus1 ? ' et ' +  (participants.value.length -1) + 
            ' autre' + terminaison + ' personne' + terminaison: '';
        
            return participants.value[0].nom + jonction;
        });

        const subArray = computed(() => {
            return participants.value.slice(0,props.nbImg);
        });

        return {participants, texte, subArray}
    },
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
