<template>
    <div class="category_popup">
        <AddCategory v-if="component === 1" @closePopup="closePopup"></AddCategory>
        <EditCategory :category="category" v-if="component === 2" @closePopup="closePopup"></EditCategory>
        <DeleteCategory :category="category" v-if="component === 3" @closePopup="closePopup"></DeleteCategory>
    </div>
</template>

<script>
import AddCategory from "./AddCategory";
import EditCategory from "./EditCategory";
import DeleteCategory from "./DeleteCategory";
export default {
    props:{
        component: null,
        category: null
    },
    name: "CategoryPopup",
    components:{
        AddCategory,
        EditCategory,
        DeleteCategory,
    },
    methods:{
        closePopup: function (){
            this.$emit('closePopup')
        }
    }
}
</script>

<style>
.category_popup {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1055;
    display: block;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
    background:rgba(0,0,0,.7);
}
</style>
