/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'
import VueRouter from 'vue-router';
import Api from './api.js';
import Auth from './auth.js';
import router from './routes.js';
import modules from './store.js';

window.Vue.use(VueRouter);
window.api = new Api();
window.auth = new Auth();

Vue.use(Vuex);
const store = new Vuex.Store(modules);



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('vue-layout', require('./components/Layout.vue').default);


const app = new Vue({ router, store }).$mount('#app')