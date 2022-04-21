<template>
        <div class="modal fade" id="modalAddCategory" tabindex="-1" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить категорию</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Название категории</label>
                                <input class="form-control" v-model="name">

                                <label>Родительская категория</label>
                                <select class="form-select" v-model="parent_category_id">
                                    <option :value="1">213123123123123</option>
                                    <option :value="2">213123123123123</option>
                                    <option :value="3">213123123123123</option>
                                </select>
                                <label>Название категории</label>
                                <input class="form-control" v-model="slug">
                            </div>
                            <div class="col-md-6">
                                <label>Описание категории</label>
                                <textarea class="form-control" v-model="description" rows="7"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Добавить параметр</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>
export default {
    name: "AddCategoryModal",
    data(){
        return {
            name: null,
            parent_category_id: null,
            description: null,
            slug: null,
        }
    },
    methods:{

    },
}
</script>

<style scoped>
.modal-dialog{
    max-width: 935px;
}
</style>
