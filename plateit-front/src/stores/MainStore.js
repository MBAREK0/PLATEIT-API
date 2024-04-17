import { defineStore } from 'pinia'

export const MainStore = defineStore('MainStore', {
  state: () => ({
    preloading: false,
    showSidebar:false,
    showTrendSidebar:false,
    backdrop:false,
    MenuModel:false,
    PostModel:false,
    searching:false,
    ProfileInfoModel:false
    

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