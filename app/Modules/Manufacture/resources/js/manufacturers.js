import 'es6-promise/auto';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('manufacturers', require('./components/Manufacturers.vue').default);


import manufacturersStore from './store/manufacturersStore';
import Vue from "vue";

const app = new Vue({
    el: '#app',
    store:manufacturersStore
});
