
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)
const example = require('./components/ExampleComponent.vue');
const sample = require('./components/SampleComponent.vue');
const task = require('./components/TaskComponent.vue');
const routes =[
{ path: '/', component: task },
{ path: '/example', component: example },
{ path: '/sample', component: sample }
]
// const router = new VueRouter({
//   routes: [
//     // dynamic segments start with a colon
//     { path: '/example', component: example }
//   ]
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
const router = new VueRouter({
	routes
})

const app = new Vue({
    el: '#app',
    router,
});
