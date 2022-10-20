import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '../pages/Main.vue'
// import Dashboard from '../pages/Admin/Dashboard.vue'


Vue.use(VueRouter)

const router = new VueRouter({
    mode : 'history',
    linkExactActiveClass: 'active-route',
    routes : [
        {
            path: '',
            name: 'main',
            component : Main,
            // children: [{
            //     path: '/dashboard',
            //     name: 'dashboard',
            //     component: Dashboard
            // }]
        }
    ]
});

export default router;