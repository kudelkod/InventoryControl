import 'es6-promise/auto';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('inventory', require('./components/Inventory.vue').default);


import inventoryStore from './store/inventoryStore';
import Vue from "vue";

const app = new Vue({
    el: '#app',
    store:inventoryStore
});
