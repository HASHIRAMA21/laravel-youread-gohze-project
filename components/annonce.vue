<template>
    <div class="cursor-pointer w-full flex mt-4 annonce">
        <div class="rounded-full w-16 h-16 ml-11  justify-center ">
            <img :src="imgUrl" class="w-full h-full object-cover" />
        </div>
        <div class="content">
            <p>{{ name }}</p>
            <p class="text-gray text-xs float-left mt-4">{{ nbCommentaire }} commentaires</p>
        </div>
    </div>
</template>
<style scoped>
.annonce:hover{
    -webkit-transform: scale(1.08);
    transform: scale(1.08);
    -webkit-transition: 0.7s ease-in-out;
    transition: 0.7s ease-in-out;
    opacity: 1;
    /* background-color: black; */
    color:#007D74;
    font-weight: bold;
   
}
 .content{
       margin: auto;
       margin-left: 36px;
    }
</style>
<script>
export default {
    name: "annonce",
    props: {
        "name": "",
        "imgUrl": "",
        "nbCommentaire": ""
    }
}
</script>