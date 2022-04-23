<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable delete" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удалить категорию</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                Вы действительно хотите удаить категорию {{category.name}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" @click="closeShow">Нет</button>
                <button type="button" class="btn btn-danger btn-sm" @click="deleteThisCategory(category)">Да</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    props:{
        category: null,
    },
    name: "DeleteCategory",
    methods:{
        ...mapActions({
            'fetchCategories': "categoriesModule/fetchCategories",
            'deleteCategory': "categoriesModule/deleteCategory",
        }),
        deleteThisCategory: function (category) {
            this.deleteCategory(category).then((resp) => {

                this.closeShow();
                this.fetchCategories()
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
