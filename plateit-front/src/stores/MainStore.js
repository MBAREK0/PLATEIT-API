import { defineStore } from 'pinia'

export const MainStore = defineStore('MainStore', {
  state: () => ({
    laravelApi: 'http://127.0.0.1:8000/api/',
    preloading: false,
    showSidebar:false,
    showTrendSidebar:false,
    backdrop:false,
    MenuModel:false,
    PostModel:false,
    searching:false,
    ProfileInfoModel:false,
    SidemoreIsActive:false,

    

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
      this.preloading = value;
    },
    toggleMenuModel(){
      this.backdrop = !this.backdrop;
      this.MenuModel = !this.MenuModel;
    },
    togglePostModel(){
      this.backdrop = !this.backdrop;
      this.PostModel = !this.PostModel;
    }
    
  }
})