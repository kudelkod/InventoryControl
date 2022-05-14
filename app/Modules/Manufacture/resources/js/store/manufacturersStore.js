import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import manufacturersModule from './modules/manufacturersModule'

let store = new Vuex.Store({
    modules:{
        manufacturersModule
    }
})

export default store
