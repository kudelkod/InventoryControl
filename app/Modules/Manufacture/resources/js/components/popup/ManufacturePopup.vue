<template>
    <div class="manufacture_popup">
        <AddManufacture v-if="component === 1" @closePopup="closePopup"></AddManufacture>
        <EditManufacture :manufacture="manufacture" v-if="component === 2" @closePopup="closePopup"></EditManufacture>
        <DeleteManufacture :manufacture="manufacture" v-if="component === 3" @closePopup="closePopup"></DeleteManufacture>
    </div>
</template>

<script>
import AddManufacture from "./AddManufacture";
import EditManufacture from "./EditManufacture";
import DeleteManufacture from "./DeleteManufacture";

export default {
    props:{
        component: null,
        manufacture: null
    },
    name: "ManufacturePopup",
    components: {EditManufacture, AddManufacture, DeleteManufacture},
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
