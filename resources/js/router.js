import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import home from './components/pages/home'
import association from './components/pages/association'

const routes = [
    //Project routes

    {
        path: '/',
        component: home
    },
    {
        path: '/association',
        component: association
    }
]

export default new Router({
    mode: 'history',
    routes
})