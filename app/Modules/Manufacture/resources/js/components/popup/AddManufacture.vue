<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addNewManufacture">
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
                        <button type="submit" class="btn btn-primary btn-sm">Добавить производителя</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "AddManufacture",
    data(){
        return {
            name: null,
            description: null,
            country: null,
            city: null,
            street: null,
            house_number: null,
            postcode: null,
        }
    },
    methods: {
        ...mapActions({
            'fetchManufacturers': 'manufacturersModule/fetchManufacturers',
            'addManufacture':'manufacturersModule/addManufacture',
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },

        addNewManufacture: function(){

            const manufacture = {
                name: this.name,
                description: this.description,
                country: this.country,
                city: this.city,
                street: this.street,
                house_number: this.house_number,
                postcode: this.postcode,
            }

            this.addManufacture(manufacture).then((resp) => {
                this.name = null;
                this.description = null;
                this.country = null;
                this.city = null;
                this.street = null;
                this.house_number = null;
                this.postcode = null;

                this.closeShow();
                this.fetchManufacturers();
            })

        }
    }
}
</script>

<style>
.add{
    max-width: 935px;
}
.modal-footer {
    justify-content: end;
}
</style>
