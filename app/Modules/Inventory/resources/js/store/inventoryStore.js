import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import inventoryModule from './modules/inventiryModule'

let store = new Vuex.Store({
    modules:{
        inventoryModule
    }
})

export default store
