import { defineStore } from 'pinia'
import axios from 'axios'
import { MainStore } from './MainStore.js'


export const UserStore = defineStore('UserStore', {
  state: () => ({
    user:[],
    store : MainStore(),
    menu:[],
    profileData:[],

    

  }),
  getters: {
 
  },
  actions: {
    GetRestaurantMenu(id)  {
      
      axios.get( 'http://127.0.0.1:8000/api/menu', {
       params :{
           user_id: id
       }
   })
      .then((response) => {
        if(response.status === 200){
          this.menu = response.data.data;
          this.store.setMiniDataPreloading(false) 
        }
      })
      .catch((error) => {
        this.menu = [];
          // console.error('Error:', error.message);
          this.store.setMiniDataPreloading(false)
      });
    },  
    setMenu(menu){
      this.menu = menu;
    },
    getMenu(){
      return this.menu;
    }
  },
})