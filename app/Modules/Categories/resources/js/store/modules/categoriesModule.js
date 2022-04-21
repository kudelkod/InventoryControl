export default {
    namespaced: true,
    state:{
        categories: Array
    },
    getters:{
        getCategories(state){
            return state.categories;
        }
    },
    mutations:{
        setCategories(state, data){
            state.categories = data;
        }
    },
    actions:{
        fetchCategories({commit}){
            return axios.get('/categories/getCategories', {

            }).
                then((response) =>{
                    commit('setCategories', response.data);
            })
        },
    },
}
