<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import img28 from '@/assets/img/acceuil-image/carousel-image/im28.png'
import img22 from '@/assets/img/acceuil-image/carousel-image/im22.jpg'
import img20 from '@/assets/img/acceuil-image/carousel-image/im20.jpg'

const slides = [
  { id: '1', title: 'Vue 3 Introduction', content: img28 },
  { id: '2', title: 'Vue 3 Components', content: img22 },
  { id: '3', title: 'Vue 3 Conditional', content: img20 },
]

</script>

<template>
    <div class="carousel-header">
        <Carousel class="w-full">
            <Slide v-for="slide in slides" :key="slide.id">
                <div class="carousel__item">
                    <img :src="slide.content" :alt="slide.title"/>
                </div>
            </Slide>

            <template #addons>
            <Navigation />
            <Pagination />
            </template>
        </Carousel>
    </div>
</template>

<style scoped lang="scss">
.carousel-header{
    .carousel{
        .carousel__viewport{
            .carousel__track{
                .carousel__slide {
                    padding: 0;
                    .carousel__item {
                        min-height: 200px;
                        height: 450px;
                        width: 100%;
                        background-color: var(--vc-clr-primary);
                        color: var(--vc-clr-white);
                        font-size: 20px;
                        justify-content: center;
                        align-items: center;
                        img{
                            width: 100% !important;
                            height: 100% !important;
                        }
                    }
                }
            }
        }
        .carousel__prev{
            box-sizing: content-box;
            left: 30px !important;
            background: transparent;
        }
        .carousel__next {
            box-sizing: content-box;
            background: transparent;
            right: 30px !important;
        }
        .carousel__pagination{
            .carousel__pagination-item{
                .carousel__pagination-button{
                    height: 17px;
                    width: 42.1219482421875px;
                    border-radius: 0px;
                    background: #FFFFFF;
                    mix-blend-mode: normal;
                    opacity: 0.3;
                }
                .carousel__pagination-button--active{
                    opacity: 1;
                }
            }
        }
    }
}

</style>