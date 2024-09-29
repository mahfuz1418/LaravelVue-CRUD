<template>
    <div class="container my-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <router-link :to="{ name: 'List' }" class="btn btn-success">List</router-link>
                        <h4 class="">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="StoreData">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" v-model="FormData.product_name">
                                <span class="text-danger" v-for="error in errorData.product_name">{{ error }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Product Price</label>
                                <input type="text" class="form-control" v-model="FormData.product_price">
                                <span class="text-danger" v-for="error in errorData.product_price">{{ error }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            FormData: {
                product_name: '',
                product_price: ''
            },
            errorData: {
                product_name: '',
                product_price: ''
            }
        }
    },
    methods: {
        StoreData() {
            axios.post('/api/products', this.FormData)
            .then(response => {
                this.$router.push({ name: 'List' });
            })
            .catch(error => {
                // console.log(error.response.data.error);
                this.errorData.product_name = error.response.data.error.product_name;
                this.errorData.product_price = error.response.data.error.product_price;
            });
        }
    }
}
</script>

