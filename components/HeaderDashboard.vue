<template>
    <div class="headerDashboard">
        HEADER DU DASHBOARD
        <i
        class="fa-solid fa-bars"
        @click="$emit('toggleSideBar')"
        id="toggleSideBar"
      ></i>
      <i
        class="fa-solid fa-bars bg-green-500 hide" 
        @click="$emit('toggleSideBarPhone')"
        id="toggleSideBarPhone"
      ></i>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
@media screen and (max-width: 900px) {
  #toggleSideBar{
  display: none;
}
  #toggleSideBarPhone{
  display:inline-block;
}
}
</style>