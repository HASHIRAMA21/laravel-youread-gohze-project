import { defineStore } from 'pinia'

export const useMainStore = defineStore({
  id: 'main-store',
  state(){
    return {
        currentUser: {
            firstname: 'Johanna',
            lastname: 'Johanna',
            jobs: ['Auteur', 'Critique'],
            email: 'nimajohanna@gmail.com',
            location: 'Damas rue Edzoa',
            receiveNotifications: true,
            receiveComments: true,
            receiveLikes: false,
            isOnline:true
        }
    }
  },
  actions: {},
  getters: {
    userJobsText(state){ return state.currentUser.jobs.join(', ');}
  }
});



//VUEX NE FONCTIONNE PLUS AVEC NUXT 3, CE CODE NE MARCHE PAS.
// import Vue from 'vue'
// import Vuex from 'vuex'

// Vue.use(Vuex)

// export default new Vuex.Store({
//     state: {
//         day: 12,
//         month: 3,
//         year: 2015,
//         currentUser: {
//             firstname: 'Johanna',
//             lastname: 'Johanna',
//             jobs: ['Auteur', 'Critique'],
//             email: 'nimajohanna@gmail.com',
//             location: 'Damas rue Edzoa'
//         }
//     },
//     getters:{
//         fullDate(state){
//             return `${state.day}/${state.month}/${state.year}`;
//         }
//     },
//     mutations: {
//         INCREMENT_MONTH(state, payload = 1){
//             state.month += Number(payload);
//             if(state.month > 12) {state.month -=12; state.year ++;}
//         },
//         DECREMENT_MONTH(state, payload = 1){
//             state.month -= Number(payload);
//             if(state.month < 1) {state.month +=12; state.year --;}
//         }
//     },
//     actions: {
//         updateDate(context, amount){
//             if(amount>=0){
//                 context.commit('INCREMENT_MONTH', amount);
//             }
//             else{
//                 context.commit('DECREMENT_MONTH', -amount);
//             }

//         }
//     }
// })