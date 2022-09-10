<template>
  <smallModal :textButton="textButton" :textModal="textModal"/>
</template>


<script>
import smallModal from "./smallModal.vue"
export default {
  name: "modalDelete",
  components:{
    smallModal
  },
  data(){
    return{
      textButton:"Yes, delete it!",
      textModal:"delete"
    }
  }
};
</script>

