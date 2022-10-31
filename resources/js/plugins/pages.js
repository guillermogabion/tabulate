import Main from '../pages/Main.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Admin/Dashboard.vue'
// employee 
import Employee from '../pages/Admin/Employee/index.vue'
import AddEmployee from '../pages/Admin/Employee/includes/add.vue'
import About from '../pages/Admin/About.vue'
import Library from '../pages/Admin/Employee/Library/index.vue'
import Chat from '../layouts/includes/chat/index.vue'
import Settings from '../pages/settings'

// settings 
import NavSetting from '../pages/settings/navsetting.vue'
import Items from '../pages/settings/includes/item.vue'
import Delivery from '../pages/settings/includes/delivery.vue'


export default [{
    path: '/',
    component: Main,
    meta: { authOnly: true },
    children: [
        {
            path: '/',
            component: Dashboard,
            meta: { authOnly: true },
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { authOnly: true },
        },
        // employee 
        {
            path: '/employee',
            name: 'employee',
            component: Employee,
            meta: { authOnly: true },
        },
        {
            path: '/employee/add',
            name: 'employee-add',
            component: AddEmployee,
            meta: { authOnly: true },
        },

        {
            path: '/about',
            name: 'about',
            component: About,
            meta: { authOnly: true },
        },
        {
            path: '/library',
            name: 'library',
            component: Library,
            meta: { authOnly: true },
        },
        {
            path: '/chat',
            name: 'chat',
            component: Chat,
            meta: { authOnly: true }
        },
        {
            path: '/setting',
            component: Settings,
            meta: { authOnly: true },
            children: [
                {
                    path: '/setting',
                    name: 'items',
                    meta: { authOnly: true },
                    component : Items
                },
                {
                    path: '/setting/item',
                    name: 'items',
                    meta: { authOnly: true },
                    component : Items
                },
                {
                    path: '/setting/delivery',
                    name: 'delivery',
                    component: Delivery,
                    meta: { authOnly: true }
                },

            ]
        },
       


    ]
},
{
    path: '/login',
    name: 'login',
    component: Login,
    meta: { authOnly: false },
}]

