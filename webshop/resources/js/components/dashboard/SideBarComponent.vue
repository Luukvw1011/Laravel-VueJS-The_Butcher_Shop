<template>
    <nav class="bg-dark text-white">
        <div class="d-flex justify-content-end">
            <icon @click="closeSideBar" class="me-1 mt-1 fs-1 d-lg-none" icon="fa-solid fa-close"></icon>
        </div>

        <div class="d-flex justify-content-center justify-content-lg-end mt-lg-4">
            <icon class="fs-4 d-none d-lg-block" icon="fa-solid fa-user"></icon>

            <ul class="nav nav-pills p-2 flex-column mt-4 align-items-center align-items-lg-end">
                <li class="nav-item d-lg-none">Account</li>
                <li class="nav-item"><router-link to="/">Home</router-link></li>
                <li class="nav-item"><router-link to="/categories">Categories</router-link></li>
                <li class="nav-item"><router-link to="/sale">Sale</router-link></li>
            </ul>
        </div>

        <div class="shopping-cart-mobile d-lg-none">
            <router-link to="/shopping_cart"><icon icon="fas-solid fa-cart-shopping"></icon></router-link>
        </div>

        <div class="shopping-cart-desktop d-none d-lg-flex justify-content-center align-items-end">
            <button @click="navigateToShoppingCart" class="bg-primary text-white">
                <icon icon="fas-solid fa-cart-shopping"></icon>
            </button>
        </div>
    </nav>
</template>

<script>
export default {
    setup() {
        function closeSideBar () {
            document.getElementById("sidebar").classList.add("d-none");
        }

        function navigateToShoppingCart () {
            window.location.href = "/shopping_cart"
        }

        return {
            closeSideBar,
            navigateToShoppingCart,
        }
    }
}
</script>

<style scoped>
    nav {
        position: fixed;
        height: 100vh;
        width: 50vw;
        z-index: 2;
    }

    ul li {
        margin-bottom: 20px;
    }

    .shopping-cart-mobile {
        position: absolute;
        bottom: 20px;
        left: 50%; 
    }

    .shopping-cart-mobile :first-child *{
        font-size: 55px;
        position: relative;
        left: -50%;
        color: white;
    }

    .shopping-cart-desktop {
        position: absolute;
        bottom: 10px;
        width: 100%;
    }

    .shopping-cart-desktop button {
        border: none;
        border-radius: 10px;
        padding: 10px 0;
        width: 90%;
    }

    @media (min-width: 992px) { 
        li {font-size: 20px;}

        nav {
            position: fixed;
            height: 100vh;
            width: 16.5vw;
            z-index: 2;
        }
    }

    @media (max-width: 544px) { 
        li {font-size: 25px;}
    }
</style>