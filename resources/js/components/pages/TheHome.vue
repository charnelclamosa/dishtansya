<template>
    <v-app>
        <div class="text-end mt-2 mr-2">
            <v-btn outlined color="error" @click="logout()">Logout</v-btn>
        </div>
        <v-row dense justify="center" align="center">
            <v-card elevation="12">
                <v-card-title>List of products</v-card-title>
                <v-card-text>
                    <v-simple-table  height="400">
                        <template v-slot:default>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Available Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in Products" :key="item.id">
                                <td>{{item.id}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.available_stock}}</td>
                                <td><v-btn small color="secondary" @click="passObject(item)">Order</v-btn></td>
                            </tr>
                        </tbody>
                    </template>
                    </v-simple-table>
                </v-card-text>
            </v-card>
        </v-row>
        <v-dialog persistent v-model="DialogBox" max-width="400">
            <v-card>
                <v-card-title>Place an order</v-card-title>
                <v-card-text>
                    <v-text-field dense outlined readonly label="Product Name" v-model="Order.name"></v-text-field>
                    <v-text-field dense outlined autofocus type="number" label="Quantity" v-model="Order.quantity"></v-text-field>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn small outlined color="error" @click="DialogBox = false">Cancel</v-btn>
                    <v-btn small color="primary" @click="order()">Order</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            Products: {},
            Order: {},
            DialogBox: false,
        }
    },
    created() {
        this.initializeToken()
        this.getProducts()
    },
    methods: {
        initializeToken() {
            let access_token = localStorage.getItem('access_token')
            axios.defaults.headers.common["Authorization"] = `Bearer ${access_token}`;
        },
        logout() {
            this.$router.push('/login')
        },
        getProducts() {
            // API
            axios.get('api/products').then(response => {
                this.Products = response.data
            }).catch(errors => {
                console.log(errors)
            })
        },
        passObject(value) {
            this.DialogBox = true
            this.Order = Object.assign({}, value)
        },
        order() {
            let product_id = this.Order.id
            let quantity = this.Order.quantity
            // API
            axios.post('api/order', {product_id, quantity}).then(response => {
                this.getProducts()
                this.DialogBox = false
            }).catch(errors => {
                console.log(errors)
            })
        }
    }

}
</script>
