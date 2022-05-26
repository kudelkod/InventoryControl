<template>
    <div class="model_popup">
        <AddModel v-if="component === 1" @closePopup="closePopup"></AddModel>
<!--        <EditManufacture :manufacture="manufacture" v-if="component === 2" @closePopup="closePopup"></EditManufacture>-->
<!--        <DeleteManufacture :manufacture="manufacture" v-if="component === 3" @closePopup="closePopup"></DeleteManufacture>-->
    </div>
</template>

<script>
import AddModel from "./AddModel";

export default {
    name: "ModelPopup",
    components:{AddModel,},
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
