import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex);

import inventoryModule from './modules/inventiryModule';
import categoriesModule from "../../../../Categories/resources/js/store/modules/categoriesModule";
import manufacturersModule from "../../../../Manufacture/resources/js/store/modules/manufacturersModule";
import modelsModule from "../../../../Model/resources/js/store/modules/modelsModule";

let store = new Vuex.Store({
    modules:{
        inventoryModule,
        categoriesModule,
        manufacturersModule,
        modelsModule,
    }
})

export default store
