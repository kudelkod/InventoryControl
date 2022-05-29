<template>
<div class="models">
    <transition name="fade">
        <ModelPopup :model="model" :component="component" v-if="showPopup" @closePopup="closePopup"></ModelPopup>
    </transition>
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" @click="showAddPopup">Добавить модель</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Модель</th>
                                <th>Производитель</th>
                                <th>Дата выпуска</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="model in getModels">
                                <td>{{ model.id }}</td>
                                <td>{{ model.name }}</td>
                                <td>{{ model.manufacture_name }}</td>
                                <td>{{ model.year }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" @click="showEditPopup(model)">Редактировать</a>
                                    <a class="btn btn-danger btn-sm" @click="showDeletePopup(model)">Удалить</a>
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
import {mapActions, mapGetters} from "vuex";
import ModelPopup from "./popup/ModelPopup";

export default {
    name: "Models",
    components: {ModelPopup},
    computed:{
        ...mapGetters({
            "getModels": "modelsModule/getModels",
        })
    },
    data(){
        return{
            model: null,
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
            "fetchModels": "modelsModule/fetchModels",
        }),
        showAddPopup: function (){
            this.showPopup = true;
            this.component = this.component_type.add;
        },
        showEditPopup: function (model){
            this.model = model
            this.showPopup = true;
            this.component = this.component_type.edit;
        },
        showDeletePopup: function (model){
            this.model = model
            this.showPopup = true;
            this.component = this.component_type.delete;
        },
        closePopup: function (){
            this.showPopup = false
        }
    },
    mounted() {
        this.fetchModels();
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to{
    opacity: 0;
}
</style>
