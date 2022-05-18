<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable edit" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="editManufacture">
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
                        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditManufacture",
    props:{
        manufacture: null,
    },
    data(){
        return {
            name: this.manufacture.name,
            address: this.manufacture.address,
            description: this.manufacture.description,
        }
    },

    methods:{
        mapActions:({

        }),
        closeShow: function (){
            this.$emit('closePopup')
        },

        editManufacture: function (){

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
