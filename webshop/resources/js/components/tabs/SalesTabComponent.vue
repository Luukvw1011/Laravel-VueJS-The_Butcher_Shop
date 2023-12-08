<template>
  <div class="sub-header p-2 rounded shadow border mb-3">
    <h2>Sale</h2>
  </div>

  <span class="text-white">Daily sale</span>

  <div class="product-card mt-2 p-2 rounded d-flex align-items-center flex-column">
    <div class="align-self-start d-block d-lg-none">Product name</div>
    <div class="justify-content-between w-100 d-none d-lg-flex">
        <div>Product name</div>
        <button @click="showModalFunc(product.description, product.name)" class="border-0 bg-transparent">
            <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
        </button>
    </div>

    <div class="my-5 d-lg-flex justify-content-between align-items-center">
        <div class="d-none d-lg-block w-50">
            <span class="fw-bold">Preperation tip</span>
            <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat omnis soluta voluptates provident exercitationem ullam corporis quidem ad eveniet! Natus, modi! Ipsa fugit dicta magnam eaque non accusantium impedit accusamus?</p>
        </div>

        <div class="placeholder-img w-25">Image</div>
    </div>

    <div class="mb-3">Sales information</div>

    <div class="w-100 d-flex d-lg-none justify-content-between">
        <button class="w-75 btn bg-primary text-white">Info & preperation</button>
        <button class="btn bg-primary text-white">Add to cart</button>
    </div>

    <button class="btn bg-primary text-white align-self-end d-none d-lg-block">Add to cart</button>
  </div>

  <hr class="text-white">

  <span class="text-white">Weekly sale</span>

  <div class="d-lg-flex d-inline gap-5">
    <div v-for="i in 3" class="product-card mt-2 p-2 rounded d-flex align-items-center flex-column my-3">
        <div class="justify-content-between w-100 d-none d-lg-flex">
            <div>Product name</div>
            <button @click="showModalFunc(product.description, product.name)" class="border-0 bg-transparent">
                <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
            </button>
        </div>

        <div class="my-5">
            <div class="placeholder-img">Image</div>
        </div>

        <div class="mb-3">Sales information</div>

        <div class="w-100 d-flex d-lg-none justify-content-between">
            <button class="w-75 btn bg-primary text-white">Info dropdown</button>
            <button class="btn bg-primary text-white">Add to cart</button>
        </div>

        <button class="add-to-cart-btn btn bg-primary text-white align-sm-self-end d-none d-lg-block">Add to cart</button>
    </div>
  </div>
</template>

<script setup>
    
</script>

<style scoped>
    @media (min-width: 544px) { 
        .product-card {
            width: 100%;
        }

        .add-to-cart-btn {
            width: 100%;
        }
    }
</style>
