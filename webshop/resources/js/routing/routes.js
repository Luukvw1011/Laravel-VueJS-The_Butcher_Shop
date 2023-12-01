//Import vue components.
import HomeTabComponent from '../components/tabs/HomeTabComponent.vue'
import CartTabComponent from '../components/tabs/CartTabComponent.vue'
import CategoriesTabComponent from '../components/tabs/CategoriesTabComponent.vue'
import SingleCategoryScreen from '../components/tabs/SingleCategoryScreen.vue'
import AccountTabComponent from '../components/tabs/AccountTabComponent.vue'
import LoginComponent from '../components/authentication/LoginComponent.vue'
import RegisterComponent from '../components/authentication/RegisterComponent.vue'
import DashboardLayout from '../components/dashboard/DashboardLayout.vue'

const routes = [
    {
        path: '/login',
        name: 'login',
        component: LoginComponent
    },
    {
        path: '/register',
        component: RegisterComponent
    },
    {
        path: '/',
        component: DashboardLayout,
        children: [
            {
                path: '',
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
                component: SingleCategoryScreen
            },
            {
                path: '/account',
                component: AccountTabComponent,
            }
        ]
    }
];

export default routes;