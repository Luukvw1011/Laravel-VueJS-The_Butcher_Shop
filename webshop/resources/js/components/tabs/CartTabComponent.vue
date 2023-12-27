<template>
  <div class="sub-header d-flex rounded shadow justify-content-between align-items-center p-2 mb-3">
    <a href="/" class="d-lg-none"><icon icon="fas-solid fa-arrow-left"></icon> Back to shop</a>
    <h2>Shopping cart</h2>
  </div>

  <div class="shopping-list rounded shadow p-3">
    <p v-if="!loggedIn">Please login to use the shopping cart. <a href="/login">click here</a></p>

    <div class="shopping-item d-flex mb-3 p-3" v-for="product in cartProducts">
      <div class="w-75 d-flex align-items-center">
        <div class="col-4">{{ product.name }}</div>
        <div>{{ product.quantity }}</div>
      </div>

      <div class="w-25 d-flex justify-content-end align-items-center">
        <div class="col-6">{{ product.price }}</div>
        <button @click="deleteProduct(product.id)" class="border-0 bg-transparent text-danger">
          <icon icon="fas-solid fa-trash" class="fs-5"></icon>
        </button>
      </div>
    </div>

    <hr>

    <div class="d-flex justify-content-end">
      <div class="total p-lg-3 rounded">Total: {{ total }}</div>
    </div>
  </div>

  <div v-if="loggedIn" class="d-grid d-lg-none mt-3">
    <button type="button" class="btn bg-primary text-white border-0 p-3 fs-5">
      <a class="text-white text-decoration-none" href="/checkout">Checkout</a>
    </button>
  </div>

  <div class="d-none d-lg-flex my-3 justify-content-between align-items-center" v-if="loggedIn">
    <a href="/"><icon icon="fas-solid fa-arrow-left"></icon> Back to shop</a>
    <button type="button" class="btn bg-primary text-white border-0 p-3 fs-5">
      <a class="text-white text-decoration-none" href="/checkout">Checkout</a>
    </button>
  </div>

</template>

<script setup>
  import axios from 'axios';
  import { ref, watch } from 'vue';
  import { useUserStore } from '../../stores/user';

  var refreshFlag = ref(0);
  
  var cartProducts = ref(null);
  var total = ref(0);

  var userData = ref(await useUserStore().getUserData());
  var loggedIn = ref(false);

  if (userData.value) {
    loggedIn.value = true;
  }

  watch(() => refreshFlag.value, () => {
    if (loggedIn.value) {
      getProducts();    
    }
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

  function deleteProduct(product_id) {
    axios.get(`/api/shopping-cart/delete/${product_id}`)
      .then(res => {
        alert("Product deleted from the shopping cart");
        refreshFlag.value++;
        total.value = 0;
      })
  }

  if (loggedIn.value) {
    getProducts();    
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