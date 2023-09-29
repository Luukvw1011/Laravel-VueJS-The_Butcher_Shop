<template>
    <nav id="sidebar" class="d-none d-lg-block container-fluid">
        <div class="row flex-nowrap">
            <div class="bg-dark col-6 col-lg-2 min-vh-100">
                <div class="bg-dark text-white">
                    <div class="d-flex justify-content-end justify-content-lg-start mt-2">
                        <icon @click="closeSideBar" class="fs-1 d-lg-none" icon="fa-solid fa-xmark"></icon>
                        <button class="account-button fs-3 d-none d-lg-block bg-primary text-white">
                            <icon icon="fa-solid fa-user"></icon>
                        </button>
                    </div>

                    <ul class="nav nav-pills p-2 flex-column mt-4 align-items-center align-items-lg-end">
                        <li class="nav-item d-lg-none">Account</li>
                        <li class="nav-item">Home</li>
                        <li class="nav-item">Category's</li>
                        <li class="nav-item">Sale</li>
                    </ul>

                    <div class="shopping-cart-mobile d-lg-none">
                        <icon icon="fas-solid fa-cart-shopping"></icon>
                    </div>

                    <div class="shopping-cart-desktop d-none d-lg-flex justify-content-center">
                        <button class="button bg-primary text-center text-white p-2 px-4">
                            Shopping Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    setup() {
        function closeSideBar () {
            document.getElementById("sidebar").classList.add("d-none");
            document.getElementById("cart-button").classList.remove("d-none")
        }

        return {
            closeSideBar,
        }
    }
}
</script>

<style scoped>
    nav {
        position: absolute;
    }

    ul li {
        margin-bottom: 20px;
    }

    .shopping-cart-mobile {
        position: absolute;
        bottom: 20px;
        right: 70%;
    }

    .shopping-cart-mobile :first-child {
        font-size: 55px;
    }

    .shopping-cart-desktop {
        position: absolute;
        bottom: 20px;
        left: 40px;
    }

    .shopping-cart-desktop button {
        border: none;
        border-radius: 10px;
    }

    .account-button {
        padding: 10px 15px;
        border: none;
        border-radius: 20%;
    }

    @media (min-width: 992px) { 
        li {font-size: 20px;}
    }

    @media (max-width: 544px) { 
        li {font-size: 25px;}
    }
</style>