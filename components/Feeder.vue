<script setup>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import img29 from '@/assets/img/acceuil-image/im29.png'

import 'vue3-carousel/dist/carousel.css';

const breakpoints = {
    200: {
        itemsToShow: 1,
        snapAlign: 'center',
    },
    // 700px and up
    700: {
        itemsToShow: 2.5,
        snapAlign: 'center',
    },
    // 1024 and up
    1024: {
        itemsToShow: 3,
        snapAlign: 'start',
    },
}
</script>

<template>
<div class="feeder w-ful relative my-12">
    <div class="feeds-container flex flex-col justify-center items-center">
        <div class="feeds">
            <div class="feeds-header flex flex-col justify-center items-center text-center py-3">
                <h2 class="colored-text feeds-title mb-3">AVIS</h2>
                <p class="w-4/5">Nos utilisateurs vous font part de leurs avis sur la plate forme</p>
            </div>
        </div>
        <div class="feed-slider py-16 w-full">
            <div class="feeds-slider-container flex justify-center items-center w-full py-4">
                <div class="feed-background w-4/5"></div>
                <div class="feed-slider-content py-4 flex flex-col items-center justify-center">
                    <div class="carousel-slider">
                        <Carousel :items-to-show="3" :breakpoints="breakpoints" :wrap-around="true">
                            <Slide v-for="slide in 10" :key="slide">
                                <div class="carousel__item flex flex-col justify-between items-center p-4">
                                    <div class="slide-top flex justify-start items-center">
                                        <img :src="img29" alt="Youread" />
                                        <p class="ml-4">Johana</p>
                                    </div>
                                    <div class="slide-text">
                                        <p class="w-4/5 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent congue metus vel </p>
                                    </div>
                                    <div class="slide-stars w-full text-right">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </Slide>

                            <template #addons>
                            <Navigation />
                            </template>
                        </Carousel>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped lang="scss">
.feeder{
    position: relative;
    .feeds-container{
        .feeds{
            .feeds-header{
                font-size: 20px;
                font-weight: 400;
                line-height: 30px;
                letter-spacing: 0em;
            }
            .feeds-title{
                font-size: 32px;
                font-weight: 600;
                line-height: 48px;
                letter-spacing: 0em;
            }
        }
        .feed-slider{
            position: relative;
            .feeds-slider-container{
                position: relative;
                .feed-background{
                    height: 436px;
                    background: #F5F5F5;
                }
                .feed-slider-content{
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    .carousel-slider{
                        width: 90%;
                        .carousel__item {
                            min-height: 200px;
                            height: 271px;
                            width: 100%;
                            background-color: #FFF;
                            border-radius: 8px;
                            box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.25);
                            .slide-top{
                                width: 100%;
                                padding: 0.75rem;
                                p{
                                    margin-left: 0.75rem;
                                }
                            }
                            .slide-text{
                                width: 100%;
                                p{
                                    text-align: left;
                                    width: 80%;
                                    padding: 0.75rem;
                                }
                            }
                            .slide-stars{
                                display: flex;
                                justify-content: flex-end;
                                align-items: center;
                                padding: 0.75rem;
                                color: #F7CB29;
                            }
                        }

                        .carousel__slide {
                            padding: 10px;
                        }

                        .carousel__prev,
                        .carousel__next {
                            box-sizing: content-box;
                            border: 5px solid white;
                        }
                    }
                }
            }
        }
    }
}
</style>