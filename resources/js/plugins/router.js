import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '../pages/Main.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Admin/Dashboard.vue'
import About from '../pages/Admin/About.vue'
import { Self } from "../repositories/user.api";
import store from '../store'


Vue.use(VueRouter)

const router = new VueRouter({
    mode : 'history',
    // linkExactActiveClass: 'active-route',
    routes : [
        {
            path: '/',
            name: 'main',
            component : Main,
            meta: { authOnly: true },
            children: [{
                path: '/dashboard',
                name: 'dashboard',
                component: Dashboard,
                meta: { authOnly: true },
            },
            {
                path: '/about',
                name: 'about',
                component: About,
                meta: { authOnly: true },
            }]
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: { authOnly: false },
        }
    ]
});

function guardRoutes(to, next) {
    const guest_routes = [
        'login'
    ]
    if ((guest_routes.includes(to.name)) && localStorage.getItem('token') === '') {
        next()
    } else if (localStorage.getItem('token') === '') {
        next({ name: 'login' })
    } else if (guest_routes.includes(to.name)) {
        next({ name: 'main' })
    } else {
        next()
    }
}

router.beforeEach((to, from, next) => {
    if (localStorage.getItem('token')) {
        Self().then(({ data }) => {
            store.commit('login', data)
            localStorage.setItem('token', data.access_token)
            guardRoutes(to, next)
        }).catch(err => {
            localStorage.removeItem('token')
            console.log(err)
        })
    } else {
        guardRoutes(to, next)
    }
})

export default router;