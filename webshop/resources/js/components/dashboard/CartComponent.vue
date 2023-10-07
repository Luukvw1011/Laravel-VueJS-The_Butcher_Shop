<template>
    <button @click="navigateToShoppingCart" id="cart-button" type="button" class="badge bg-primary">
        <icon class="fs-1" icon="fas-solid fa-cart-shopping"></icon>
    </button>
</template>

<script>
    window.addEventListener("scroll", function (event) {
        const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight

        if (window.scrollY >= scrollableHeight) {
            document.getElementById("cart-button").style.display = "none"
        } else {
            document.getElementById("cart-button").style.display = "block"
        }
    })

    export default {
        setup() {
            function navigateToShoppingCart () {
                window.location.href = "/shopping_cart";
            }

            return {
                navigateToShoppingCart,
            }
        }
    }
</script>

<style scoped>
    button {
        position: fixed;
        bottom: 10px;
        left: 20px;
        width: 210px;
        height: 70px;
        border: none;
        border-radius: 30px;
        z-index: 1;
    }  
</style>