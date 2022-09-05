<template>
  <div>
    <div class="md:flex container justify-center m-auto py-10">
      <div class="first-block">
        <div class="first-container">
          <p class="uppercase text-indigo font-bold text-xl leading-7">
            creer votre projet sur youread
          </p>
          <p class="m-text-normal leading-4 text-gray  mt-1.5">
            <span class="block"
              >creez votre projet et collaborez avec d'autres </span
            >utilisateurs pour produire une oeuvre innovante
          </p>
        </div>
        <div class="content-img mt-12 disappear-lg">
          <img
            src="../../assets/img/ajoutprojet/Business thinking.png"
            class=""
          />
        </div>
        <div class="disappear-lg">
          <div class="mt-24 ml-28">
            <figure class="bg-indigo circle-md"></figure>
          </div>
          <div class="mt-14 ml-64">
            <figure class="bg-orange circle-xl"></figure>
          </div>
          <div class="mt-24 ml-24">
            <figure class="bg-indigo-light circle-xl"></figure>
          </div>
        </div>
      </div>
      <div class="rounded-lg shadow-card grid sm:mx-16 md:mx-0 lg:mx-16">
        <!-- <ValidationObserver ref="form" v-slot="{ passes }"> -->
        <Form v-slot="{ errors }" class="form">
          <div class="grid">
            <p class="uppercase text-indigo font-bold mt-5">
              informations du projet
            </p>
            <p class="m-text-extrasmall mt-1">
              remplissez les informations pour la creation de votre compte
            </p>
          </div>
          <!-- <ValidationProvider v-slot="{ errors }" name="titre" rules="required"> -->
          <div>
            <label class="block uppercase text-xs mt-6">titre du projet</label>
            <Field
              :rules="isRequired"
              :class="{ error_input: errors.titre }"
              v-model="titre"
              id="titre"
              name="titre"
              class="
                input-xl
                mt-0.5
                appearance-none
                block
                w-full
                border border-gray-200
                rounded-lg
                pl-4
                focus:outline-none focus:bg-white
              "
              type="text"
              placeholder="EXEMPLE PROJET"
            />
            <span class="error"> {{ errors.titre }} </span>
          </div>
          <!-- </ValidationProvider> -->
          <div class="mt-2.5 text-xs sm:flex">
            <!-- <ValidationProvider v-slot="{ errors }" name="nbCollaborateur" rules="required"> -->
            <div class="w-full">
              <label class="block uppercase" for="nombre">
                collaborateur
              </label>
              <Field
                :rules="isRequired"
                :class="{ error_input: errors.nbCollaborateur }"
                name="nbCollaborateur"
                class="
                  input-lg
                  text-xs
                  mt-0.5
                  appearance-none
                  block
                  w-full
                  border-gray-200
                  text-gray-700
                  border
                  rounded-lg
                  pl-4
                  focus:outline-none focus:bg-white
                "
                type="number"
                placeholder="EX: 2"
              />
              <span class="error">{{ errors.nbCollaborateur }} </span>
            </div>
            <!-- </ValidationProvider>
                            <ValidationProvider v-slot="{ errors }" name="profil" rules="required"> -->
            <div class="mt-10-sm w-full sm:ml-7">
              <label class="block uppercase" for="profil">
                profils recherches
              </label>

              <div>
                <Multiselect
                  v-model="value"
                  mode="tags"
                  :options="options"
                  :search="true"
                  placeholder="SELECT PROFIL"
                  label="name"
                  track-by="name"
                  class="test
                    input-lg input
                    text-xs
                    mt-0.5
                    focus:outline-none focus:bg-white
                    appearance-none
                    block
                    w-full
                    border
                    text-gray-700
                   border-gray-200
                    rounded-lg
                  "
                >
                    <!-- <template v-slot:multipleLabel="{ values }">
                      <div class="multiselect-multiple-label">
                        {{ values.length }} characters selected
                      </div>
                    </template> -->
                  <!-- <template v-slot:multipleLabel="{ values }">
                    <div class="multiselect-multiple-label text-xs">
                      {{ values.length }} profils selected
                    </div>
                  </template> -->
                </Multiselect>
              </div>
              <span class="error"> </span>
            </div>
            <!-- </ValidationProvider> -->
          </div>
          <div class="mt-2.5 sm:flex">
            <!-- <ValidationProvider v-slot="{ errors }" name="theme" rules="required"> -->
            <div class="w-full">
              <label class="block uppercase text-xs" for="nombre">
                theme
              </label>
              <Field
                :rules="isRequired"
                :class="{ error_input: errors.theme }"
                name="theme"
                v-model="theme"
                class="
                  block
                  input-lg
                  mt-0.5
                  appearance-none
                  w-full
                  border-gray-200
                  text-gray-700
                  border
                  rounded-lg
                  pl-4
                  focus:outline-none focus:bg-white
                "
                type="text"
                placeholder="EXAMPLE"
              />
              <span class="error">{{ errors.theme }} </span>
            </div>
            <!-- </ValidationProvider>
                            <ValidationProvider v-slot="{ errors }" name="langue" rules="required"> -->
            <div class="mt-10-sm w-full sm:ml-7">
              <label class="block uppercase text-xs" for="profil">
                langue
              </label>
              
              <Multiselect
                v-model="langue"
                name="langue"
                placeholder="select language"
                class="
                  input
                  block
                  mt-0.5
                  text-xs
                  uppercase
                  input-lg
                  text-gray-700
                  border border-gray-200
                  pl-4
                  rounded-lg
                  focus:bg-white focus:outline-none
                "
                :options="langues"
                :rules="isRequired"
                :class="{ error_input: errors.langue }"
              />
              <span class="error">{{ errors.langue }}</span>
            </div>
            <!-- </ValidationProvider> -->
          </div>
          <!-- <ValidationProvider v-slot="{ errors }" name="description" rules="required"> -->
          <div class="mt-2.5">
            <label class="block uppercase text-xs" for="profil">
              Description
            </label>
            <Field
              :rules="isRequired"
              :class="{ error_input: errors.description }"
              name="description"
              v-model="description"
              class="
                mt-0.5
                appearance-none
                block
                input-xl
                long-input
                border border-gray-200
                rounded-lg
                pl-4
                focus:outline-none focus:bg-white
                w-full
                h-52
              "
              type="text"
              lg:placeholder="DESCRIPTION DU PROJET"
            />
            <span class="error">{{ errors.description }}</span>
          </div>
          <!-- </ValidationProvider> -->
          <button
            class="
              bg-indigo
              float-right
              w-24
              h-9
              mt-8
              font-bold
              text-white
              rounded-lg
              focus:outline-none
            "
            type="submit"
          >
            CREATE
          </button>
        </Form>
        <!-- </ValidationObserver> -->
      </div>
      <div class="disappear-xl">
        <div class="">
          <figure class="circle-md bg-indigo"></figure>
        </div>
        <div class="mt-28 ml-20">
          <figure class="circle-lg bg-orange"></figure>
        </div>
        <div class="mt-36 ml-8">
          <figure class="circle-md bg-indigo-light"></figure>
        </div>
        <div class="ml-24 mt-40">
          <figure class="circle-sm bg-indigo-light"></figure>
        </div>
        <div class="mt-52 ml-20">
          <figure class="circle-xxl bg-indigo"></figure>
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped>

