<template>
    <div class="categories">
        <transition name="fade">
            <CategoryPopup :category="category" :component="component" v-if="showPopup" @closePopup="closePopup"></CategoryPopup>
        </transition>
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggler navbar-light bg-gradient">
                        <a class="btn btn-primary" @click="showAddPopup">Добавить категорию</a>
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
                                <tr v-for="category in getCategories">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td v-if="category.parent_category_id === 0">
                                        Корень
                                    </td>
                                    <td v-else>{{ category.parent_category.name }}</td>
                                    <td v-if="category.id === 1">
                                        <a class="btn btn-sm" hidden></a>
                                    </td>
                                    <td v-else>
                                        <a class="btn btn-primary btn-sm" @click="showEditCategory(category)">Редактировать</a>
                                        <a class="btn btn-danger btn-sm" @click="showDeletePopup(category)">Удалить</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";
import CategoryPopup from "./popup/CategoryPopup";

export default {
    components:{
        CategoryPopup,
    },
    name: "Categories",
    computed:{
        ...mapGetters({
            'getCategories':'categoriesModule/getCategories',
        }),
    },
    data(){
        return{
            category: null,
            showPopup: false,
            component: null,
            component_type: {
                add: 1,
                edit: 2,
                delete: 3
            }
        }
    },
    methods:{
        ...mapActions({
            'fetchCategories':'categoriesModule/fetchCategories',
        }),
        showAddPopup: function (){
            this.showPopup = true;
            this.component = this.component_type.add;
        },
        showEditCategory: function (category){
            this.category = category
            this.showPopup = true;
            this.component = this.component_type.edit;
        },
        showDeletePopup: function (category){
            this.category = category
            this.showPopup = true;
            this.component = this.component_type.delete;
        },
        closePopup: function (){
            this.showPopup = false
        }
    },
    mounted() {
        this.fetchCategories();
    }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to{
    opacity: 0;
}
</style>
