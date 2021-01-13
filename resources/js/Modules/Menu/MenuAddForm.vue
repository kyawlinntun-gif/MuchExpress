<template>
    <div class="menu_form__wrapper">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="item">Food item</label>
                <input type="text" class="form-control" placeholder="Enter food item name" id="item"
                    v-model="food.data.item">
                <span class="validation-message" v-if="this.validation.hasMessage('item')" v-text="this.validation.getMessage('item')"></span>
            </div>
            <div class="form-group">
                <label for="category">Select category</label>
                <multiselect id="category" v-model="food.data.category" :options="categories"></multiselect>
                <span class="validation-message" v-if="this.validation.hasMessage('category')" v-text="this.validation.getMessage('category')"></span>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Enter food item price"
                    v-model="food.data.price">
                <span class="validation-message" v-if="this.validation.hasMessage('price')" v-text="this.validation.getMessage('price')"></span>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" v-model="food.data.description"></textarea>
                <span class="validation-message" v-if="this.validation.hasMessage('description')" v-text="this.validation.getMessage('description')"></span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import Validation from './../../utils/Validation';

    export default {
        name: 'MenuAddForm',
        components: {
            Multiselect
        },
        props: [
            'categories', 'restoId'
        ],
        data() {
            return {
                food: {
                    data: {
                        item: '',
                        category: '',
                        price: '',
                        resto_id: this.restoId,
                        description: ''
                    }
                },
                validation: new Validation()
            }
        },
        methods: {
            handleSubmit() {
                // axios.post('/item', this.food.data)
                //     .then(function (response) {
                //         console.log(response);
                //     })
                //     .catch(function (error) {
                //         console.log(error);
                //     });

                axios({
                    method: 'post',
                    url: '/api/item',
                    data: this.food.data
                })
                .then(response => {
                    // console.log(response);
                    this.$emit('addNewItems', response.data, this.food.data.category);
                    this.emptyFoodItems();
                })
                .catch(errors => {
                    // console.log(errors.response);
                    this.validation.setMessage(errors.response.data.errors);
                });
            },
            emptyFoodItems()
            {
                this.food.data.item = '';
                this.food.data.category = '';
                this.food.data.price = '';
                this.food.data.description = '';
            }
        }
    }

</script>
