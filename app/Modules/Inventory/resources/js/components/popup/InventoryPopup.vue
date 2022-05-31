<template>
    <div class="inventory_popup">
        <AddInventory v-if="component === 1" @closePopup="closePopup"></AddInventory>
        <DeleteInventory :iventory="inventory" v-if="component === 3" @closePopup="closePopup"></DeleteInventory>
    </div>
</template>

<script>
import AddInventory from "./AddInventory";
import DeleteInventory from "./DeleteInventory";

export default {
    name: "InventoryPopup",
    components: {AddInventory, DeleteInventory},
    props:{
        component: null,
        inventory: null
    },
    methods:{
        closePopup: function (){
            this.$emit('closePopup')
        }
    }
}
</script>

<style scoped>
.inventory_popup {
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
