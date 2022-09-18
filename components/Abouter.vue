<script setup>
    import imgNext from '@/assets/img/acceuil-image/im30.png'
    import img19 from '@/assets/img/acceuil-image/im19.png'
    import img21 from '@/assets/img/acceuil-image/im21.png'
    import img23 from '@/assets/img/acceuil-image/im23.png'

    const projects = [
        { id: '1', title: 'gohze website product', content: img19},
        { id: '1', title: 'gohze website product', content: img21},
        { id: '1', title: 'gohze website product', content: img23},
        { id: '1', title: 'gohze website product', content: img23},
    ]
</script>

<template>
<div class="abouter py-12 px-8">
    <div class="best-project flex justify-center items-center">
        <div class="projects">
            <div class="projects-header text-center py-8">
                <h2>THE BEST <span class="colored-text">PROJECT</span></h2>
                <p>les plus appréciés</p>
            </div>
            <div class="grid grid-cols-5 gap-5">
                <div class="project flex justify-center items-center" v-for="project in projects" :key="project.id">
                    <img :src="project.content" :alt="project.title"/>
                </div>
                <div class="project flex justify-center items-center">
                    <img :src="imgNext" />
                </div>
            </div>
        </div>
    </div>
    <div class="about-us p-auto mt-32 py-12">
        <div class="about-container flex justify-center items-start">
            <div class="about-description">
                <h2 class="about-title">ABOUT <span class="colored-text">US</span></h2>
                <p class="w-3/5 py-4">Nous sommes une plateforme qui distribue des livres, 
                    romans ,BD et qui favorise la collaboration entre différentes 
                    personnes sur un meme project
                </p>
            </div>
            <div class="about-skills flex justify-center items-center flex-wrap p-4 border-l">
                <div class="skills mr-3 flex flex-col justify-center items-center">
                    <h3 class="colored-text text-center skills-title">1000+</h3>
                    <p class="text-center w-1/2">Oeuvre disponible</p>
                </div>
                <div class="skills border-green-1 ml-3 flex flex-col justify-center items-center">
                    <h3 class="colored-text text-center skills-title">300+</h3>
                    <p class="text-center w-1/2">Auteurs</p>
                </div>
                <div class="skills border-green-1 mt-4 flex flex-col justify-center items-center">
                    <h3 class="colored-text text-center skills-title">500+</h3>
                    <p class="text-center w-1/2">Project En cours</p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute dot1 radius-full bg-green-1"></div>
    <div class="absolute dot2 radius-full bg-green-1"></div>
    <div class="absolute dot3 radius-full bg-green-2"></div>
    <div class="absolute dot4 radius-full bg-yellow-1"></div>
    <div class="absolute dot5 radius-full bg-yellow-1"></div>
    <div class="absolute dot6 radius-full bg-green-2"></div>
    <div class="absolute dot7 radius-full bg-green-1"></div>
    <div class="absolute dot8 radius-full bg-green-1"></div>
</div>
</template>

<style scoped lang="scss">
    .abouter{
        position: relative !important;
        background: #FFF;
        .best-project{
            .projects{
                .projects-header{
                    h2{
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 600;
                        font-size: 32px;
                        line-height: 48px;
                        color: #000000;
                    }
                    p{
                        font-style: normal;
                        font-weight: 400;
                        font-size: 20px;
                        line-height: 30px;
                    }
                }
                .grid{
                    .project{
                        height: 264px;
                    }
                }
                @media(max-width: 400px){
                    .grid{
                        @apply  grid-cols-2 gap-1;
                    }
                }
                @media(max-width: 500px){
                    .grid{
                        @apply  grid-cols-2 gap-2;
                    }
                }
            }
        }
        .about-us{
            @media(max-width: 500px){
                @apply mt-16;
            }
            .about-container{
                .about-description{
                    @media(max-width: 500px){
                        width: 100%;
                    }
                    width: 500px;
                    font-size: 24px;
                    font-weight: 400;
                    line-height: 36px;
                    letter-spacing: 0em;
                    .about-title{
                        font-size: 32px;
                        font-weight: 600;
                        line-height: 48px;
                        letter-spacing: 0em;
                    }
                }
                .about-skills{
                    @media(max-width: 500px){
                        width: 100%;
                    }
                    width: 500px;
                    border-color: #007D74;
                    .skills{
                        height: 167px;
                        width: 210px;
                        background: #FFFFFF;
                        box-shadow: 0px 2px 50px rgba(0, 0, 0, 0.14);
                        &:hover{
                            border: 1px solid #007D74;
                        }
                        .skills-title{
                            font-size: 32px;
                            font-weight: 600;
                            line-height: 48px;
                            letter-spacing: 0em;
                        }
                    }
                }
                @media(max-width: 500px){
                    @apply block py-0 px-4;
                    .about-description{
                        @apply w-full text-justify p-0;
                        p{
                            @apply w-full;
                        }
                    }
                    .about-skills{
                        @apply w-full flex flex-col justify-between p-0 border-0 mx-0 mt-8;
                        .skills{
                           @apply w-full mx-0 my-8 border-0;
                        }
                    }
                }
            }
        }
        @media(min-width: 500px){
            .dot1{
                height: 26px;
                width: 26px;
                left: 126px;
                top: 65px;
            }
            .dot2{
                height: 34px;
                width: 34px;
                left: 63px;
                top: 480px;
                left: 63px;
            }
            .dot3{
                width: 26px;
                height: 26px;
                right: 255px;
                top: 500px;
            }
            .dot4{
                width: 26px;
                height: 26px;
                left: 550px;
                top: 570px;
            }
            .dot5{
                width: 26px;
                height: 26px;
                right: 100px;
                bottom: 230px;
            }
            .dot6{
                width: 8px;
                height: 8px;
                right: 255px;
                bottom: 190px;
            }
            .dot7{
                width: 12px;
                height: 12px;
                left: 200px;
                bottom: 170px;
            }
            .dot8{
                width: 26px;
                height: 26px;
                right: 100px;
                bottom: 50px;
            }
        }
    }
</style>