<template>
    <div class="model_popup">
        <AddModel v-if="component === 1" @closePopup="closePopup"></AddModel>
<!--        <EditManufacture :manufacture="manufacture" v-if="component === 2" @closePopup="closePopup"></EditManufacture>-->
        <DeleteModel :model="model" v-if="component === 3" @closePopup="closePopup"></DeleteModel>
    </div>
</template>

<script>
import AddModel from "./AddModel";
import DeleteModel from "./DeleteModel";

export default {
    name: "ModelPopup",
    components:{AddModel, DeleteModel},
    props:{
        component: null,
        model: null
    },
    methods:{
        closePopup: function (){
            this.$emit('closePopup')
        }
    }
}
</script>

<style scoped>
.model_popup {
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
