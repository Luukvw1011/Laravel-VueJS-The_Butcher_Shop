import "bootstrap/dist/css/bootstrap.css"

//Add font awesome. 
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faXmark, faUser, faCartShopping, faArrowLeft, faInfoCircle, faTrash } from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faXmark, faUser, faCartShopping, faArrowLeft, faInfoCircle, faTrash);

//Create vue app instance.
import { createApp } from 'vue';
import App from './App.vue';

//Import vue components.
import HomeTabComponent from './components/tabs/HomeTabComponent.vue'
import CartTabComponent from './components/tabs/CartTabComponent.vue'
import CategoriesTabComponent from './components/tabs/CategoriesTabComponent.vue'
import SingleCategoryScreen from './components/tabs/SingleCategoryScreen.vue'

//Create vue-router instance.
import { createRouter, createWebHistory } from 'vue-router'

//Create vue-final-modal instance.
import { vfmPlugin } from 'vue-final-modal'

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
        },
        {
            path: '/categories',
            component: CategoriesTabComponent
        },
        {
            path: '/category/:meat',
            name: 'category',
            component: SingleCategoryScreen,
            
        }
    ]
})

createApp(App)
    .use(vfmPlugin({
        key: '$vfm',
        componentName: 'VueFinalModal',
        dynamicContainerName: 'ModalsContainer'
    }))
    .use(router)
    .component('icon', FontAwesomeIcon)
    .mount('#app')
