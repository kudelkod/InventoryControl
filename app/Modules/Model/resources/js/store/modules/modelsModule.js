export default {
    namespaced: true,
    state:{
        models: Array,
        types: Array,
        modelParameters: Array,
    },
    getters:{
        getModels(state){
            return state.models;
        },
        getTypes(state){
            return state.types;
        },
        getModelParameters(state){
            return state.modelParameters
        }
    },
    mutations:{
        setModels(state, data){
            state.models = data;
        },
        setParametersTypes(state, types){
            state.types = types;
        },
        setModelParameters(state, parameters){
            state.modelParameters = parameters;
        }
    },
    actions:{
        fetchModels({commit}){
            return axios.get('/models/getModels', {

            })
                .then((response) =>{
                    commit('setModels', response.data);
                })
        },
        fetchParametersTypes({commit}){
            return axios.get('/models/getTypes', {

            })
                .then((response)=>{
                    commit('setParametersTypes', response.data);
                })
        },
        fetchModelParameters({commit}, model){
            return axios.get('/models/'+model.id+'/getModelParameters',{

            })
                .then((response)=>{
                    commit('setModelParameters', response.data);
                })
        },
        addModel({commit}, model){
            return new Promise((resolve, reject) => {
                axios.post('/models/addModel',{
                    name: model.name,
                    manufacture_id: model.manufacturer.id,
                    year: model.date,
                    description: model.description,
                    parameters: model.parameters,
                })
                    .then((response) =>
                        resolve({
                            result: true
                        }))
                    .catch(error =>
                        reject({
                            result: false
                        }))
            })
        },
        deleteModel({commit}, model){
            return new Promise((resolve, reject) => {
                axios.delete('/models/'+model.id+'/deleteModel',{
                })
                    .then((response) =>
                        resolve({
                            result: true
                        }))
                    .catch(error =>
                        reject({
                            result: false
                        }))
            })
        },
        editModel({commit}, model){
            return new Promise((resolve, reject) => {
                axios.post('/models/'+model.id+'/editModel',{
                    name: model.name,
                    manufacture_id: model.manufacturer.id,
                    year: model.date,
                    description: model.description,
                    parameters: model.parameters,
                })
                    .then((response) =>
                        resolve({
                            result: true
                        }))
                    .catch(error =>
                        reject({
                            result: false
                        }))
            })
        }
    },
}
