<script setup>
import { ref } from 'vue'

//reactive constants
const catalogueIsVisible = ref(false)
const projectAreVisible = ref(false)
const sideMenuIsVisible = ref(false)
const smallMenuState = ref({
    home: true,
    catalogue: false,
    project: false,
    announce: false
})
//reactive functions

function toggleCatalogue(){
    catalogueIsVisible.value = !catalogueIsVisible.value
}
function toggleProject(){
    projectAreVisible.value = !projectAreVisible.value
}
function toggleSideMenu(){
    sideMenuIsVisible.value = !sideMenuIsVisible.value
}
function hideCatalogue(){
    catalogueIsVisible.value = false
}
function hideProject(){
    projectAreVisible.value = false
}
function hideSideMenu(){
    sideMenuIsVisible.value = false
}
function setSmallMenuHomeState(){
    smallMenuState.value = {
        home: true,
        catalogue: false,
        project: false,
        announce: false
    }
}
function setSmallMenuCatalogueState(){
    smallMenuState.value = {
        home: false,
        catalogue: true,
        project: false,
        announce: false
    }
}
function setSmallMenuProjectState(){
    smallMenuState.value = {
        home: false,
        catalogue: false,
        project: true,
        announce: false
    }
}
function setSmallMenuAnnounceState(){
    smallMenuState.value = {
        home: false,
        catalogue: false,
        project: false,
        announce: true
    }
}
</script>

<template>
    <nav class="navbar bg-white fixed top-0 left-0 right-0">
        <div class="w-full px-4 relative">
            <div class="nav-container web-nav flex justify-between items-center w-full mx-1">
                <div class="toggler-menu">
                    <div class="toggler-menu-container flex justify-start items-center">
                        <button @click="toggleSideMenu" v-click-outside.prevent="hideSideMenu"><i class="fas fa-bars"></i></button>
                        <div class="ml-3 small-menu">
                            <div v-if="smallMenuState.home"><nuxt-link>accueil</nuxt-link></div>
                            <div v-if="smallMenuState.catalogue" class="dropdown">
                                <button  class="navbar-link"><span class="text-upper">catalogue</span> <i class="fas fa-chevron-down"></i></button> 
                            </div>
                            <div v-if="smallMenuState.project" class="dropdown">
                                <button  class="navbar-link"><span class="text-upper">projets</span> <i class="fas fa-chevron-down"></i></button> 
                            </div>
                            <div v-if="smallMenuState.announce"><nuxt-link>annonces</nuxt-link></div>
                        </div>
                    </div>
                    <div v-if="sideMenuIsVisible" class="side-left-menu shadow">
                        <div class="small-menu">
                            <div class="side-menu-item py-4" :class="{'active-side-menu-item': smallMenuState.home}"><nuxt-link class="py-4 px-2" @click="setSmallMenuHomeState">accueil</nuxt-link></div>
                            <div class="dropdown side-menu-item py-4" :class="{'active-side-menu-item': smallMenuState.catalogue}">
                                <div class="dropdown-item">
                                    <button  class="px-2" @click="setSmallMenuCatalogueState"><span class="text-upper">catalogue</span> <i class="fas fa-chevron-down"></i></button>
                                </div>
                            </div>
                            <div class="dropdown side-menu-item py-4" :class="{'active-side-menu-item': smallMenuState.project}">
                                <div class="dropdown-item">
                                    <button  class="px-2" @click="setSmallMenuProjectState"><span class="text-upper">projets</span> <i class="fas fa-chevron-down"></i></button>
                                </div>
                            </div>
                            <div class="side-menu-item py-4" :class="{'active-side-menu-item': smallMenuState.announce}"><nuxt-link class="py-4 px-2" @click="setSmallMenuAnnounceState">annonces</nuxt-link></div>
                        </div>
                    </div>
                </div>
                <div class="brand-menu flex justify-tart items-center">
                    <div class="brand mr-3">
                        <nuxt-link to="/" class="navbar-item"><img src="@/assets/img/Navigation-images/im6.png" alt="youread"/></nuxt-link>
                    </div>
                    <div class="navbar-menu">
                        <ul class="menu">
                            <li><nuxt-link to="" class="text-upper navbar-link">accueil</nuxt-link></li>
                            <li class="dropdown">
                                <div class="dropdown-item">
                                    <button @click="toggleCatalogue" v-click-outside.prevent="hideCatalogue" class="navbar-link"><span class="text-upper">catalogue</span> <i class="fas fa-chevron-down"></i></button>
                                </div>
                                <div v-if="catalogueIsVisible" class="dropdown-content rounded">
                                    <div class="relative">
                                        <div class="dropdown-tracker shadow border-t-2 border-l-2"></div>
                                        <div class="content px-4">
                                            <div class="flex justify-between items-center p-6">
                                                <div class="catalogue-listner">
                                                    <p class="py-2">BD</p>
                                                    <p class="py-2">Action</p>
                                                    <p class="py-2">Aventure</p>
                                                    <p class="py-2">Fan fiction</p>
                                                    <p class="py-2">Roman</p>
                                                    <p>Historique</p>
                                                </div>
                                                <div class="catalogue-listner">
                                                    <p class="py-2">Poesie</p>
                                                    <p class="py-2">Horreur</p>
                                                    <p class="py-2">Fantaisie</p>
                                                    <p class="py-2">Thriller</p>
                                                    <p class="py-2">Humour</p>
                                                    <p class="py-2">Classique</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <div class="dropdown-item">
                                    <button @click="toggleProject" v-click-outside.prevent="hideProject" class="navbar-link"><span class="text-upper">projets</span> <i class="fas fa-chevron-down"></i></button>
                                </div>
                                <div v-if="projectAreVisible" class="dropdown-content w-small rounded">
                                    <div class="relative">
                                        <div class="dropdown-tracker shadow border"></div>
                                        <div class="content">
                                            <div class="py-2">
                                                <div class="project-item flex justify-start items-center border-b-2 p-3">
                                                    <div class="w-12 h-12 mr-2 flex justify-center items-center">
                                                        <i class="fas fa-file"></i>
                                                    </div>
                                                    <div class="py-4">Nouveau projet</div>
                                                </div>
                                                <div class="project-item flex justify-start items-center p-3">
                                                    <div class="w-12 h-12 mr-2"></div>
                                                    <div class="py-4">Liste des projets</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><nuxt-link to="" class="text-upper navbar-link">annonces</nuxt-link></li>
                        </ul>
                    </div>
                </div>
                <div class="search-setting flex justify-end items-center">
                    <div class="search-bar mr-6">
                        <button class="navbar-link"><i class="fas fa-search fa-2x"></i></button>
                    </div>
                    <div class="settng">
                        <button><img src="@/assets/img/Navigation-images/im29.png" alt=""/></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped lang="scss">
