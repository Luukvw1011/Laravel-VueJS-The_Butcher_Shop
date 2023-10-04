import "bootstrap/dist/css/bootstrap.css"

//Add font awesome. 
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faXmark, faUser, faCartShopping, faArrowLeft } from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faXmark, faUser, faCartShopping, faArrowLeft);

//Create vue app instance.
import { createApp } from 'vue';
import App from './App.vue';

//Import vue components.
import HomeTabComponent from './components/tabs/HomeTabComponent.vue'
import CartTabComponent from './components/tabs/CartTabComponent.vue'

//Create vue-router instance.
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: HomeTabComponent
        },
        {
            path: '/shopping_cart',
            component: CartTabComponent
        }
    ]
})

createApp(App)
    .use(router)
    .component('icon', FontAwesomeIcon)
    .mount('#app')
