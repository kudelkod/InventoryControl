export default {
    namespaced: true,
    state:{
        models: Array
    },
    getters:{
        getModels(state){
            return state.models;
        }
    },
    mutations:{
        setModels(state, data){
            state.models = data;
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
    //     addManufacture({commit}, manufacture){
    //         return new Promise((resolve, reject) => {
    //             axios.post('/manufacturers/addManufacturers',{
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
    //     },
    //     deleteManufacture({commit}, manufacture){
    //         return new Promise((resolve, reject) => {
    //             axios.delete('/manufacturers/'+manufacture.id+'/deleteManufacture',{
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
    //     },
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
