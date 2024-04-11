import { defineStore } from 'pinia'

export const MainStore = defineStore('MainStore', {
  state: () => ({
    loading: false,
    showSidebar:false,
    showTrendSidebar:false,
    

  }),
  getters: {

  },
  actions: {
  toggleSidebar() {
      this.showSidebar = !this.showSidebar;
    },
    toggleTrendSidebar(){
      this.showTrendSidebar = !this.showTrendSidebar;
    }
    
  }
})