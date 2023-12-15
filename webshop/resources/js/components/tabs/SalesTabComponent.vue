<template>
  <div class="sub-header p-2 rounded shadow border mb-3">
    <h2>Sale</h2>
  </div>

  <span class="text-white">Special sale</span>

  <div class="product-card-special product-card mt-2 p-2 rounded d-flex align-items-center flex-column" v-for="product in special">
    <div class="align-self-start d-block d-lg-none">{{ product.name }}</div>
    <div class="justify-content-between w-100 d-none d-lg-flex">
        <div>{{ product.name }}</div>
        <button @click="showModalFunc(product.description, product.name, product.picture)" class="border-0 bg-transparent">
            <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
        </button>
    </div>

    <div class="my-5 w-100">
        <div class="d-flex align-items-center justify-content-lg-between justify-content-center">
            <div class="d-lg-inline d-none">
                <span class="fw-bold">Preperation tip</span>
                <p class="mt-2 me-5">{{ product.preperation }}</p>
            </div>

            <div class="mx-5"><img width="200" :src="product.picture" alt="niet beschikbaar"></div>
        </div>
    </div>

    <span class="align-self-start fw-bold">Price:</span>

    <div class="mb-3 d-block d-lg-none">
        <span class="text-decoration-line-through">{{ product.price }}</span>
        <p>{{ product.sale_price }}</p>
    </div>

    <div class="w-100 d-flex d-lg-none justify-content-between mb-2">
        <button @click="isExpandedHead = !isExpandedHead" class="w-75 btn bg-primary text-white">
            <span v-show="!isExpandedHead">Preperation & description</span>
            <span v-show="isExpandedHead">Close</span>
        </button>
        <button class="btn bg-primary text-white">Add to cart</button>
    </div>

    <div class="w-100 d-none d-lg-flex justify-content-between align-items-center">
        <div class="mx-5">
            <span class="text-decoration-line-through">{{ product.price }}</span>
            <p>{{ product.sale_price }}</p>            
        </div>

        <button class="btn bg-primary text-white">Add to cart</button>
    </div>

    <Collapse :when="isExpandedHead">
        <span class="fw-bold">Preperation: </span>

        <p>{{ product.preperation }}</p>

        <span class="fw-bold">Product description: </span>

        <p>{{ product.description }}</p>
    </Collapse>
  </div>

  <hr class="text-white">

  <span class="text-white">Weekly sale</span>

  <div class="product-cards-mobile d-lg-flex d-inline gap-5">
    <div v-for="(product, i) in products" class="product-card mt-2 p-2 rounded d-flex align-items-center flex-column my-3">
        <div class="align-self-start d-inline d-lg-none">{{ product.name }}</div>
        
        <div class="justify-content-between w-100 d-none d-lg-flex">
            <div>{{ product.name }}</div>
            <button @click="showModalFunc(product.description, product.name, product.picture)" class="border-0 bg-transparent">
                <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
            </button>
        </div>

        <div class="my-5">
            <div class="placeholder-img w-25"><img width="200" :src="product.picture" alt="niet beschikbaar"></div>
        </div>

        <span class="align-self-start fw-bold">Price:</span>

        <div class="mb-3">
            <span class="text-decoration-line-through">{{ product.price }}</span>
            <p>{{ product.sale_price }}</p>
        </div>

        <div class="w-100 d-flex d-lg-none justify-content-between mb-2">
            <button @click="isExpandedSub[i] = !isExpandedSub[i]" class="w-75 btn bg-primary text-white">
                <span v-show="!isExpandedSub[i]">Description</span>
                <span v-show="isExpandedSub[i]">Close</span>
            </button>
            <button class="btn bg-primary text-white">Add to cart</button>
        </div>

        <button class="add-to-cart-btn btn bg-primary text-white align-sm-self-end d-none d-lg-block ">Add to cart</button>

        <Collapse :when="isExpandedSub[i]">
            <span class="fw-bold">Product description: </span>

            <p class="mt-2">{{ product.description }}</p>
        </Collapse>
    </div>
  </div>

    <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <span class="modal__title">{{ modalTitle }}</span>
            <span class="close-modal-span" @click="showModal = false"><icon icon="fa-solid fa-close"></icon></span>
        </div>

        <hr>

        <div class="d-flex justify-content-between">
            <div>
                <span class="fw-bold">Description</span>
                <p class="my-2">{{ modalDescription }}</p>
            </div>

            <img class="align-self-end" width="250" height="200" :src="modalPicture" alt="Not available">
        </div>
    </vue-final-modal>
</template>

<script setup>
    import axios from 'axios';
    import { reactive, ref, watch } from 'vue';
    import { Collapse } from 'vue-collapsed'

    var special = ref([]);
    var products = ref();

    var showModal = ref(false);
    var modalTitle = ref("");
    var modalDescription = ref("");
    var modalPicture = ref("");

    const isExpandedHead = ref(false);
    const isExpandedSub = ref([false, false, false]);

    function getProducts () {
        axios.get('/api/sale/get')
            .then(res => {
                let count = 0;

                products.value = res.data;
                products.value = products.value.filter(function(obj) {
                    if (obj.special == 1) {
                        special.value.push(products.value[count]);
                    }
                    
                    count++;

                    return obj.special !== 1;
                })

                console.log(special.value);
            })   
    }

    function showModalFunc (text, title, picture) {
        modalDescription.value = text;
        modalTitle.value = title;
        modalPicture = picture;
        showModal.value = true;
    }

    getProducts();
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

    :deep(.modal-container) {
        display: flex;
        justify-content: center;
        padding: 60px;
    }

    :deep(.modal-content) {
        display: flex;
        padding: 1rem;
        width: 100vw;
        background: #a5a5a5;
        border-radius: 5px;
        overflow-y: auto;
    }
    .modal__title {
        font-size: 1.5rem;
        font-weight: 700;
    }
</style>
