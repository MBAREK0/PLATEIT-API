import { defineStore } from 'pinia'
import axios from 'axios'
import { MainStore } from './MainStore.js'


export const UserStore = defineStore('UserStore', {
  state: () => ({
    user:[],
    store : MainStore(),
    menu:[]
    

  }),
  getters: {
    
  },
  actions: {
    GetRestaurantMenu(id)  {
      axios.get( 'http://127.0.0.1:8000/api/restaurant/menu', {
       params :{
           user_id: id
       }
   })
      .then((response) => {
        if(response.status === 200){
          this.menu = response.data.data;
          console.log('response.data.data========>',this.menu)
        }
      })
      .catch((error) => {
          console.error('Error:', error.message);
      });
    },
    getMenu(){
      console.log('this.menu========>',this.menu)
      return this.menu;
    }

  }
})