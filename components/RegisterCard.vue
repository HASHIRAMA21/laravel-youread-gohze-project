<script setup>
    import { ref } from 'vue'
    import { Form, Field, ErrorMessage } from 'vee-validate'
    
    
    const passwordIsVisible = ref(false)
    const passwordMatched = ref(true)
    const emailError = ref(false)
    const passwordError = ref(false)
    const confirmPasswordIsVisible = ref(false)
    
    function togglePassword(){
        passwordIsVisible.value = !passwordIsVisible.value
    }
    function toggleConfirmPassword(){
        confirmPasswordIsVisible.value = !confirmPasswordIsVisible.value
    }
    function onSubmit(values){
        const { password, confirmPassword } = values
        passwordMatched.value = password === confirmPassword 
        console.log(values)
    }
    function validateEmail(value) {
        // if the field is empty
        if (!value) {
            emailError.value = true
            return 'This field is required';
        }
        // if the field is not a valid email
        const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (!regex.test(value)) {
            emailError.value = true
            return 'This field must be a valid email';
        }
        // All is good
        return true
    }
    function validatePhoneNumber(value) {
        // if the field is empty
        if (!value) {
            emailError.value = true
            return 'This field is required';
        }
        // if the field is not a valid email
        const regex = /^[0-9]$/i;
        if (!regex.test(value)) {
            emailError.value = true
            return 'This field must be a valid phone number';
        }
        // All is good
        return true
    }
    function validatePassword(value) {
        // if the field is empty
        if (!value) {
            passwordError.value = true
            return 'This field is required';
        }
        return true
    }
    </script>
    
    <template>
        <div class="login-content shadow shadow-lg w-full flex flex-col justify-center items-center">
            <img src="../assets/img/registration-images/im6.png" alt="">
            <p class="mt-4 message w-3/5">Salut,entre tes informations pour pouvoir accéder a la page</p>
            <Form class="form mt-8 mb-4 w-4/5" @submit="onSubmit">
                <div class="input-item my-4">
                    <Field name="email" class="focus:outline-none focus:ring focus:border-blue-500 " :class="{'border-red-500': emailError}" type="email" placeholder="Enter your email" :rules="validateEmail"/>
                    <ErrorMessage name="email" class="input-error"/>
                </div>
                <div class="input-item-group my-4 grid grid-cols-2 gap-2">
                    <div class="input-item my-4">
                        <Field name="userName" class="focus:outline-none focus:ring focus:border-blue-500 " :class="{'border-red-500': emailError}" type="text" placeholder="User Name" :rules="validatePassword"/>
                        <ErrorMessage name="userName" class="input-error"/>
                    </div>
                    <div class="input-item my-4">
                        <div class="relative">
                            <Field name="telephone" class="focus:outline-none focus:ring focus:border-blue-500 phone-input" :class="{'border-red-500': emailError}" type="number" placeholder="Telephone" :rules="validatePhoneNumber"/>
                            <span class="left-0 top-0 bottom-0"><i class="fas fa-phone"></i></span>
                        </div>
                        <ErrorMessage name="telephone" class="input-error"/>
                    </div>
                </div>
                <div class="input-item mt-4">
                    <div class="relative">
                        <Field name="password" class="focus:outline-none focus:ring focus:border-blue-500 " :class="{'border-red-500': passwordError}" :type="passwordIsVisible? 'text': 'password'" placeholder="Password" :rules="validatePassword"/>
                        <span @click="togglePassword" class="right-0 top-0 bottom-0"><i class="fas fa-eye"></i></span>
                    </div>
                    <ErrorMessage name="password" class="input-error"/>
                </div>
                <div class="input-item mt-4">
                    <div class="relative">
                        <Field name="confirmPassword" class="focus:outline-none focus:ring focus:border-blue-500 " :class="{'border-red-500': passwordError}" :type="confirmPasswordIsVisible? 'text': 'password'" placeholder="Password" :rules="validatePassword"/>
                        <span @click="toggleConfirmPassword" class="right-0 top-0 bottom-0"><i class="fas fa-eye"></i></span>
                    </div>
                    <ErrorMessage name="confirmPassword" class="input-error"/>
                </div>
                <div class="submitbtn w-full my-8">
                    <button type="submit" class="w-full">SIGN IN</button>
                </div>
            </Form>
            <div class="login-method w-4/5">
                <div class="form-separator flex justify-center items-center w-full">
                    <span></span>
                    <p class="mx-3">Or Sign in With</p>
                    <span></span>
                </div>
                <div class="methods flex justify-between items-center w-full my-8">
                    <button><i class="fab fa-google"></i> <span>Google</span></button>
                    <button><i class="fab fa-facebook-f"></i> <span>Facebook</span></button>
                    <button><i class="fab fa-twitter"></i> <span>Twitter</span></button>
                </div>
                <p class="login-register">Do you have an account? <span><nuxt-link to="/login">Login Now</nuxt-link></span></p>
            </div>
        </div>
    </template>
    
    <style scoped lang="scss">
        .login-content{
            background: #FFF;
            padding: 1.5rem 0;
            border-radius: 10px;
            box-shadow: 0px 2px 50px 10px rgba(0, 0, 0, 0.11);
            .message{
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 24px;
                text-align: center;
                color: #000000;
            }
            .form{
                .input-item{
                    position: relative;
                    input{
                        box-sizing: border-box;
                        height: 52px;
                        background: #FFFFFF;
                        border: 1px solid #000000;
                        border-radius: 10px;
                        @apply w-full px-2;
                    }
                    .phone-input{
                        @apply pl-8;
                    }
                    span{
                        position: absolute;
                        width: 40px;
                        background: tranqparent;
                        @apply flex justify-center items-center;
                    }
                    .input-error{
                        color: red;
                        width: 100%;
                        position: relative;
                    }
                    .relative{
                        position: relative;
                        width: 100%;
                        text-align: left;
                        .phone-input{
                            padding-left: 1.5rem;
                        }
                    }
                }
                .password-forgot{
                    font-style: normal;
                    font-weight: 400;
                    font-size: 12px;
                    line-height: 18px;
                }
                .submitbtn{
                    button{
                        height: 52px;
                        color: #FFF;
                        background: #007D74;
                        border-radius: 10px;
                    }
                }
            }
            .login-method{
                .form-separator{
                    span{
                        width: 25px;
                        height: 2px;
                        background: #000;
                    }
                    p{
                        font-style: normal;
                        font-weight: 400;
                        font-size: 12px;
                        line-height: 18px;
                        text-align: center;
                        color: #000000;
                    }
                }
                .methods{
                    button{
                        box-sizing: border-box;
                        width: 127.5px;
                        height: 51px;
                        background: #FFFFFF;
                        border: 0.5px solid #BCBCBC;
                        border-radius: 8px;
                        font-style: normal;
                        font-weight: 400;
                        font-size: 14px;
                        line-height: 17px;
                        color: #000000;
                    }
                }
                .login-register{
                    text-align: center;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 12px;
                    line-height: 15px;
                    color: #000000;
                    span{
                        font-weight: 800;
                    }
                }
            }
            @media(max-width: 500px){
                @apply min-h-screen;
            }
        }
    </style>