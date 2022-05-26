import 'es6-promise/auto';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('models', require('./components/Models.vue').default);


import modelsStore from './store/modelsStore';
import Vue from "vue";

const app = new Vue({
    el: '#app',
    store: modelsStore
});
