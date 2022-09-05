<template>
<div class="min-h-screen flex flex-col justify-between">
  <header>
    <Navigation />
  </header> 
  <slot />
  <footer class="flex justify-start items-center bg-custom-green">
    <div class="w-full text-center">
      Copyright &copy;2022 Youread Design By GOHZE
    </div>
  </footer>
</div>
</template>

<style scoped lang="scss">
header{
  height: 89px;
  @media(max-width: 500px){
      height: 70px;
  }
}
footer{
  height: 61px;
  background: #007D74;
  color: #FFF;
  @media(max-width: 500px){
    height: 50px;
  }
  div{
    font-size: 16px;
    font-weight: 600;
    line-height: 24px;
    letter-spacing: 0em;
    @media(max-width: 500px){
      font-size: 13px;
      font-weight: 400;
      line-height: 24px;
    }
  }
}
</style>

