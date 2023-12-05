import "bootstrap/dist/css/bootstrap.css"

//Add font awesome. 
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faXmark, faUser, faCartShopping, faArrowLeft, faInfoCircle, faTrash, faClockRotateLeft } from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faXmark, faUser, faCartShopping, faArrowLeft, faInfoCircle, faTrash, faClockRotateLeft);

//Add Pinia
import { createPinia } from 'pinia';
const pinia = createPinia();

//Create vue app instance.
import { createApp } from 'vue';
import App from './App.vue';

//Import router 
import router from "./routing/router";

//Create vue-final-modal instance.
import { vfmPlugin } from 'vue-final-modal'

createApp(App)
    .use(pinia)
    .use(vfmPlugin({
        key: '$vfm',
        componentName: 'VueFinalModal',
        dynamicContainerName: 'ModalsContainer'
    }))
    .use(router)
    .component('icon', FontAwesomeIcon)
    .mount('#app')
