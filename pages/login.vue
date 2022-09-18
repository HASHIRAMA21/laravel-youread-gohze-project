<script>
    definePageMeta({
      layout: "base",
    });
</script>
<template>
    <div class="page-body">
        <div class="login flex justify-between items-center">
            <div class="login-side min-h-screen flex flex-col justify-center items-start">
                <div class="">
                    <img class="" src="@/assets/img/registration-images/im5.png" alt="">
                </div>
            </div>
            <div class="login-comp min-h-screen flex justify-center items-center w-full">
                <LoginCard />
            </div>
            <div class="login-side min-h-screen flex flex-col justify-center items-end">
                <div class="">
                    <img class="" src="@/assets/img/registration-images/im1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    </template>
    
    <style scoped lang="scss">
    .page-body{
        background: #FFFAF1;
        @apply min-h-screen;
    
        .login{
            .login-side{
                width: 50%;
                @media(max-width: 500px){
                    display: none;
                }
            }
            .login-comp{
                height: 100%;
                border-radius: 10px;
                @media(max-width: 500px){
                    display: block;
                }
            }
        }
    }
    </style>
      
    