import { defineStore } from 'pinia'
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import axios from 'axios'
import { store } from 'pinia'

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
    EditInfo:false,
    PostModel:false,
    searching:false,
    SidemoreIsActivebackdrop:false,
    ProfileInfoModel:false,
    SidemoreIsActive:false,
    SidebarHiddenbackdrop:false,
    user:[],
    store : MainStore(),
      

    

  }),
  getters: {

  },
  actions: {
  toggleSidebar() {
      this.showSidebar = !this.showSidebar;
      this.SidebarHiddenbackdrop = !this.SidebarHiddenbackdrop;
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
      const userData = JSON.parse(localStorage.getItem('user_id'));
      axios.get(this.store.laravelApi + 'auth/user', {
        params :{
            user_id: userData
        }
       })
       .then((response) => {
         if(response && response.status === 200){
          this.user = response.data.user;
    
         }
       })
       .catch((error) => {
       if(error.response && error.response.status === 404){
        
           console.error('Error:', 'User not found');
       }
           console.error('Error:', error.message);
       });
    },
    toggleSidemoreIsActive(){
      this.SidemoreIsActivebackdrop = !this.SidemoreIsActivebackdrop;
      this.SidemoreIsActive = !this.SidemoreIsActive;
    },
    toggleAllModels(){
      this.backdrop = false;
      this.MenuModel = false;
      this.PostModel = false;
      this.ProfileInfoModel = false;
    },
    toggleAllSmallModels(){
      this.SidemoreIsActivebackdrop = false;
      this.Hiddenbackdrop = false;
      this.SidemoreIsActive = false;
      this.EditInfo = false;
   
    }, 
    closeSidebar(){
      this.showSidebar = false;
      this.SidebarHiddenbackdrop = false;
    }
    ,
    showSuccesToast (errorMessage) {
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
    toggleEditInfo(){
      this.EditInfo = !this.EditInfo;
      this.Hiddenbackdrop = !this.Hiddenbackdrop;
    },
    toggleEditProfileModel () {
      this.backdrop = !this.backdrop;
      this.ProfileInfoModel = !this.ProfileInfoModel;
    }
    
  }
})