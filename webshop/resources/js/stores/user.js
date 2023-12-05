import { defineStore } from "pinia";
import axios from 'axios';

export const useUserStore = defineStore('user', () => {
    async function getUserData() {
        return axios.get('/api/user/authenticate')
            .then(res => { 
                return res.data;
            })
            .catch((error) => {
                if(error.response?.status === 401) {
                    return false;
                }
            });
    }

    return { getUserData }
});