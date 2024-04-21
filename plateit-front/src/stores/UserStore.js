import { defineStore } from 'pinia'
import axios from 'axios'
import { MainStore } from './MainStore.js'


export const UserStore = defineStore('UserStore', {
  state: () => ({
    user:[],
    store : MainStore(),
    
    

  }),
  getters: {

  },
  actions: {

   

  }
})