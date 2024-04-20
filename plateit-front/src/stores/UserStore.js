import { defineStore } from 'pinia'

export const UserStore = defineStore('UserStore', {
  state: () => ({
    role: '',
    

  }),
  getters: {

  },
  actions: {
    setRole() {
      this.role = localStorage.getItem('role') || null;
    }
    
  }
})