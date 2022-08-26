<template>
    
     <div class=" flex coul  px-10  py-14 gap-10 " >

        
        <div class="my-auto mr-52 position " > 
           
           <p >  <img src="./../assets/img/registration-images/im5.PNG" alt="photos">
             </p>
             
           
        </div>
        <hr> 

         <div class=" bg-white md:shadow-2xl rounded  px-14 py-8 sha">
            <!-- <p class="text-center"> <span class=" text-2xl ">  <b> YOU</b> </span> <span class="co  text-2xl"> READ</span></p>  -->
            <div class=" flex justify-around item-center mb-5 ">    <p >  <img src="./../assets/img/registration-images/im6.PNG" alt="photos"> </p> </div>
            <p class="mb-8  text-center"> Salut saisir tes informations pour pouvoir  <br> accéder à ton compte </p>

            <Form @submit="submit" :validation-schema="schema" v-slot="{ errors }">

                <div class="mb-5"> 
                 <Field  type="email" name="email" placeholder="Email" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded w-full focus:outline-none focus:ring focus:border-blue-500 " />
                 <span  class="text-red-600">{{ errors.email }}</span>
                </div>

               

                <div class="mb-10"> 
                     <Field  type ="password" name="password" placeholder="password" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded w-full focus:outline-none focus:ring focus:border-blue-500 "    /> <br> 
                         <span  class="text-red-600">{{ errors.password }}</span> <br> 
                         <span> Forget your password? <nuxt-link to="/"> click here </nuxt-link> </span>

                </div>

               

                 <button type="submit" class="text-white py-2 px-3 rounded w-full mb-5" style="background-color: #007D74;">SING IN  </button>
            </Form>

            <p class="text-center mb-5 "> or sign in with </p>

            <div class="flex justify-between space"> 

                <div class="border rounded  flex px-2 py-2"> <p>  <i class="fa-brands fa-2x fa-google"> </i> </p>
                 <p class="px-2 my-auto"> Google</p>  
                 </div>

                <div class="border rounded  flex px-2 py-2">
                    <p> <i class="fa-brands fa-2x  fa-facebook-f"></i></p>
                    <p class="px-2 my-auto"> facebook </p>
                </div>

                <div class="border rounded  flex px-2 py-2">
                    <p> <i class="fa-brands fa-2x fa-twitter"></i></p>
                    <p class="px-2 my-auto"> twitter  </p>
                </div>

            </div>

            <p class="text-center mb-5 py-3"> D'ont have an account ? <nuxt-link to="/"> <b>Request  Now </b> </nuxt-link> </p>


        </div>

        
        <div class="my-auto position"> 
           
           <p>  <img src="./../assets/img/registration-images/im1.PNG" alt="photos">  </p>
           
            
        </div>
        
        

    
    
    </div>




</template>

<script>
import { Form, Field } from 'vee-validate';

definePageMeta({
  layout:false
});

export default {
  components: {
    Form,
    Field,
  },
  data() {
    const schema = {
      email: 'required|email',
      
      password: 'required|minLength:5'
      
    };
    return {
      schema,
    };
  },
};
</script>

<style scoped> 
    
    .coul{
       background-color:#FFFAF1; 
    }

    @media screen and (max-width: 430px){
        .position{
            display:none;
            margin-right: 0px;
        }

        .sha{
            box-shadow: none;
            padding: 10px 1px;
        }
        .coul{
           background-color:white;
           padding: 0px; 
        }
        .space{
            gap:5px;
        }
       
    }
</style>
