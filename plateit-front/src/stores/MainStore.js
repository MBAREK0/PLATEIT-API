import { defineStore } from 'pinia'

export const MainStore = defineStore('MainStore', {
  state: () => ({
    loading: false,
    showSidebar:false,
    showTrendSidebar:false,
    backdrop:false,
    MenuModel:false
    

  }),
  getters: {

  },
  actions: {
  toggleSidebar() {
      this.showSidebar = !this.showSidebar;
    },
    toggleTrendSidebar(){
      this.showTrendSidebar = !this.showTrendSidebar;
    },
    setLoading(value) {
      this.loading = value;
    },
    toggleMenuModel(){
      this.backdrop = !this.backdrop;
      this.MenuModel = !this.MenuModel;
    },
    
  }
})