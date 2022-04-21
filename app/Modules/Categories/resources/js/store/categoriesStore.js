import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import categoriesModule from './modules/categoriesModule'

let store = new Vuex.Store({
    modules:{
        categoriesModule
    }
})

export default store
