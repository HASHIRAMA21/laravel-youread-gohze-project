<template>
 
    <div> 

            <p class="py-2">  <nuxt-link to=""> Acceuil </nuxt-link> </p>
             <button  class="py-2" @click="menuprojetmobile"> PROJECT  </button>
            <p class="py-2">  <nuxt-link to=""> ANNONCES</nuxt-link> </p>
    </div>

</template>

<script>
export default {
    
    name: 'Menu',
    data(){
        return{

        }
    },
    methods:{
         menuprojetmobile(){
        this.$emit('menuprojetmobile');
        
    },
    }
}
</script>