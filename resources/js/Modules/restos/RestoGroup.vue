<template>
    <div class="resto_group__container">
        <div class="row">
            <div class="col-md-4 mb-4" v-for="(resto, index) in localrestos" :key="index">
                <card-component>
                    <template slot="title">{{ resto.name }}</template>
                    <template slot="body">
                        {{ resto.location }}
                        <br>
                        <a :href="resto.slug" class="card-link">Menu</a>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4 mb-4" v-if="CountRestaurants">
                <card-component>
                    <template slot="title">Add New Restaurant</template>
                    <template slot="body">
                        <span @click="showAddRestoFormModal">+</span>
                    </template>
                </card-component>
                <modal name="show-add-resto-form-modal" height="50%">
                    <add-resto-form v-on:cancelAddRestoForm="cancelAddRestoForm" v-on:addRestoForm="addRestoForm"></add-resto-form>
                </modal>
            </div>
        </div>
    </div>
</template>

<script>
import AddRestoForm from './AddRestoForm.vue';

export default {
    name: 'RestoGroup',
    components: {
        AddRestoForm
    },
    data() {
        return {
            localrestos: this.restos,
        }
    },
    props: [
        'restos'
    ],
    computed: {
        CountRestaurants() {
            return this.localrestos.length < 5;
        }
    },
    methods: {
        showAddRestoFormModal() {
            this.$modal.show('show-add-resto-form-modal');
        },
        cancelAddRestoForm() {
            this.$modal.hide('show-add-resto-form-modal');
        },
        addRestoForm(resto) {
            axios.post('/api/resto', resto)
                .then(response => {
                    this.localrestos.unshift(response.data.resto);
                })
                .catch(errors => {
                    console.log(errors);
                })
            this.$modal.hide('show-add-resto-form-modal');
        }
    }
}
</script>

<style>

</style>