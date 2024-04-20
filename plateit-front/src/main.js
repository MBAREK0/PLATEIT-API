import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import { createPinia } from 'pinia'
import SatAuthHeader from '@/stores/SatAuthHeader';
import ToastPlugin from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-bootstrap.css';

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(ToastPlugin);


if(localStorage.getItem('access_token')){
    console.log('main.js <==/>','access token found')
    SatAuthHeader(localStorage.getItem('access_token'))
   
}


app.use(router)

app.mount('#app')
