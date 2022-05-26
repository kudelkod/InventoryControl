<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить производителя</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название модели</label>
                            <input class="form-control" required>
                            <label>Производитель модели</label>
                            <select class="form-select" required>

                            </select>
                            <label>Дата выпуска</label>
                            <input class="form-control" type="date" required>
                        </div>
                        <div class="col-md-6">
                            <label>Описание модели</label>
                            <textarea class="form-control" rows="7"></textarea>
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
export default {
    name: "AddModel",
    methods:{
        closeShow: function (){
            this.$emit('closePopup')
        },
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
