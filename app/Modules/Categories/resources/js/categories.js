import 'es6-promise/auto';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('categories', require('./components/Categories.vue').default);


import categoriesStore from './store/categoriesStore';
import Vue from "vue";

const app = new Vue({
    el: '#app',
    store:categoriesStore
});
