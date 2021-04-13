require('./bootstrap');

import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css'

import Vue from 'vue';
import router from './router';
window.Vue = require('vue').default;


Vue.component('navbar', require('./components/navbar.vue').default);
Vue.use(ViewUI);

const app = new Vue({
    el: '#app',
    router
});
