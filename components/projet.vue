<template>
    <div class="grid">
        <div class="shadow-card ">
            <div class="h-6 bg-orange float-right ">
                <span class="uppercase text-white font-semibold mt-3.5  ml-4 text-xs  justify-center"
                    v-if="!isAchieved">
                    non
                    acheve</span>
                <span class="uppercase text-white font-semibold mt-3.5  ml-6 text-xs  justify-center" v-else>
                    acheve</span>
            </div>
            <div class="mt-5 text-sm container-small ml-auto mr-auto">
                <div>
                    <p class="uppercase  font-bold">{{ name }}</p>
                </div>
                <div class="flex mt-2.5">
                    <div><img :src=iconeBag /></div>
                    <div><span class="ml-2.5 text-sm">{{ searchProfil }}</span></div>
                </div>
                <div class="mt-3 flex">
                    <div><img :src=iconePeople /></div>
                    <div><span class="ml-2.5 text-sm">{{ nbAuthor }} Auteurs et {{ nbCriticize }} Critiques</span></div>
                </div>
                <div class="mt-2.5">
                    <p>Description:</p>
                </div>
                <div class="mt-0.5">
                    <p>{{ description }}</p>
                </div>
                <div><button
                        class="bg-indigo-dark button mb-6 float-right w-40 h-11 mt-8  font-bold  text-white font-bold rounded-lg focus:outline-none ">Aller
                        a la discussion</button></div>

            </div>
            <div>
                <hr class="hr m-auto">
            </div>

        </div>

    </div>
</template>
<style scoped>
.hr {
    width: 95%;
    color: #9D9D9D;
}

.container-small {
    width: 90%;
}

.button:hover {
    border: 2px solid #015B52;
    background-color: white;
    color: #015B52;
}

.shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    width: 499px;
    height: 367px;
    border-radius: 10px;
}
</style>
<script>
export default {
    name: "projet",
    props: {
        isAchieved: Boolean,
        name: "",
        iconeBag: "",
        searchProfil: "",
        iconePeople: "",
        nbAuthor: "",
        nbCriticize: "",
        description: "",
    },
}
</script>