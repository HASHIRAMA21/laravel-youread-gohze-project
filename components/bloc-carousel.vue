<template>
    
        <div class="relative overflow-hidden car">

            <slot> </slot>

          <p class="absolute bottom-40 right-10 " style="color:white;">  <i @click="next" class="fa-solid fa-3x fa-chevron-right"></i>   </p>
          <p class="absolute  bottom-40 left-10" style="color:white;">    <i  @click="prev" class="fa-solid fa-3x fa-angle-left"></i> </p>
        </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    methods: {
        next(){
            this.$emit('next') 
        },
         prev(){
            this.$emit('prev')
        }
    }

}
</script>

<style> 

.car{
height: 28rem;
}

@media screen and (max-width: 430px){

.car{
    height: 100%;
    overflow: hidden;
}

.car p {
    display: none;
}
}

</style>