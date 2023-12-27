//Import vue components.
import HomeTabComponent from '../components/tabs/HomeTabComponent.vue';
import CartTabComponent from '../components/tabs/CartTabComponent.vue';
import CategoriesTabComponent from '../components/tabs/CategoriesTabComponent.vue';
import SingleCategoryComponent from '../components/tabs/SingleCategoryScreen.vue';
import AccountTabComponent from '../components/tabs/AccountTabComponent.vue';
import LoginComponent from '../components/authentication/LoginComponent.vue';
import RegisterComponent from '../components/authentication/RegisterComponent.vue';
import DashboardLayout from '../components/dashboard/DashboardLayout.vue';
import SalesTabComponent from '../components/tabs/SalesTabComponent.vue';
import CheckoutComponent from '../components/tabs/CheckoutComponent.vue';

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
                component: SingleCategoryComponent
            },
            {
                path: '/account',
                component: AccountTabComponent,
            },
            {
                path: '/sale',
                component: SalesTabComponent,
            },
            {
                path: '/checkout',
                component: CheckoutComponent,
            }
        ]
    }
];

export default routes;