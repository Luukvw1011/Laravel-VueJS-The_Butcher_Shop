import "bootstrap/dist/css/bootstrap.css"

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faXmark, faUser, faCartShopping } from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faXmark, faUser, faCartShopping);

import { createApp } from 'vue';
import App from './App.vue';

createApp(App)
    .component('icon', FontAwesomeIcon)
    .mount('#app')