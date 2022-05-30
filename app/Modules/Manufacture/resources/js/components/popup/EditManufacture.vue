<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable edit" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="editManufacturers">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название производителя</label>
                            <input class="form-control" v-model="name" required>
                            <label>Страна производителя</label>
                            <input class="form-control" v-model="country" required>
                            <label>Город производителя</label>
                            <input class="form-control" v-model="city" required>
                            <label>Улица производителя</label>
                            <input class="form-control" v-model="street" required>
                            <label>Номер здания производителя</label>
                            <input class="form-control" v-model="house_number" required>
                            <label>Почтовый индекс производителя</label>
                            <input class="form-control" v-model="postcode" required>
                        </div>
                        <div class="col-md-6">
                            <label>Описание производителя</label>
                            <textarea class="form-control" v-model="description" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "EditManufacture",
    props:{
        manufacture: null,
    },
    data(){
        return {
            id: this.manufacture.id,
            name: this.manufacture.name,
            description: this.manufacture.description,
            country: this.manufacture.country,
            city: this.manufacture.city,
            street: this.manufacture.street,
            house_number: this.manufacture.house_number,
            postcode: this.manufacture.postcode,
        }
    },

    methods:{
        ...mapActions({
            "editManufacture": "manufacturersModule/editManufacture",
            "fetchManufacturers": "manufacturersModule/fetchManufacturers",
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },

        editManufacturers: function (){
            const manufacture = {
                id: this.id,
                name: this.name,
                description: this.description,
                country: this.country,
                city: this.city,
                street: this.street,
                house_number: this.house_number,
                postcode: this.postcode,
            };

            this.editManufacture(manufacture).then((resp)=>{
                console.log(resp);

                this.closeShow();
                this.fetchManufacturers();
            })
        }
    },
}
</script>

<style scoped>
.edit{
    max-width: 935px;
}
.modal-footer {
    justify-content: end;
}
</style>
