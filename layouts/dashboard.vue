<template>
  <div class="app-background">
    <nav>
      <h2 class="text-lg bg-red-300 font-serif">
        Voici ma navbar. ça apparaît partout.
      </h2>
    </nav>
    <slot />
    <footer>Copyright Test</footer>
  </div>
</template>
<style scoped>
    .app-background{
        background-color: #E6FFFE;
    }
    /* @media (max-width: 768px) {
      .app-background{
        width: 1200px;
    }
    } */
</style>
<script>
</script>