/* .test{
  max-height: 100px!important;
  overflow-y: visible!important;
  overflow-x: auto!important;
} */
.multiselect-tags {
    max-height: 30px;
    overflow: auto;
}
.input{
  height: 45px;
}
input {
  padding: 10px;
  height: 45px;
}
input,
  select,
  .input {
    background-color: #f9fafb;
    height: 39px !important;
    border-radius: 0.5rem !important;
  }

@media screen and (max-width: 640px) {
  .shadow-card {
    /* width: 312px; */
    margin: auto;
    margin-top: 20px;
  }
  .container {
    padding: 20px;
  }
  .input-lg {
    /* width: 270px; */
  }
  .long-input {
    padding-bottom: 180px;
  }
  input,
  select,
  .input {
    background-color: #f9fafb;
    /* height: 39px;
  width: 270px; */
  }
  .mt-10-sm {
    margin-top: 10px;
  }
  .shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    /* min-height: 720px; */
  }
  .first-container {
    text-align: center;
  }
  form{
    padding-left: 10%;
    padding-right: 10%;
  }
}

@media screen and (min-width: 1024px) {
  .content-img {
  width: 434px;
  height: 234px;
}
  .input-xl{
    width: 429px;
    margin: auto;
  }
  .input-lg{
     width: 200px;
  }
  /* .input{
  width: 200px;
} */
  .long-input {
    padding-bottom: 250px;
  }
  form{
    padding-left: 30px;
    padding-right: 30px;
  }
}
@media screen and (min-width: 641px) and (max-width: 1023px) {
  .first-block{
    width: 300px;
  }
  .content-img {
  width: 300px;
  height: 200px;
}
.shadow-card{
  margin-top: 100px;
}
  .first-container {
    width: 502px;
    /* padding-left: 50px; */
  }
  .long-input {
    padding-bottom: 250px;
  }
  form{
    padding-left: 40px;
    padding-right: 40px;
  }
  
}
@media screen and (min-width: 641px) and (max-width: 767px) {
  .first-container {
    text-align: center;
  }
  .container{
    padding-left: 40px;
    padding-right: 40px;
    /* background-color: red; */
  }
  .shadow-card{
    margin-top: 20px;
  }
  
}
@media screen and (max-width: 767px) {
  .disappear-lg {
    display: none;
  }
}
@media screen and (max-width: 1280px){
  .disappear-xl{
    display: none;
  }
}
.container-select {
  position: relative;
  max-width: 320px;
  width: 100%;
  margin: 80px auto 30px;
}

