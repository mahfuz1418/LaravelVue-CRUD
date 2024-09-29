<template>
    <div class="container my-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <router-link :to="{ name: 'AddNew' }" class="btn btn-success">Add New</router-link>
                        <h4 class="">Product List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product, index) in products">
                                    <th scope="row">{{ ++ index }}</th>
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_price }}</td>
                                    <td>
                                        <router-link :to="{name: 'Edit', params: {id: product.id} }" class="btn btn-sm btn-primary mx-1">Edit</router-link>
                                        <a @click.prevent="destroy(product.id)" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            products: [],
        };
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            axios.get('/api/products')
            .then(response => {
                this.products = response.data;
            })
            .catch (error => {
                console.log(error);
            });
        },
        destroy(id) {
            axios.delete('/api/products/' + id)
            .then(response => {
                console.log('success');
                this.getProducts();
            })
            .catch(error => {
                console.log(error);
            });
        }

    }
}
</script>

