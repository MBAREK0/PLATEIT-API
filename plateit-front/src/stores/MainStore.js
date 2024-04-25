import { defineStore } from 'pinia'
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
const $toast = useToast();
export const MainStore = defineStore('MainStore', {
  state: () => ({
    laravelApi: 'http://127.0.0.1:8000/api/',
    preloading: false,
    dataPreloading: true,
    miniDataPreloading: true,
    showSidebar:false,
    showTrendSidebar:false,
    backdrop:false,
    Hiddenbackdrop:false,
    MenuModel:false,
    PostModel:false,
    searching:false,
    ProfileInfoModel:false,
    SidemoreIsActive:false,
    user:[],
      

    

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
    },
    setUserData(){
      this.user = JSON.parse(localStorage.getItem('user'));
    },
    toggleSidemoreIsActive(){
      this.Hiddenbackdrop = !this.Hiddenbackdrop;
      this.SidemoreIsActive = !this.SidemoreIsActive;
    },
    toggleAllModels(){
      this.backdrop = false;
      this.MenuModel = false;
      this.PostModel = false;
      this.ProfileInfoModel = false;
    },
    toggleAllSmallModels(){
      this.Hiddenbackdrop = false;
      this.SidemoreIsActive = false;
    }, showSuccesToast (errorMessage) {
      $toast.success(errorMessage, {
        position: 'bottom-right',
        duration: 3000,
      });
    },
    showErrorToast  (errorMessage)  {
      $toast.error(errorMessage, {
        position: 'bottom-right',
        duration: 3000,
      });
    },
     displayValidationErrors (errors)  {
      for (const field in errors) {
        if (errors.hasOwnProperty(field)) {
          const errorMessage = errors[field][0];
          console.error(`${field}: ${errorMessage}`);
          this.showErrorToast(errorMessage); 
        }
      }
    } ,
    setDataPreloading(value) {
      this.dataPreloading = value;
    },
    setMiniDataPreloading(value) {
      this.miniDataPreloading = value;
    },
    
  }
})