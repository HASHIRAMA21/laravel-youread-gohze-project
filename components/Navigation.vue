<template>

    <div class="flex justify-between"> 
        <div class="flex  content-center gap-10 px-5  item-center ">
             <p >  <img src="./../assets/img/Navigation-images/im6.PNG" alt="photos"> </p>
              <button class="py-5" > ACCEUIL  </button>
             <button class="py-5"  v-click-outside.prevent="cachecatalogue" @click="affiche"  > CATALOGUE </button>
             
             <button  class="py-5" @click="menuprojet" v-click-outside.prevent="cachemenuprojet" > PROJECT  </button>
             <button class="py-5"> ANNONCES</button>

        </div>

        <div class="flex px-5 gap-10"> 
            <p class="my-auto"> <i class="  fa-solid fa-2x fa-magnifying-glass"></i> </p>
            <p> <button to="" @click="montreparametre" v-click-outside.prevent="closeparametre"  >  <img src="./../assets/img/Navigation-images/im29.PNG" alt="">  </button></p>

        </div>


    </div>
</template>

<script>


export default {
name:'Navigation',
data(){
    return {    
        etat:false
    }
},
methods:{
    affiche(){
        this.$emit('affiche');
    },

     menuprojet(){
        this.$emit('menuprojet');
    },
    cachecatalogue(){
        this.$emit('cachecatalogue');
    },
    cachemenuprojet(){
        this.$emit('cachemenuprojet');
    },
    montreparametre(){
      this.$emit('montreparametre');
      console.log("rochinel");
    },
    closeparametre(){
      this.$emit('closeparametre');
    }

},
directives: { 
  'click-outside': {
  bind: function (el, binding, vnode) {
    el.eventSetDrag = function () {
      el.setAttribute('data-dragging', 'yes');
    }
    el.eventClearDrag = function () {
      el.removeAttribute('data-dragging');
    }
    el.eventOnClick = function (event) {
      var dragging = el.getAttribute('data-dragging');
      // Check that the click was outside the el and its children, and wasn't a drag
      if (!(el == event.target || el.contains(event.target)) && !dragging) {
        // call method provided in attribute value
         console.log('directive lancée')
        vnode.context[binding.expression](event);
      }
    };
    document.addEventListener('touchstart', el.eventClearDrag);
    document.addEventListener('touchmove', el.eventSetDrag);
    document.addEventListener('click', el.eventOnClick);
    document.addEventListener('touchend', el.eventOnClick);
  }, unbind: function (el) {
    document.removeEventListener('touchstart', el.eventClearDrag);
    document.removeEventListener('touchmove', el.eventSetDrag);
    document.removeEventListener('click', el.eventOnClick);
    document.removeEventListener('touchend', el.eventOnClick);
    el.removeAttribute('data-dragging');
  },
  
}


}

}
</script>

<style> 


</style>