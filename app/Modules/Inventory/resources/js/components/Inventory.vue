<template>
<div class="inventory">
    <transition name="fade">
        <InventoryPopup :inventory="inventory" :component="component" v-if="showPopup" @closePopup="closePopup"></InventoryPopup>
    </transition>
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" @click="showAddPopup">Добавить</a>
                </nav>
                <div class="card" v-if="getInventory.length > 0 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" v-for="inventory in getInventory">
                                {{inventory.name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import InventoryPopup from "./popup/InventoryPopup";

export default {
    name: "Inventory",
    components: {InventoryPopup},
    computed: {
        ...mapGetters({
            'getInventory': 'inventoryModule/getInventory',
        })
    },
    data(){
        return{
            inventory: null,
            showPopup: false,
            component: null,
            component_type: {
                add: 1,
                delete: 3
            }
        }
    },
    methods:{
        ...mapActions({
            'fetchInventory': 'inventoryModule/fetchInventory',
        }),
        showAddPopup: function (){
            this.showPopup = true;
            this.component = this.component_type.add;
        },
        showDeletePopup: function (inventory){
            this.inventory = inventory
            this.showPopup = true;
            this.component = this.component_type.delete;
        },
        closePopup: function (){
            this.showPopup = false
        },
        init(){
            this.fetchInventory();
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>

</style>
