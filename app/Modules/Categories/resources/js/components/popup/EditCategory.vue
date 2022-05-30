<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add edit" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать категорию</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="editThisCategory">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название категории</label>
                            <input class="form-control" v-model="name" required>
                            <label>Родительская категория</label>
                            <select class="form-select" v-model="parent_category_id" required>
                                <option class="form-control" v-for="category in getCategories" :value="category.id">{{ category.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Описание категории</label>
                            <textarea class="form-control" v-model="description" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Редактировать категорию</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import {mapActions, mapGetters} from "vuex";

export default {
    props:{
        category: null,
    },
    name: "EditCategory",
    computed:{
        ...mapGetters({
            'getCategories':'categoriesModule/getCategories',
        }),
    },
    data(){
        return {
            id: this.category.id,
            name: this.category.name,
            parent_category_id: this.category.parent_category_id,
            description: this.category.description,
        }
    },
    methods:{
        ...mapActions({
            'fetchCategories': "categoriesModule/fetchCategories",
            'editCategory': "categoriesModule/editCategory",
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },
        editThisCategory: function (){

            const category = {
                id: this.id,
                name: this.name,
                parent_category_id: this.parent_category_id,
                description: this.description
            }

            this.editCategory(category).then((resp) => {
                console.log(resp);

                this.closeShow();
                this.fetchCategories()
            })
        },
    },
}
</script>

<style>
.edit{
    max-width: 935px;
}
.modal-footer{
    justify-content: end;
}
</style>
