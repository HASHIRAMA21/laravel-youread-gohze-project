<template>
    <div class="grid">
        <div class="shadow-card ">
            <div class="h-6 bg-orange float-right ">
                <span class="uppercase text-white font-semibold mt-3.5  ml-4 text-xs  justify-center"
                    v-if="!isAchieved">
                    non
                    acheve</span>
                <span class="uppercase text-white font-semibold mt-3.5  ml-6 text-xs  justify-center" v-else>
                    acheve</span>
            </div>
            <div class="mt-5 text-sm container-small ml-auto mr-auto">
                <div>
                    <p class="uppercase  font-bold">{{ name }}</p>
                </div>
                <div class="flex mt-2.5">
                    <div><img :src=iconeBag /></div>
                    <div><span class="ml-2.5 text-sm">{{ searchProfil }}</span></div>
                </div>
                <div class="mt-3 flex">
                    <div><img :src=iconePeople /></div>
                    <div><span class="ml-2.5 text-sm">{{ nbAuthor }} Auteurs et {{ nbCriticize }} Critiques</span></div>
                </div>
                <div class="mt-2.5">
                    <p>Description:</p>
                </div>
                <div class="mt-0.5">
                    <p>{{ description }}</p>
                </div>
                <div><button
                        class="bg-indigo-dark button mb-6 float-right w-40 h-11 mt-8  font-bold  text-white font-bold rounded-lg focus:outline-none ">Aller
                        a la discussion</button></div>

            </div>
            <div>
                <hr class="hr m-auto">
            </div>
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
</template>
<style scoped>
.hr {
    width: 95%;
    color: #9D9D9D;
}

.container-small {
    width: 90%;
}

.button:hover {
    border: 2px solid #015B52;
    background-color: white;
    color: #015B52;
}

.shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    width: 499px;
    height: 400px;
    border-radius: 10px;
}
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
</style>
<script>
import {ref, computed} from 'vue'
export default {
    name: "projet",
    props: {
        imgWidth: {type: String, default: '35'}, //largeur d'une image, en pixels
        decalage: {type: Number, default: 10}, //décalage d'une image sur celle qui la précède
        nbImg: {type: Number, default: 4}, //Nombre maximal d'images à afficher,
        isAchieved: Boolean,
        name: "",
        iconeBag: "",
        searchProfil: "",
        iconePeople: "",
        nbAuthor: "",
        nbCriticize: "",
        description: "",
    },
    setup(props){
        /* Les noms des membres du projet, avec leur photo de profil */
        const participants = ref([
            {nom: 'Bradley', img:  '../../assets/img/listeprojets/Ellipse 55.png'},
            {nom: 'Rochinel', img: '../../assets/img/listeprojets/Ellipse 56.png'},
            {nom: 'Richelle', img: '../../assets/img/listeprojets/Ellipse 57.png'},
            {nom: 'Elohim', img: '../../assets/img/listeprojets/Ellipse 58.png'},
            {nom: 'Johanna', img: '../../assets/img/listeprojets/Ellipse 55.png'},
            {nom: 'Aurel', img: '../../assets/img/listeprojets/Ellipse 56.png'},
            {nom: 'Martin', img: '../../assets/img/listeprojets/Ellipse 57.png'},
            {nom: 'Pierre', img: '../../assets/img/listeprojets/Ellipse 58.png'}
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
    }
}
</script>