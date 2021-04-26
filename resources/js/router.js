import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import home from './components/pages/home'
import association from './components/pages/association'
import events from './components/pages/events'
import donation from './components/pages/donation'
import stream from './components/pages/stream'
import forum from './components/pages/forum'
import contact from './components/pages/contact'


/** Admin Pages */



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
        component: events
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
        path: '/contact',
        component:  contact
    }
]

export default new Router({
    mode: 'history',
    routes
})