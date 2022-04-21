<template>
    <div class="categories">
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggler navbar-light bg-gradient">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCategory">Добавить</a>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Категория</th>
                                    <th>Родительская категория</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="category in categories">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td v-if="category.parent_category_id === 0">
                                        Корень
                                    </td>
                                    <td v-else>{{ category.parent_category.name }}</td>
                                    <td>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <AddCategoryModal></AddCategoryModal>
    </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";
import AddCategoryModal from "./AddCategoryModal";

export default {
    components:{
        AddCategoryModal
    },
    name: "Categories",
    computed:{
        ...mapGetters({
            'getCategories':'categoriesModule/getCategories',
        }),
        categories:{
            get(){
                return this.getCategories;
            }
        }
    },
    methods:{
        ...mapActions({
            'fetchCategories':'categoriesModule/fetchCategories',
        }),
        init(){
            this.fetchCategories();
        },
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>

</style>
