import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import { createPinia } from 'pinia'
import SatAuthHeader from '@/stores/SatAuthHeader';
import ToastPlugin from 'vue-toast-notification';
import { MainStore } from './stores/MainStore'
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-bootstrap.css';

const pinia = createPinia()
const app = createApp(App)


app.use(pinia)
app.use(ToastPlugin);
const MainStoreInstance = MainStore()

if(localStorage.getItem('access_token')){
    console.log('access token found <==main.js/=>',localStorage.getItem('access_token'))
    SatAuthHeader(localStorage.getItem('access_token'))

    
}


app.use(router)

app.mount('#app')
