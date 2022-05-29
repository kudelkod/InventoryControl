export default {
    namespaced: true,
    state:{
        models: Array,
        types: Array,
    },
    getters:{
        getModels(state){
            return state.models;
        },
        getTypes(state){
            return state.types;
        }
    },
    mutations:{
        setModels(state, data){
            state.models = data;
        },
        setParametersTypes(state, types){
            state.types = types;
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
    //     editManufacture({commit}, manufacture){
    //         return new Promise((resolve, reject) => {
    //             axios.post('/manufacturers/'+manufacture.id+'/editManufacture',{
    //                 name: manufacture.name,
    //                 address: manufacture.address,
    //                 description: manufacture.description,
    //             })
    //                 .then((response) =>
    //                     resolve({
    //                         result: true
    //                     }))
    //                 .catch(error =>
    //                     reject({
    //                         result: false
    //                     }))
    //         })
    //     }
    },
}
