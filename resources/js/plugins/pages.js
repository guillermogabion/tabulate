import Main from '../pages/Main.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Admin/Dashboard.vue'
// employee 
import Employee from '../pages/Admin/Employee/index.vue'
import AddEmployee from '../pages/Admin/Employee/includes/add.vue'
import About from '../pages/Admin/About.vue'


export default [ {
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
    }]
},
{
    path: '/login',
    name: 'login',
    component: Login,
    meta: { authOnly: false },
}]