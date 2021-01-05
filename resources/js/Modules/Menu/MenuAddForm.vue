<template>
    <div class="menu_form__wrapper">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="item">Food item</label>
                <input type="text" class="form-control" placeholder="Enter food item name" id="item" v-model="food.data.item">
            </div>
            <div class="form-group">
                <label for="category">Select category</label>
                <multiselect id="category" v-model="food.data.category" :options="categories"></multiselect>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Enter food item price" v-model="food.data.price">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
    name: 'MenuAddForm',
    components: {
        Multiselect
    },
    props: [
        'categories'
    ],
    data() {
        return {
            food: {
                data : {
                    item: '',
                    category: '',
                    price: ''
                }
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log(this.food);
        }
    }
}
</script>