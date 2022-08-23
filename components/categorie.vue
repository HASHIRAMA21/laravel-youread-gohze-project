<template>
    <div class="shadow-card grid grid-cols-2 bg-pink">
        <div class="">
            <p class="font-semibold ml-3.5 w-full">{{ name }}</p>
        </div>
        <div class="">
            <img :src="imageUrl" alt="image">
        </div>
    </div>
</template>
<style scoped>
p {
    margin-top: 50%;
    margin-bottom: 50%;
}

.shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    width: 255px;
    height: 150px;
    border-radius: 15px;
}

.shadow-card {
    overflow: hidden
}

/* .shadow-card {width:100%;height:auto} */
.shadow-card:hover {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    -webkit-transition: 0.7s ease-in-out;
    transition: 0.7s ease-in-out;
    opacity: 0.8;
    background-color: #0d3330;
    color:white
}

img {
    width: 100%;
    height: 100%;
}

.bg-pink {
    background-color: #FFFDF9;
    height: 100%;
}
</style>
<script>
export default {
    name: "Categorie",
    props: {
        "name": "",
        "imageUrl": ""
    },
}
</script>