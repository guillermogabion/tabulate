require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './plugins/vuetify'
import router from './plugins/router';
import App from './layouts/App.vue';
import Vue from 'vue';


const app = new Vue({
    router,
    vuetify,
    el: '#app',
    render: h => h(App),
});