.navbar-link{
    &:hover{
        color: #007D74;  
    }
}
.navbar{
    background: #FFFFFF;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    height: 89px;
    z-index: 999999;
    @apply flex flex-col justify-center items-start;
    @media(max-width: 500px){
        height: 70px;
    }
    .relative{
        position: relative;
        .nav-container{
            .toggler-menu{
                display: none;
                .toggler-menu-container{
                    .dropdown{
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 21px;
                        letter-spacing: 0em;
                        text-align: left;
                    }
                }
                .side-left-menu{
                    background: #FFF;
                    position: absolute;
                    top: 73px;
                    left: 0;
                    z-index: 100;
                    width: 350px;
                    .small-menu{
                        .active-side-menu-item{
                            background: #007D74;
                            color: #FFF;
                        }
                        .side-menu-item{
                            &:hover{
                                background: #007D74;
                                color: #FFF;
                            }
                        }
                    }
                }
                @media(max-width: 1000px){
                    display: block;
                }
            }
            .brand-menu{
                .brand{
                    @media(max-width: 500px){
                        .navbar-item{
                            img{
                                height: 18px;
                            }
                        }
                    }
                }
                .navbar-menu{
                    .menu{
                        list-style-type: none;
                        li{
                            display: inline-block;
                            margin: 0 0.69rem;
                            cursor: pointer;
                            .navbar-link{
                                font-size: 14px;
                                font-weight: 400;
                                line-height: 21px;
                                letter-spacing: 0em;
                                text-align: left;
                            }
                            @media(max-width: 1000px){
                                display: none;
                            }
                        }
                        .dropdown{
                            position: relative;
                            .w-small{
                                width: 350px !important;
                            }
                            .dropdown-content{
                                position: absolute;
                                top: 65px;
                                left: -30px;
                                width: 450px;
                                z-index: 50;
                                border-radius: 8px;
                                @apply border shadow shadow-lg;

                                .relative{
                                    z-index: 51;
                                    podition: relative;
                                    border-radius: 8px;
                                    .dropdown-tracker{
                                        position: absolute;
                                        top: -20px;
                                        left: 50px;
                                        height: 40px;
                                        width: 40px;
                                        background: #FFF;
                                        transform: rotateZ(45deg);
                                        z-index: 50;
                                    }
                                    .content{
                                        position: relative;
                                        z-index: 52;
                                        border-radius: 8px;
                                        background: #FFF;
                                        font-size: 18px;
                                        font-weight: 600;
                                        line-height: 30px;
                                        letter-spacing: 0em;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            .search-setting{
                @media(max-width: 500px){
                    display: none;
                }
            }
        }
    }
}
</style>