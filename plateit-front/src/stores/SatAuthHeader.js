import axios from "axios";
import { UserStore } from "./UserStore";

const setAuthHeader = (token) => {
    const store = UserStore();
    axios.defaults.headers={
        "Content-Type": "application/json",
        "Accept": "application/json"
     } 
    if (token) {
        axios.defaults.headers={
            Authorization : `Bearer ${token}`
         } 
         store.setRole();

    }else{
        delete axios.defaults.headers.Authorization ;
    }
};

export default setAuthHeader;