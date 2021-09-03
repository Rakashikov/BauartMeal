/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import store from './store/index.js';


require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cart-component', require('./components/CartComponent.vue').default);
Vue.component('product-card-component', require('./components/ProductCardComponent.vue').default);
Vue.component('restaurant-card-component', require('./components/RestaurantCardComponent.vue').default);
Vue.component('position-component', require('./components/PositionComponent.vue').default);
Vue.component('history-component', require('./components/HistoryComponent.vue').default);
Vue.component('rest-component', require('./components/RestaurantComponent.vue').default);
Vue.component('menu-component', require('./components/MenuComponent.vue').default);
Vue.component('history-component', require('./components/HistoryComponent.vue').default);
Vue.component('historymenu-component', require('./components/HistorymenuComponent.vue').default);
Vue.component('suborder-component', require('./components/SuborderComponent.vue').default);
Vue.component('order-component', require('./components/OrderComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    store
});
