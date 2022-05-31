<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить предмет</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addNewInventory()">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название</label>
                            <input class="form-control" v-model="inventoryName" required>
                            <label>Категория</label>
                            <select class="form-select" v-model="inventoryCategory" required>
                                <option selected disabled :value="null">Выберите категорию</option>
                                <option v-for="category in getCategories" :value="category">
                                    {{ category.name }}
                                </option>
                            </select>
                            <label>Производитель<span v-if="inventoryManufacture" style="font-size: 20px" @click="removeManufacture()">&times;</span></label>
                            <select class="form-select" v-model="inventoryManufacture" required v-if="inventoryModel === null" @change="manuModels(inventoryManufacture)">
                                <option selected disabled :value="null">Выберите производителя</option>
                                <option v-for="manufacture in getManufacturers" :value="manufacture">
                                    {{ manufacture.name }}
                                </option>
                            </select>
                            <select class="form-select" v-model="inventoryManufacture" required v-else>
                                <option selected disabled :value="null">Выберите производителя</option>
                                <option :value="inventoryModel.manufacture">{{ inventoryModel.manufacture.name }}</option>
                            </select>
                            <label>Модель<span v-if="inventoryModel" style="font-size: 20px" @click="removeModel()">&times;</span></label>
                            <select class="form-select" v-model="inventoryModel" @change="modParam(inventoryModel)" v-if="inventoryManufacture === null">
                                <option selected disabled :value="null" @select="fetchManufacturers">Выберите модель</option>
                                <option v-for="model in getModels" :value="model" >
                                    {{ model.name }}
                                </option>
                            </select>
                            <select class="form-select" v-model="inventoryModel" @change="modParam(inventoryModel)" v-else>
                                <option selected disabled :value="null" @select="fetchManufacturers">Выберите модель</option>
                                <option v-for="model in getManufacturersModels" :value="model" >
                                    {{ model.name }}
                                </option>
                            </select>
                            <label>Количество</label>
                            <input class="form-control" type="number" v-model="inventoryIn_stock" required>
                            <label>Изображения</label>
                            <input type="file" ref="images" accept="image/*" multiple @change="handleImagesUpload()">
                        </div>
                        <div class="col-md-6">
                            <label>Описание</label>
                            <textarea class="form-control" v-model="inventoryDescription" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <h5>Параметры <span style="font-size: 26px; cursor: pointer" @click="addParameter()">+</span></h5>
                    </div>
                    <div class="row" v-if="getModelParameters.length === 0">
                        <h6>Данной модели еще не присвоены параметры</h6>
                    </div>
                    <div class="row" v-if="getModelParameters.length !== 0" v-for="(parameter, index) in getModelParameters">
                        <div class="col-md-4">
                            <label>Название параметра</label>
                            <input class="form-control" type="text" v-model="parameter.name" required>
                        </div>
                        <div class="col-md-3">
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
                                style="margin-top: 6px"
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
                        </div>
                        <div class="col-md-1" style="margin-top: 17px">
                            <span style="font-size: 26px; cursor: pointer" @click="removeParameter(index)">&ndash;</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Добавить предмет</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import vSelect from "vue-select";

export default {
    name: "AddInventory",
    components:{vSelect},
    computed:{
        ...mapGetters({
            'getCategories': 'categoriesModule/getCategories',
            'getManufacturers': 'manufacturersModule/getManufacturers',
            'getModels': 'modelsModule/getModels',
            'getModelParameters': 'modelsModule/getModelParameters',
            'getTypes': 'modelsModule/getTypes',
            'getManufacturersModels': 'modelsModule/getManufacturersModels',
        }),
    },
    data(){
        return{
            inventoryName: null,
            inventoryDescription: null,
            inventoryCategory: null,
            inventoryModel: null,
            inventoryManufacture: null,
            inventoryUser: null,
            inventoryIn_stock: null,
            inventoryParameters: null,
            images: null,

            parameterIdTypes:{
                bool: 1,
                number: 2,
                string: 3,
            }
        }
    },
    methods: {
        ...mapActions({
            'fetchManufacturers': 'manufacturersModule/fetchManufacturers',
            'fetchCategories': 'categoriesModule/fetchCategories',
            'fetchModels': 'modelsModule/fetchModels',
            'fetchModelParameters': 'modelsModule/fetchModelParameters',
            'fetchManufacturersModels': 'modelsModule/fetchManufacturersModels',
        }),
        addNewInventory(){

        },
        manuModels(manufacture){
            this.fetchManufacturersModels(manufacture)
        },
        removeModel(){
            this.inventoryModel = null;
        },
        removeManufacture(){
            this.inventoryManufacture = null;
        },
        modParam(model){
            console.log(model)
            this.fetchModelParameters(model);
        },
        handleImagesUpload(){
            const img = this.$refs.images;
            this.images = img.files;
        },
        closeShow: function (){
            this.$emit('closePopup')
        },
        addParameter: function(){
            const parameter = {
                type_id: null,
                name: null,
                value: null,
            };

            this.getModelParameters.push(parameter)
        },
        removeParameter: function (index){
            this.getModelParameters.splice(index, 1)
        },
        init(){
            this.fetchModels();
            this.fetchManufacturers();
            this.fetchCategories();
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
