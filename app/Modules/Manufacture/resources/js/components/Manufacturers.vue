<template>
<div class="manufacturers">
    <transition name="fade">
        <ManufacturePopup :manufacture="manufacture" :component="component" v-if="showPopup" @closePopup="closePopup"></ManufacturePopup>
    </transition>
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" @click="showAddPopup">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Производитель</th>
                                <th>Адрес</th>
                                <th class="d-grid gap-2 d-md-flex justify-content-md-end me-3 pe-5">Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="manufacture in getManufacturers">
                                <td>{{ manufacture.id }}</td>
                                <td>{{ manufacture.name }}</td>
                                <td>{{ manufacture.address }}</td>
                                <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-primary" @click="showEditPopup(manufacture)">Редактировать</a>
                                    <a class="btn btn-danger">Удалить</a>
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
import ManufacturePopup from "./popup/ManufacturePopup";

export default {
    name: "Manufacturers",
    components: {ManufacturePopup},
    data(){
        return {
            manufacture: null,
            showPopup: false,
            component: null,
            component_type: {
                add: 1,
                edit: 2,
                delete: 3
            }
        }
    },
    computed:{
        ...mapGetters({
            'getManufacturers':"manufacturersModule/getManufacturers"
        })
    },
    methods:{
        ...mapActions({
            'fetchManufacturers': "manufacturersModule/fetchManufacturers"
        }),
        showAddPopup(){
            this.component = this.component_type.add;
            this.showPopup = true;
        },
        showEditPopup(manufacture){
            this.component = this.component_type.edit;
            this.manufacture = manufacture;
            this.showPopup = true;
        },
        closePopup(){
            this.showPopup = false;
        }
    },
    mounted() {
        this.fetchManufacturers();
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
