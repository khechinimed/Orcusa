import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import home from './components/pages/home'
import association from './components/pages/association'
import evenements from './components/pages/events'
import donation from './components/pages/donation'
import stream from './components/pages/stream'
import forum from './components/pages/forum'
import post from './components/pages/post'
import contact from './components/pages/contact'


/** Admin Pages */
import dashboard from './components/admin/pages/dashboard'
import users from './components/admin/pages/users'
import demandes from './components/admin/pages/demandes'
import events from './components/admin/pages/events'

const routes = [
    //Project routes

    {
        path: '/',
        component: home
    },
    {
        path: '/association',
        component: association
    },
    {
        path: '/evenements',
        component: evenements
    },
    {
        path: '/donation',
        component: donation
    },
    {
        path: '/stream',
        component: stream
    },
    {
        path: '/forum',
        component:  forum
    },
    {
        path: '/post/:slug',
        name: 'post',
        component: post
    },
    {
        path: '/contact',
        component:  contact
    },

    //Admin routes
    {
        path: '/users',
        component: users
    },
    {
        path: '/dashboard',
        component: dashboard
    },
    {
        path: '/demandes',
        component: demandes
    },
    {
        path: '/events',
        component: events
    }
]

export default new Router({
    mode: 'history',
    routes
})