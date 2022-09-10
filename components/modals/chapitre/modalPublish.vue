<template>
  <smallModal :textButton="textButton" :textModal="textModal"/>
</template>


<script>
import smallModal from "./smallModal.vue"
export default {
  name: "modalPublish",
  components:{
    smallModal
  },
  data(){
    return{
      textButton:"Yes, Publish!",
      textModal:"publish"
    }
  }
};
</script>

