<template>
<div class="inventory">
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" @click="">Добавить</a>
                </nav>
                <div class="card">
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

export default {
    name: "Inventory",
    computed: {
        ...mapGetters({
            'getInventory': 'inventoryModule/getInventory',
        })
    },
    methods:{
        ...mapActions({
            'fetchInventory': 'inventoryModule/fetchInventory',
        }),
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
