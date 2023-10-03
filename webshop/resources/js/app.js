import "bootstrap/dist/css/bootstrap.css"

//Add font awesome. 
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faXmark, faUser, faCartShopping } from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faXmark, faUser, faCartShopping);

//Create vue app instance.
import { createApp } from 'vue';
import App from './App.vue';

//Import vue components.
import HomeTabComponent from './components/tabs/HomeTabComponent.vue'

//Create vue-router instance.
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: HomeTabComponent
        }
    ]
})

createApp(App)
    .use(router)
    .component('icon', FontAwesomeIcon)
    .mount('#app')
