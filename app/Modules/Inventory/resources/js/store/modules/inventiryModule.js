export default {
    namespaced: true,
    state:{
        inventory: [],
    },
    getters:{
        getInventory(state){
            return state.inventory;
        },
    },
    mutations:{
        setInventory(state, data){
            state.inventory = data;
        }
    },
    actions:{
        fetchInventory({commit}){
            return axios.get('/inventory/getInventory',{

            })
                .then((response) => {
                    commit('setInventory', response.data);
                })
        }
    },
}
