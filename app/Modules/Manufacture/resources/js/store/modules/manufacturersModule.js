export default {
    namespaced: true,
    state:{
        manufacturers: Array
    },
    getters:{
        getManufacturers(state){
            return state.manufacturers;
        }
    },
    mutations:{
        setManufacturers(state, data){
            state.manufacturers = data;
        }
    },
    actions:{
        fetchManufacturers({commit}){
            return axios.get('/manufacturers/getManufacturers', {

            })
                .then((response) =>{
                    commit('setManufacturers', response.data);
                })
        },
        addManufacture({commit}, manufacture){
            return new Promise((resolve, reject) => {
                axios.post('/manufacturers/addManufacturers',{
                    name: manufacture.name,
                    address: manufacture.address,
                    description: manufacture.description,
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
        // deleteCategory({commit}, category){
        //     return new Promise((resolve, reject) => {
        //         axios.delete('/categories/'+category.id+'/deleteCategory',{
        //         })
        //             .then((response) =>
        //                 resolve({
        //                     result: true
        //                 }))
        //             .catch(error =>
        //                 reject({
        //                     result: false
        //                 }))
        //     })
        // },
        // editCategory({commit}, category){
        //     return new Promise((resolve, reject) => {
        //         axios.post('/categories/'+category.id+'/editCategory',{
        //             name: category.name,
        //             parent_category_id: category.parent_category_id,
        //             slug: category.slug,
        //             description: category.description,
        //         })
        //             .then((response) =>
        //                 resolve({
        //                     result: true
        //                 }))
        //             .catch(error =>
        //                 reject({
        //                     result: false
        //                 }))
        //     })
        // }
    },
}
