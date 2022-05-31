export default {
    namespaced: true,
    state:{
        manufacturers: Array,
    },
    getters:{
        getManufacturers(state){
            return state.manufacturers;
        },
    },
    mutations:{
        setManufacturers(state, data){
            state.manufacturers = data;
        },
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
                    description: manufacture.description,
                    country: manufacture.country,
                    city: manufacture.city,
                    street: manufacture.street,
                    house_number: manufacture.house_number,
                    postcode: manufacture.postcode,
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
        deleteManufacture({commit}, manufacture){
            return new Promise((resolve, reject) => {
                axios.delete('/manufacturers/'+manufacture.id+'/deleteManufacture',{
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
        editManufacture({commit}, manufacture){
            return new Promise((resolve, reject) => {
                axios.post('/manufacturers/'+manufacture.id+'/editManufacture',{
                    name: manufacture.name,
                    description: manufacture.description,
                    country: manufacture.country,
                    city: manufacture.city,
                    street: manufacture.street,
                    house_number: manufacture.house_number,
                    postcode: manufacture.postcode,
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
