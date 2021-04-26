require('./bootstrap');

import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css'

import Vue from 'vue';
import router from './router';
window.Vue = require('vue').default;

import common from './common';
Vue.mixin(common);

Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('foot', require('./components/footer.vue').default);
Vue.use(ViewUI);

/** Admin */
Vue.component('mainapp', require('./components/admin/mainapp.vue').default);

const app = new Vue({
    el: '#app',
    router
});

const admin = new Vue({
    el: '#admin',
    router
})

const footer = new Vue({
    el: '#footer'
});
