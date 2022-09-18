<template>
    <div class="bienvenue-card dashboard-content-margin flex justify-between place-items-center text-white h-48 md:h-56 gradient-vert
            gradient-vert rounded-md mt-5 md:mt-8 pl-2 md:pl-12 lg:pl-16 pr-8 md:pr-20 lg:pr-32
            overflow-hidden">
        <div class="flex flex-col relative">
            <span class="uppercase text-base md:text-xl font-semibold py-1">Bienvenue <span class="text-beige">Johanna</span></span>
            <span class="text-sm md:text-base">Vous allez faire quoi aujourd'hui?</span>

            <div class="nonPermanent2">
                <div class="absolute circle-xl bg-beige z-0 -top-16 -left-8"></div>
                <div class="absolute circle-md bg-beige z-0 top-20 -left-4"></div>
                <div class="absolute circle-sm bg-beige z-0 -top-12 -right-8"></div>
            </div>

        </div>
        <div class="img relative pt-20 md:pt-28 h-full -left-20 sm:-left-24 lg:-left-28">
            <div class="absolute w-16 h-20 z-10"><img src="~/assets/img/hibou.png" alt="hibou" class="h-20"></div>
            <div class="absolute w-32 h-32 z-0 top-32 md:top-40 -left-8 cercle bg-beige"></div>

            <div class="nonPermanent">
                <div class="absolute circle-lg bg-beige z-0 top-20 -left-8"></div>
                <div class="absolute circle-sm bg-beige z-0 top-44 -left-16"></div>
                <div class="absolute circle-md bg-beige z-0 top-24 left-20"></div>
                <div class="absolute circle-sm bg-beige z-0 top-36 left-24"></div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
    
</style>