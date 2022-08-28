<template>
  <smallModale :textButton="textButton"/>
</template>


<script>
import smallModale from "./smallModale.vue"
export default {
  name: "modalePublish",
  components:{
    smallModale
  },
  data(){
    return{
      textButton:"Yes, Publish!"
    }
  }
};
</script>

