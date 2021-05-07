import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Hello from './views/Hello'
import Home from './views/Home'
import About from './views/About'
import Contact from './views/Contact'
import Shop from './views/Shop'
import Product from './views/Product'
import Card from './views/Card'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact,
        },
        {
            path: '/card',
            name: 'card',
            component: Card,
        },
        {
            path: '/catalog/:type',
            name: 'catalog',
            props: true,
            component: Shop,
        },
        {
            path: '/product/:id',
            name: 'product',
            props: true,
            component: Product,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
