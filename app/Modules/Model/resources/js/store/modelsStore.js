import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import modelsModule from './modules/modelsModule';
import manufacturersModule from "../../../../Manufacture/resources/js/store/modules/manufacturersModule";

let store = new Vuex.Store({
    modules:{
        modelsModule,
        manufacturersModule,
    }
})

export default store
