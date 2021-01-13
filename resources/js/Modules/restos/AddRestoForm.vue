<template>
    <div class="p-2">
        <h1>Add a new Restaurant</h1>
        <form @submit.prevent="addRestoForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="resto.name">
            </div>
            <div class="form-group">
                <label for="location">Address</label>
                <input type="text" id="location" class="form-control" v-model="resto.location">
            </div>
            <div class="form-group">
                <label for="tables">Number of tables</label>
                <input type="text" id="tables" class="form-control" v-model="resto.tables">
            </div>
            <button class="btn btn-primary" type="submit">Add</button>
            <button class="btn btn-warning" @click="cancelAddRestoForm">Cancel</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'AddRestoForm',
    data() {
        return {
            resto: this.restoData()
        }
    },
    methods: {
        cancelAddRestoForm() {
            this.$emit('cancelAddRestoForm');
        },
        restoData() {
            return {
                name: '',
                location: '',
                tables: ''
            }
        },
        addRestoForm() {
            this.$emit('addRestoForm', this.resto);
        }
    }
}
</script>

<style>

</style>