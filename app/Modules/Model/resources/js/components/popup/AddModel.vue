<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addNewModel()">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название модели</label>
                            <input class="form-control" v-model="modelName" required>
                            <label>Производитель модели</label>
                            <select class="form-select" v-model="modelManufacture" required>
                                <option selected disabled>Выберите производителя</option>
                                <option v-for="manufacture in getManufacturers" :value="manufacture">
                                    {{ manufacture.name }}
                                </option>
                            </select>
                            <label>Дата выпуска</label>
                            <input class="form-control" type="date" v-model="modelDate" required>
                        </div>
                        <div class="col-md-6">
                            <label>Описание модели</label>
                            <textarea class="form-control" v-model="modelDescription" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <h5>Параметры <span style="font-size: 26px; cursor: pointer" @click="addParameter()">+</span></h5>
                    </div>
                    <div class="row" v-if="modelParameters.length === 0">
                        <h6>Данной модели еще не присвоены параметры</h6>
                    </div>
                    <div class="row" v-if="modelParameters.length !== 0" v-for="(parameter, index) in modelParameters">
                        <div class="col-md-4">
                            <label>Название параметра</label>
                            <input class="form-control" type="text" v-model="parameter.name" required>
                        </div>
                        <div class="col-md-4">
                            <label>Тип параметра</label>
                            <select class="form-select" v-model="parameter.type_id" required>
                                <option v-for="type in getTypes" :value="type.id">
                                    {{ type.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Значение параметра</label>
                            <input
                                class="form-check"
                                v-if="parameter.type_id === parameterIdTypes.bool"
                                type="checkbox"
                                v-model="parameter.value"
                            >
                            <input
                                class="form-control"
                                v-else-if="parameter.type_id === parameterIdTypes.string"
                                type="text"
                                v-model="parameter.value"
                                required
                            >
                            <input
                                class="form-control"
                                v-else-if="parameter.type_id === parameterIdTypes.number"
                                type="number"
                                step="0.01"
                                v-model="parameter.value"
                                required
                            >
                            <h6 v-else>Выберите тип параметра</h6>
                            <span style="font-size: 26px" @click="removeParameter(index)">-</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Добавить модель</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import vSelect from 'vue-select'

export default {
    name: "AddModel",
    components:{vSelect},
    data(){
        return{
            modelName: null,
            modelDate: null,
            modelDescription: null,
            modelManufacture: null,
            modelParameters: [],

            parameterIdTypes:{
                bool: 1,
                number: 2,
                string: 3,
            }
        }
    },
    computed:{
        ...mapGetters({
            'getManufacturers': 'manufacturersModule/getManufacturers',
            'getTypes': 'modelsModule/getTypes',
        }),
    },
    methods:{
        ...mapActions({
            'fetchManufacturers': 'manufacturersModule/fetchManufacturers',
            'fetchTypes': 'modelsModule/fetchParametersTypes',
            'fetchModels': 'modelsModule/fetchModels',
            'addModel': 'modelsModule/addModel',
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },
        addNewModel: function(){
            const model ={
                name: this.modelName,
                manufacturer: this.modelManufacture,
                date: this.modelDate,
                description: this.modelDescription,
                parameters: this.modelParameters,
            }

            this.addModel(model).then((resp)=>{
                this.fetchModels();
                this.closeShow();
            });
        },
        addParameter: function(){
            const parameter = {
                type_id: null,
                name: null,
                value: null,
            };

            this.modelParameters.push(parameter)
        },
        removeParameter: function (index){
            this.modelParameters.splice(index, 1)
        },
        init: function (){
            this.fetchManufacturers();
            this.fetchTypes();
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>
.add{
    max-width: 935px;
}
.modal-footer {
    justify-content: end;
}
</style>
