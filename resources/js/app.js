require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './plugins/vuetify'
import router from './plugins/router';
import App from './layouts/App.vue';
import general from './mixins/general.vue'
import store from './store';
import Vue from 'vue';

Vue.mixin(general)
const app = new Vue({
    router,
    vuetify,
    store,
    el: '#app',
    render: h => h(App),
});