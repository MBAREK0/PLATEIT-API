import axios from "axios";
import { UserStore } from "./UserStore";
import { MainStore } from "./MainStore";

const setAuthHeader = (token) => {
    const store = UserStore();
    const u_store = MainStore();
    axios.defaults.headers={
        "Content-Type": "application/json",
        "Accept": "application/json"
     } 

    if (token) {
        axios.defaults.headers={
            Authorization : `Bearer ${token}`
         }
         u_store.setUserData()
         console.log('user set successfyly <==main.js/=>',u_store.user) 

    }else{
        delete axios.defaults.headers.Authorization ;
    }
};

export default setAuthHeader;