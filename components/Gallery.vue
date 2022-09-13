<script setup>
    import { ref } from 'vue'
    import imgNext from '@/assets/img/acceuil-image/im31.png'

    import img19 from '@/assets/img/acceuil-image/im19.png'
    import img21 from '@/assets/img/acceuil-image/im21.png'
    import img23 from '@/assets/img/acceuil-image/im23.png'
    import img24 from '@/assets/img/acceuil-image/im24.png'
    import img25 from '@/assets/img/acceuil-image/im25.png'
    import img26 from '@/assets/img/acceuil-image/im26.png'
    import img27 from '@/assets/img/acceuil-image/im27.png'

    const gallery = {
        monday: [
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img21},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img27}
        ],
        tuesday: [
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img27},
            { id: '1', title: 'gohze website product', content: img21},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img26}
        ],
        wednesday: [
            { id: '1', title: 'gohze website product', content: img21},
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img19}
        ],
        thursday: [
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img27},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img21}
        ],
        friday: [
            { id: '1', title: 'gohze website product', content: img21},
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img27},
            { id: '1', title: 'gohze website product', content: img25}
        ],
        saturday: [
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img27},
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img21},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img24}
        ],
        sonday: [
            { id: '1', title: 'gohze website product', content: img24},
            { id: '1', title: 'gohze website product', content: img26},
            { id: '1', title: 'gohze website product', content: img25},
            { id: '1', title: 'gohze website product', content: img27},
            { id: '1', title: 'gohze website product', content: img19},
            { id: '1', title: 'gohze website product', content: img23},
            { id: '1', title: 'gohze website product', content: img21}
        ],
    }

    const viewMonday = ref(true)
    const viewTuesday = ref(false)
    const viewWednesday = ref(false)
    const viewThursday = ref(false)
    const viewFriday = ref(false)
    const viewSaturday = ref(false)
    const viewSonday = ref(false)


    function selectMonday(){
        viewMonday.value = true
        viewTuesday.value = false
        viewWednesday.value = false
        viewThursday.value = false
        viewFriday.value = false
        viewSaturday.value = false
        viewSonday.value = false
        
    }
    function selectTuesday(){
        viewTuesday.value = true
        viewMonday.value = false
        viewWednesday.value = false
        viewThursday.value = false
        viewFriday.value = false
        viewSaturday.value = false
        viewSonday.value = false
    }
    function selectWednesday(){
        viewWednesday.value = true
        viewMonday.value = false
        viewTuesday.value = false
        viewThursday.value = false
        viewFriday.value = false
        viewSaturday.value = false
        viewSonday.value = false
    }
    function selectThursday(){
        viewThursday.value = true
        viewMonday.value = false
        viewTuesday.value = false
        viewWednesday.value = false
        viewFriday.value = false
        viewSaturday.value = false
        viewSonday.value = false
    }
    function selectFriday(){
        viewFriday.value = true
        viewMonday.value = false
        viewTuesday.value = false
        viewWednesday.value = false
        viewThursday.value = false
        viewSaturday.value = false
        viewSonday.value = false
    }
    function selectSaturday(){
        viewSaturday.value = true
        viewMonday.value = false
        viewTuesday.value = false
        viewWednesday.value = false
        viewThursday.value = false
        viewFriday.value = false
        viewSonday.value = false
    }
    function selectSonday(){
        viewSonday.value = true
        viewMonday.value = false
        viewTuesday.value = false
        viewWednesday.value = false
        viewThursday.value = false
        viewFriday.value = false
        viewSaturday.value = false
    }
</script>

<template>
<div class="gallerie">
    <div class="week-counter flex justify-center items-center">
        <button @click="selectMonday" class="day day-active flex justify-center items-center">mon</button>
        <button @click="selectTuesday" class="day flex justify-center items-center">tue</button>
        <button @click="selectWednesday" class="day flex justify-center items-center">wed</button>
        <button @click="selectThursday" class="day flex justify-center items-center">thu</button>
        <button @click="selectFriday" class="day flex justify-center items-center">fri</button>
        <button @click="selectSaturday" class="day flex justify-center items-center">sat</button>
        <button @click="selectSonday" class="day flex justify-center items-center">sun</button>
    </div>
    <div class="gallerie-images w-full px-8">
        <div v-if="viewMonday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 md:grid-cols-3 xsm:grid-cols-2 gap-4" v-if="gallery.monday">
                <div v-for="lecture in gallery.monday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewTuesday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xsm:grid-cols-2 gap-4" v-if="gallery.tuesday">
                <div v-for="lecture in gallery.tuesday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewWednesday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xsm:grid-cols-2 gap-4" v-if="gallery.wednesday">
                <div v-for="lecture in gallery.wednesday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewThursday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xsm:grid-cols-2 gap-4" v-if="gallery.thursday">
                <div v-for="lecture in gallery.wednesday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewFriday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xsm:grid-cols-2 gap-4" v-if="gallery.friday">
                <div v-for="lecture in gallery.friday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewSaturday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xsm:grid-cols-2 gap-4" v-if="gallery.saturday">
                <div v-for="lecture in gallery.saturday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
        <div v-if="viewSonday" class="gallerie-day flex justify-center items-center w-full py-12">
            <div class="grid grid-cols-4 xm:grid-cols-2 gap-4" v-if="gallery.sonday">
                <div v-for="lecture in gallery.sonday" :key="lecture.id" class="gallerie-item flex justify-center items-center">
                    <img :src="lecture.content" :alt="lecture.title"/>
                </div>
                <div class="gallerie-item flex justify-center items-center">
                    <img :src="imgNext" alt="next arrow icon"/>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped lang="scss">
.gallerie{
    .week-counter{
        .day{
            height: 80px;
            width: 155px;
            text-transform: uppercase;
            font-family: Poppins;
            font-size: 24px;
            font-weight: 700;
            line-height: 36px;
            letter-spacing: 0em;

            &:hover{
                background: #007D74;
                color: #FFF;
            }
        }
        .day-active{
            background: #007D74;
            color: #FFF;
        }
    }
    .gallerie-images{
        background: #F5F5F5;
        .grid{
            .gallerie-item{
                height: 281.33px;
            }
            @media(max-width: 500px){
                @apply grid-cols-2 gap-2;
            }
            @media(max-width: 400px){
                @apply grid-cols-2 gap-1;
            }
        }
    }
}
</style>