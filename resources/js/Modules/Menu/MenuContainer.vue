<template>
    <div class="menu_container__wrapper">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="body">
                        <multiselect v-model="menu" :options="categories"></multiselect>
                        <menu-groups :menuItems="currentMenuItems"></menu-groups>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Items</template>
                    <template slot="body">
                        <menu-add-form :categories="categories"></menu-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenuGroups from './MenuGroups';
import MenuAddForm from './MenuAddForm.vue';

export default {
    name: 'MenuContainer',
    components: {
        Multiselect, MenuGroups,
        MenuAddForm
    },
    props: [
        'items'
    ],
    data() {
        return {
            categories: [],
            menu: ''
        }
    },
    created() {
        _.forEach(this.items, (item, key) => {
            this.categories.push(key);

            this.menu = this.categories[0];
        });
    },
    computed: {
        currentMenuItems() {
            return this.items[this.menu];
        }
    }
}
</script>