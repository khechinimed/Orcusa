require('./bootstrap');

import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css'

import Vue from 'vue';
import router from './router';
window.Vue = require('vue').default;

import common from './common';
Vue.mixin(common);

import moment from 'moment'
Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('[Le] MM/DD/YYYY [à] hh:mm')
    }
})


Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('foot', require('./components/footer.vue').default);
Vue.use(ViewUI);

Vue.component('pagination', require('laravel-vue-pagination'));

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

