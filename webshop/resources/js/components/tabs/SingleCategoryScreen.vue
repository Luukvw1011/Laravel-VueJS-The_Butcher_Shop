<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Meat: {{ typeOfCut }}</h2>
  </div>

  <div class="all-cuts-section d-flex flex-wrap gap-4 justify-content-center">
    <div class="product-card p-3 rounded" v-for="product in products">
        <div class="d-flex justify-content-between mb-1">
            <!-- <span>in stock ({{ product.stock }})</span> -->
            <p>in stock <span>({{ product.stock }})</span></p>

            <button class="border-0 bg-transparent">
                <icon icon="fa-solid fa-info-circle" class="fs-4"></icon>
            </button>
        </div>

        <div class="d-flex justify-content-center mb-3">
            <span>{{product.name}}</span>
        </div>

        <div class="d-flex flex-column mb-3">
            <!-- This will be a image  -->
            <div class="img-container align-self-center">&nbsp;</div>
            <div class="amount-container d-flex align-self-center align-items-center gap-2">
                <button>-</button>
                <span>0</span>
                <button>+</button>
            </div>
        </div>

        <div class="d-grid">
            <button class="btn bg-primary text-white">Add to cart</button>
        </div>
    </div>
  </div>
</template>

<script>
import { useRoute } from 'vue-router'
import { ref, watchEffect } from 'vue'
import axios from 'axios'

export default {
    setup () {
        const route = useRoute();
        const typeOfCut = ref();
        
        let products = ref(); 

        let meat_arr = ['beef', 'poultry', 'pork', 'seafood', 'lamb', 'wild'];

        watchEffect(() => {
            let selectedCut = route.params.meat;

            if (meat_arr.includes(selectedCut)) {
                typeOfCut.value = selectedCut.charAt(0).toUpperCase() + selectedCut.slice(1);

                axios.get(`http://127.0.0.1:8000/api/products/${typeOfCut.value}`)
                    .then(res => {
                        products.value = res.data;
                        console.log(products.value)
                    })
            } else {
                //Error Message
                typeOfCut.value = "empty";
            } 
        })

        return {
            typeOfCut,
            products,
        }
    }
}
</script>

<style scoped>
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
        background-color: rgb(70, 70, 70);
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
