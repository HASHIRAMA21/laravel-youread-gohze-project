<template>
<!-- Composant permettant d'afficher des images superposées, suivies par un texte -->
    <div class="projectMembers flex place-items-center w-full py-3 pl-0">
        <div class="images flex">
            <div class="img cercle relative" v-for="(participant, index) in subArray" :key="index"
            :style="{left: (-decalage*index) + 'px'}">
                <img :src="participant.img" alt="profile pic" 
                :style="{'min-width': imgWidth + 'px', 'min-height': imgWidth + 'px',
                 width: imgWidth + 'px', height: imgWidth + 'px'}"
                >
            </div>
        </div>
        <div class="texte pl-4 relative" :style="{left: (-decalage*(subArray.length-1)) + 'px'}"
        v-if="showText">
            {{texte}}
        </div>
    </div>
</template>
<script>
import {ref, computed} from 'vue'

export default {
    props:{
        imgWidth: {type: String, default: '40'}, //largeur d'une image, en pixels
        decalage: {type: Number, default: 10}, //décalage d'une image sur celle qui la précède
        nbImg: {type: Number, default: 4}, //Nombre maximal d'images à afficher
        showText: {type: Boolean, default: true} //Nombre maximal d'images à afficher
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
    }
}
</script>

<style scoped>
/* Bien vouloir modifier ces réglages si ça ne vous convient pas */
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
