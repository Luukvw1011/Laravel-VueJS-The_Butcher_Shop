import { defineStore } from "pinia";
import { ref } from "vue";

export const useUserStore = defineStore('user', () => {
    //test data
    const username = ref('testUser');

    return username;
});