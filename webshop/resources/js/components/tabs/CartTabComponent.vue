<template>
  <div class="sub-header d-flex rounded shadow justify-content-between align-items-center p-2 mb-3">
    <a href="/"><icon icon="fas-solid fa-arrow-left"></icon> Back to shop</a>
    <h2>Shopping cart</h2>
  </div>

  <div class="shopping-list rounded shadow p-3">
    <div class="shopping-item d-flex mb-3" v-for="item in item_count">
      <div class="w-75 d-flex">
        <!-- Test values. -->
        <div class="col-4">Item {{ item }}</div>
        <div>2x</div>
      </div>

      <div class="w-25 d-flex justify-content-end align-items-center">
        <div class="col-6">9,-</div>
        <button class="rounded-5 p-1 border-0 bg-danger text-white">
          <icon icon="fas-solid fa-close"></icon>
        </button>
      </div>
    </div>

    <hr>

    <div class="d-flex justify-content-end">
      <div>Total: 37,-</div>
    </div>
  </div>

  <div class="d-grid d-flex- mt-3">
    <button type="button" class="btn bg-primary text-white border-0 p-3 fs-5">Checkout</button>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  setup () {
    //Test value
    const item_count = ref(6);

    return {
      item_count,
    }
  }
}
</script>

<style scoped>
</style>