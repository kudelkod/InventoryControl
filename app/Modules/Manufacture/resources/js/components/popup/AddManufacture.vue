<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit="addNewManufacture">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название производителя</label>
                            <input class="form-control" v-model="name" required>
                            <label>Адресс производителя</label>
                            <input class="form-control" v-model="address" required>
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
            address: null,
            description: null,
        }
    },
    methods: {
        // ...mapActions({
        //     '':''
        // }),
        closeShow: function (){
            this.$emit('closePopup')
        },
        addNewManufacture: function(){

            const manufacture = {
                name: this.name,
                address: this.address,
                description: this.description
            }

            console.log(manufacture);
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
