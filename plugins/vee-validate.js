import { defineRule } from 'vee-validate';

export default defineNuxtPlugin(nuxtApp => {
    // Doing something with nuxtApp
    
defineRule('required', value => {
    if (!value || !value.length) {
      return 'Ce champ est requis';
    }
    return true;
  });
  
  defineRule('email', value => {
    // Field is empty, should pass
    if (!value || !value.length) {
      return true;
    }
    // Check if email
    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/.test(value)) {
      return 'veuillez entrer une adresse email valide ';
    }
    return true;
  });

  defineRule('minLength', (value, [limit]) => {
    // The field is empty so it should pass
    if (!value || !value.length) {
      return true;
    }
    if (value.length < limit) {
      return `Ce champ doit avoir au moins  ${limit} caractères `;
    }
    return true;
  });


defineRule('confirmed', (value, [target], ctx) => {
  if (value === ctx.form[target]) {
    return true;
  }
  return 'vos mots de passes ne correspondent pas ';
});

  })
