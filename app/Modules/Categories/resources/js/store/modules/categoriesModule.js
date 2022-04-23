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

            })
                .then((response) =>{
                    commit('setCategories', response.data);
            })
        },
        addCategory({commit}, category){
            return new Promise((resolve, reject) => {
                axios.post('/categories/addCategory',{
                    name: category.name,
                    parent_category_id: category.parent_category_id,
                    slug: category.slug,
                    description: category.description,
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
        deleteCategory({commit}, category){
            return new Promise((resolve, reject) => {
                axios.delete('/categories/'+category.id+'/deleteCategory',{
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
        editCategory({commit}, category){
            return new Promise((resolve, reject) => {
                axios.post('/categories/'+category.id+'/editCategory',{
                    name: category.name,
                    parent_category_id: category.parent_category_id,
                    slug: category.slug,
                    description: category.description,
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
