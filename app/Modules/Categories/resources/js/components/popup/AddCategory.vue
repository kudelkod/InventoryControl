<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить категорию</h5>
                <button type="button" class="btn-close" @click.prevent="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addNewCategory">
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
                            <textarea class="form-control" v-model="description" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Добавить категорию</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "AddCategory",
    computed:{
        ...mapGetters({
            'getCategories':'categoriesModule/getCategories',
        }),
    },
    data(){
        return {
            name: null,
            parent_category_id: null,
            description: null,
        }
    },
    methods:{
        ...mapActions({
            'fetchCategories': "categoriesModule/fetchCategories",
            'addCategory': "categoriesModule/addCategory",
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },
        addNewCategory: function (){

            const category = {
                name: this.name,
                parent_category_id: this.parent_category_id,
                description: this.description
            }

            this.addCategory(category).then((resp) => {
                this.name = '';
                this.parent_category_id = null;
                this.description = null;

                this.closeShow();
                this.fetchCategories()
            })
        },
    },
    mounted() {
        this.fetchCategories();
    }
}
</script>

<style>
.add{
    max-width: 935px;
}
.modal-footer{
    justify-content: end;
}
</style>
