//require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from  'axios';
Vue.use(VueAxios,axios);
import App from './App.vue';
import Example from './components/Example.vue';
const routes = [
    {
        name: 'Example',
        path: '/ex',
        component: Example
    },
    {
        name: 'App',
        path: '/app',
        component: App
    }
];
const router = new VueRouter({mode: 'history', routes: routes});
new Vue(Vue.util.extend({router}, App)).$mount('#app');
