<template>
    <div class="sub-header rounded shadow p-2 mb-3">
        <h2>{{ route.params.meat }}</h2>
        <!-- <span><img :src="'https://img.icons8.com/glyph-neue/52/' + animal.name + '.png'" :alt="animal.name"></span> -->
    </div>

    <div class="all-cuts-section d-flex flex-wrap gap-4 justify-content-center">
        <div class="product-card p-3 rounded" v-for="product in products">
            <div class="d-flex justify-content-between mb-1">
                <!-- <span>in stock ({{ product.stock }})</span> -->
                <p>in stock <span>({{ product.stock }})</span></p>

                <button @click="showModalFunc(product.description, product.name)" class="border-0 bg-transparent">
                    <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
                </button>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <span>{{product.name}}</span>
            </div>

            <div class="d-flex flex-column mb-3">
                <!-- This will be a image  -->
                <img class="img-container align-self-center" :src='product.picture' alt="niet beschikbaar">
                <div class="amount-container d-flex align-self-center align-items-center gap-2">
                    <button @click="decrementQuantity(product)">-</button>
                    <span>{{ product.selectedQuantity }}</span>
                    <button @click="incrementQuantity(product)">+</button>
                </div>
            </div>

            <div class="d-grid">
                <button @click="addProductToCart(product.id, product.name, product.selectedQuantity)" class="btn bg-primary text-white">Add to cart</button>
            </div>
        </div>
    </div>

    <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <span class="modal__title">{{ modalTitle }}</span>
        <span class="close-modal-span" @click="showModal = false"><icon icon="fa-solid fa-close"></icon></span>
      </div>

      <hr>

      <div class="modal-sub-header mb-3">
        <span>Origin</span>
      </div>

      <div class="modal-body d-lg-flex justify-content-between gap-5">
        <p>{{ modalText }}</p>
        <div 
            class="
                placeholder-img 
                h-lg-75 
                h-50 
                w-100 
                d-flex 
                align-items-center 
                justify-content-center"
            >Placeholder Image</div>
      </div>
    </vue-final-modal>
</template>

<script setup>
    import { useRoute } from 'vue-router';
    import { ref, watch } from 'vue'
    import axios from 'axios'

    const route = useRoute();

    const refreshFlag = ref(0);

    var products = ref();

    var showModal = ref(false);
    var modalTitle = ref("");
    var modalText = ref("");

    watch(() => refreshFlag.value, () => {
        getProducts();
    })

    function getProducts () {
        axios.get(`/api/products/${route.params.meat}`)
            .then(res => {
                products.value = res.data;
                products.value.forEach(el => {
                    el.selectedQuantity = 0;
                });
            })
    }

    function showModalFunc (text, title) {
        modalText.value = text;
        modalTitle.value = title;
        showModal.value = true;
    }

    function addProductToCart (productId, productName, selectedQuantity) {
        axios.get(`/api/shopping-cart/add/${productId}/${selectedQuantity}`)
            .then(res => {
                alert(productName + " added to the shopping cart.");
                refreshFlag.value++;
            })
    } 

    function incrementQuantity(selectedProduct) {
        if (selectedProduct.selectedQuantity < selectedProduct.stock) {
            selectedProduct.selectedQuantity++;   
        }
    }

    function decrementQuantity(selectedProduct) {
        if (selectedProduct.selectedQuantity > 0) {
            selectedProduct.selectedQuantity--;   
        }
    }

    getProducts();
</script>

<style scoped>
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

    .placeholder-img {
        background-color: rgb(77, 74, 81);
        border-radius: 4px;
    }

    .product-card {
        width: 250px;
    }

    .amount-container button{
        border: none;
        background: transparent;
    }

    .img-container {
        height: 150px;
        width: 150px;
        margin-bottom: 15px;
    }

    .close-modal-span {
        cursor: pointer;
    }

    .modal-sub-header span {
        font-size: larger;
    }

    @media (max-width: 544px) { 
        .product-card {
            width: 100%;
        }

        .img-container {
            width: 200px;
            height: 200px;
        }
    }
</style>
