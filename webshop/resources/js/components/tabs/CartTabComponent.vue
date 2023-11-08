<template>
  <div class="sub-header d-flex rounded shadow justify-content-between align-items-center p-2 mb-3">
    <a href="/" class="d-lg-none"><icon icon="fas-solid fa-arrow-left"></icon> Back to shop</a>
    <h2>Shopping cart</h2>
  </div>

  <div class="shopping-list rounded shadow p-3">
    <div class="shopping-item d-flex mb-3 p-3" v-for="product in cartProducts">
      <div class="w-75 d-flex align-items-center">
        <div class="col-4">{{ product[0].name }}</div>
        <div>{{ product[0].quantity }}</div>
      </div>

      <div class="w-25 d-flex justify-content-end align-items-center">
        <div class="col-6">{{ product[0].price }}</div>
        <button class="border-0 bg-transparent text-danger">
          <icon icon="fas-solid fa-trash" class="fs-5"></icon>
        </button>
      </div>
    </div>

    <hr>

    <div class="d-flex justify-content-end">
      <div class="total p-lg-3 rounded">Total: {{ total }}</div>
    </div>
  </div>

  <div class="d-grid d-lg-none mt-3">
    <button type="button" class="btn bg-primary text-white border-0 p-3 fs-5">Checkout</button>
  </div>

  <div class="d-none d-lg-flex my-3 justify-content-between align-items-center">
    <a href="/"><icon icon="fas-solid fa-arrow-left"></icon> Back to shop</a>
    <button type="button" class="btn bg-primary text-white border-0 p-3 fs-5">Checkout</button>
  </div>

</template>

<script>
import axios from 'axios';
import { ref, watchEffect } from 'vue';

export default {
  setup () {
    let userId = 0;
    let cartProducts = ref();
    let total = ref(0);

    watchEffect(() => {
      axios.get(`/api/shopping-cart/get/${userId}`)
        .then(res => {
          cartProducts.value = res.data;
          calculatePriceByProduct();
          calculateTotal();
        })
    })

    function calculatePriceByProduct() {
      cartProducts.value.forEach(el => {
        el[0].price = el[0].quantity * el[0].price.toFixed();
      })
    }

    function calculateTotal() {
      cartProducts.value.forEach(el => {
        let price = parseInt(el[0].price);
        total.value += price;
      });
    } 

    return {
      cartProducts,
      total,
    }
  }
}
</script>

<style scoped>
    .shopping-item:nth-child(even) {
      background-color: rgb(218, 218, 218);
    }
    .shopping-item {
      background-color: rgb(198, 198, 198);
      border-radius: 10px;
    }

  @media (min-width: 992px) {
    .total {
      color: white;
      background-color: gray;
    }
  }
</style>