input::placeholder,
select::placeholder {
  font-size: 12px;
}

.container {
  margin: auto;
  margin-bottom: 100px;
  
  /* justify-content: center; */
}

button {
  margin-right: 3px;
  margin-bottom: 20px;
}

button:hover {
  border: 2px solid #007d74;
  background-color: white;
  color: #007d74;
}

/* form {
  margin-left: 7%;
  margin-right: 7%;
} */

/* 
.shadow-card {
  box-shadow: 0px 2px 10px 0px #00000040;
  min-height: 695px;
} */
@media screen and (min-width: 641px) {
  /* .input-xl {
  width: 429px;
}
.input-lg {
  width: 200px;
} */
  .shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    /* width: 502px; */
    /* min-height: 695px; */
  }
  .long-input {
    height: 276px !important;
  }
  
  .shadow-card {
    box-shadow: 0px 2px 10px 0px #00000040;
    /* min-height: 695px; */
  }
}

input:focus-within,
textarea:focus-within,
select:focus-within,
.input:focus-within {
  border: 2px solid #007d74;
}

/* .form {
  margin: auto;
} */

.text-gray {
  color: #7e7e7e;
}



.content-img > img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
<style src="@/assets/css/creerprojet.css"></style>
<script>
// import { ValidationObserver, ValidationProvider } from "vee-validate";
// import Multiselect from 'vue-multiselect'
import Multiselect from "@vueform/multiselect";
import { Form, Field } from "vee-validate";
export default {
  name: "ajoutProjet",
  components: {
    Form,
    Field,
    Multiselect,
  },
  setup() {
    const langue = ref("francais");
    const titre = ref("");
    const theme = ref("");
    const description = ref("");
    const value = ref(null);
    const options = ref(["Batman", "Robin", "Joker"]);
    const langues = ref(["francais", "anglais"]);
    return {langue , titre , theme , description , value , options , langues}
  },
  methods: {
    // Validator function
    isRequired(value) {
      return value ? true : "This field is required";
    },
  },
};
</script>