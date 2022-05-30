<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable delete" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удалить производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить производителя {{manufacture.name}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" @click="closeShow">Нет</button>
                <button type="button" class="btn btn-danger btn-sm" @click="deleteThisManufacture(manufacture)">Да</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    props:{
        manufacture: null,
    },
    name: "DeleteManufacture",
    methods:{
        ...mapActions({
            'fetchManufacturers': "manufacturersModule/fetchManufacturers",
            'deleteManufacture': "manufacturersModule/deleteManufacture",
        }),
        deleteThisManufacture: function (manufacture) {
            this.deleteManufacture(manufacture).then((resp) => {
                console.log(resp)

                this.closeShow();
                this.fetchManufacturers()
            })
        },
        closeShow: function (){
            this.$emit('closePopup');
        }
    }
}
</script>

<style>
.delete{
    max-width: 400px;
}
.modal-footer{
    justify-content: space-between;
}
</style>
