<template>
    
     <div class="col flex content-center px-8 py-14 gap-10 coul" >

        <div class="my-auto mr-52 position" > 
           
           <p >  <img src="./../assets/img/registration-images/im5.PNG" alt="photos">
             </p>
             
           
        </div>
        <hr> 

         <div class="bg-white shadow-2xl rounded px-14 py-8 sha w-full">
            <!-- <p class="text-center"> <span class=" text-2xl ">  <b> YOU</b> </span> <span class="co  text-2xl"> READ</span></p>  -->
            <div class=" flex justify-around item-center mb-5 ">    <p >  <img src="./../assets/img/registration-images/im6.PNG" alt="photos"> </p> </div>
            <p class="mb-4 text-center"> Salut saisir tes informations pour pouvoir <br> t'inscrire </p>

            <Form @submit="submit" :validation-schema="schema" v-slot="{ errors }">

                <div class="mb-5"> 
                 <Field  type="email" name="email" placeholder="Email" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded w-full focus:outline-none focus:ring focus:border-blue-500 " />
                 <span  class="text-red-600">{{ errors.email }}</span>
                </div>

                <div class="flex  gap-10 justify-between champ  mb-3"> 
                    <div> 
                     <Field type="Text" name="username" placeholder="Username" class=" border shadow-inner py-2 px-3 text-gray-700
                     rounded focus:outline-none focus:ring focus:border-blue-500 w-full "/> <br>
                     <span  class="text-red-600">{{ errors.username }}</span>
                    </div>

                    <div> 
                      <Field  type ="number" name="phone" placeholder="Telephone" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded focus:outline-none focus:ring focus:border-blue-500 w-full"    /> <br> 
                         <span  class="text-red-600">{{ errors.phone }}</span>
                    </div>

                </div>

                <div class="mb-5"> 
                     <Field  type ="password" name="password" placeholder="password" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded w-full focus:outline-none focus:ring focus:border-blue-500 "    /> <br> 
                         <span  class="text-red-600">{{ errors.password }}</span>

                </div>

                <div class="mb-5"> 
                     <Field  type ="password" name="confirm" placeholder=" Retype password" class=" border shadow-inner py-2 px-3 text-gray-700
                    rounded w-full focus:outline-none focus:ring focus:border-blue-500 "    /> <br> 
                         <span  class="text-red-600">{{ errors.confirm }}</span>

                </div>

                 <button type="submit" class="text-white py-2 px-3 rounded w-full mb-5" style="background-color: #007D74;">SING UP  </button>
            </Form>

            <p class="text-center mb-5 "> or sign in with </p>

            <div class="flex gap-10 space"> 

                <div class="border rounded  flex px-2 py-2"> <p>  <i class="fa-brands fa-2x fa-google"> </i> </p>
                 <p class="px-2"> Google</p>  
                 </div>

                <div class="border rounded  flex px-2 py-2">
                    <p> <i class="fa-brands fa-2x  fa-facebook-f"></i></p>
                    <p class="px-2"> facebook </p>
                </div>

                <div class="border rounded  flex px-2 py-2">
                    <p> <i class="fa-brands fa-2x fa-twitter"></i></p>
                    <p class="px-2"> twitter  </p>
                </div>

            </div>

            <p class="text-center mb-5 py-3"> Do you have an account ? <nuxt-link to="/"> <b>SIGN Now </b> </nuxt-link> </p>


        </div>

        
        <div class="my-auto position"> 
           
           <p>  <img src="./../assets/img/registration-images/im1.PNG" alt="photos">  </p>
           
            
        </div>
        
        

    
    
    </div>




</template>

<script>
import { Form, Field } from 'vee-validate';

export default {
  components: {
    Form,
    Field,
  },
  data() {
    const schema = {
      email: 'required|email',
      username: 'required',
      phone: 'required|minLength:9',
      password: 'required|minLength:5',
      confirm: 'required|minLength:5|confirmed:password'
    };
    return {
      schema,
    };
  },
};
</script>

<style scoped>

@media screen and (max-width: 430px){
        .position{
            display:none;
            margin-right: 0px;
        }

        .sha{
            box-shadow: none;
            padding: 0px;
        }
        .coul{
           background-color:white;
           padding: 10px ; 
           display: flex;
           justify-content: center;
           gap:0px;
        }
        .space{
            gap:5px;
        }
        .champ{
            gap:0px;
        }
        .champ div{
            max-width: 49%;
        }
       
    }
</style>
