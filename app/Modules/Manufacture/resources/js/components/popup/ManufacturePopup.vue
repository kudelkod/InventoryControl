<template>
    <div class="manufacture_popup">
        <AddManufacture v-if="component === 1" @closePopup="closePopup"></AddManufacture>
<!--        <EditCategory :category="category" v-if="component === 2" @closePopup="closePopup"></EditCategory>-->
<!--        <DeleteCategory :category="category" v-if="component === 3" @closePopup="closePopup"></DeleteCategory>-->
    </div>
</template>

<script>
import AddManufacture from "./AddManufacture";
export default {
    props:{
        component: null,
        manufacture: null
    },
    name: "ManufacturePopup",
    components: {AddManufacture},
    methods:{
        closePopup: function (){
            this.$emit('closePopup')
        }
    }
}
</script>

<style>
.manufacture_popup {
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
