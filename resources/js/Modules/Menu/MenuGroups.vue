<template>
    <div class="section">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Name &amp; Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in menuItems" :key="index">
                    <td>
                        <strong v-text="item.name"></strong>
                        <p v-text="item.description"></p>
                    </td>
                    <td v-text="item.price"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'MenuGroups',
    props: {
        menuItems: {
            type: Array
        }
    }
}
</script>