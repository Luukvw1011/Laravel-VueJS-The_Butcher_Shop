<template>
    <div class="card">
        <div class="card-body" v-if="!orderPlaced">
            <h5 class="card-title">Checkout</h5>
            <hr>

            <div class="product-pricing-list">
                <p v-if="total == 0">No items in the shopping cart.</p>

                <ul class="container">
                    <li class="row p-2" v-for="product in cartProducts">
                        <div class="col">{{ product.name }}</div>
                        <div class="col">{{ product.quantity }}</div>
                        <div class="col">{{ product.price }}</div>
                    </li>
                </ul>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <div>Total: {{ total }}</div>
            </div>
        </div>

        <div class="card-body d-flex align-items-center gap-2" v-if="orderPlaced">
            <icon class="fs-3 text-success" icon="fas fa-circle-check"></icon>
            <span>You're order is confirmed and will arive as soon as possible.</span>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-2">
        <button class="btn bg-primary text-white" :disabled="total == 0" @click="orderPlaced = true" v-if="!orderPlaced">Place order</button>
    </div>
</template>

<script setup>
    import { ref, onMounted, watchEffect, watch } from 'vue';
    import axios from 'axios';
    import { useUserStore } from '../../stores/user';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    var cartProducts = ref(null);

    var orderPlaced = ref(false);

    var total = ref(0);

    onMounted(async () => {
        let userData = await useUserStore().getUserData();

        if (userData) {
            getProducts();
        } else {
            alert("You are not logged in.");
            router.push({ path: '/login' })
        }
    })

    watch(() => orderPlaced.value, () => {
        axios.get(`/api/shopping-cart/delete-all`)
    })

    function getProducts() {
        axios.get(`/api/shopping-cart/get`)
        .then(res => {
            cartProducts.value = res.data;

            if (cartProducts.value.length) {      
                calculatePriceByProduct();
                calculateTotal();  
            } else {
                total.value = 0;
            }
        })
    }

    function calculatePriceByProduct() {
        cartProducts.value.forEach(el => {
            el.price = el.quantity * el.price;
            el.price = el.price.toFixed(2);
        })
    }

    function calculateTotal() {
        cartProducts.value.forEach(el => {
            let price = parseInt(el.price);
            total.value += price;
        });     
    }

</script>

<style scoped>
    .product-pricing-list ul {
        list-style-type: none;
    }
</style>