
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import App from './components/App.vue';
import Boxes from './components/Boxes.vue';

Vue.use(VueRouter);
const routes = [
    { path: '/', component: Boxes }
]
const router = new VueRouter({
    routes
})
const app = new Vue({
        el: '#app',
        router,
        data: {
            currentRoute: window.location.pathname
        },
        computed: {
            ViewComponent () {
                return routes[this.currentRoute] || PageNotFound
            }
        },
        render: h => h(App)
})


// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
