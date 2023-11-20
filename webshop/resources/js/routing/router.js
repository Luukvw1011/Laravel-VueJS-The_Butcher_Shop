import axios from 'axios';

//Create vue-router instance.
import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to, from) => {
    // if (to.path = '/') {
    //     axios.get('/api/user/authenticate')
    //         .then(res => {
    //             console.log(res);
    //         })
    //         .catch(err => {
    //             console.log(err);
    //         })
    // }
})

export default router;