<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <router-link
                            :to="{ name: 'List' }"
                            class="btn btn-success"
                            >List</router-link
                        >
                        <h4 class="">Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="EditData">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="FormData.product_name"
                                />
                                <span
                                    class="text-danger"
                                    v-for="error in errorData.product_name"
                                    >{{ error }}</span
                                >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="FormData.product_price"
                                />
                                <span
                                    class="text-danger"
                                    v-for="error in errorData.product_price"
                                    >{{ error }}</span
                                >
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            FormData: {
                product_name: "",
                product_price: "",
            },
            errorData: {
                product_name: "",
                product_price: "",
            },
        };
    },
    mounted() {
        this.edit();
    },
    methods: {
        edit(){
            axios.get("/api/products/" + this.$route.params.id)
            .then((response) => {
                this.FormData.product_name = response.data.product_name;
                this.FormData.product_price = response.data.product_price;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        EditData() {
            axios.put("/api/products/" + this.$route.params.id, this.FormData)
                .then((response) => {
                // console.log(response);
                this.$router.push({ name: "List" });
                })
                .catch((error) => {
                    this.errorData.product_name = error.response.data.error.product_name;
                    this.errorData.product_price = error.response.data.error.product_price;
                });
        },
    },
};
</script>
