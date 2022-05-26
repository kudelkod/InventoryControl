import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import modelsModule from './modules/modelsModule'

let store = new Vuex.Store({
    modules:{
        modelsModule
    }
})

export default store
