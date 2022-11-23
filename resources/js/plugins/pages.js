import Main from '../pages/Main.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Admin/Dashboard.vue'
// employee 
import Participant from '../pages/Admin/Participant/index.vue'
import AddParticipant from '../pages/Admin/Participant/includes/addParticipant.vue'
// import AddEmployee from '../pages/Admin/Employee/includes/add.vue'
import Events from '../pages/Admin/Event/index.vue'
import Chat from '../layouts/includes/chat/index.vue'
import Settings from '../pages/settings'

// settings 
import Event from '../pages/settings/includes/event.vue'
import Criteria from '../pages/settings/includes/criteria.vue'
import Category from '../pages/settings/includes/category.vue'
import GetCriteria from '../pages/Scoring/criteria/index.vue'

// Judge 
import Judge from '../pages/Scoring/index.vue'


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
        // participant
        {
            path: '/events',
            name: 'events',
            component: Events,
            meta: { authOnly: true },
         
        },
        {
            path: '/participants',
            name: 'participants',
            component: Participant,
            meta: { authOnly: true },
            children : [
                
            ]
         
        },
        {
            path : '/participants/add',
            name: 'participant-add',
            meta : {
                authOnly: true,
            },
            component : AddParticipant

        },

        {
            path: '/getcriteria/:id',
            name: 'getcriteria',
            component: GetCriteria,
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
            name: 'setting',
            meta: { authOnly: true },
            children: [
                {
                    path: `/setting`,
                    meta: { 
                        authOnly: true,
                        parent : `/setting`
                    },
                    component : Event
                },
                {
                    path: `/setting/event`,
                    name: `event`,
                    meta: { 
                        authOnly: true,
                        parent : `/setting`
                    },
                    component : Event
                },
                {
                    path: `/setting/criteria`,
                    name: `criteria`,
                    component: Criteria,
                    meta: { 
                        authOnly: true,
                        parent : `/setting`
                    },
                },
                {
                    path: `/setting/category`,
                    name: `category`,
                    component: Category,
                    meta: { 
                        authOnly: true,
                        parent : `/setting`
                    },
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
},
{
   path: '/judge',
   name: 'judge',
   component: Judge,
   meta: { authOnly: true },
   props: {
    default: true,
    },
}
]

