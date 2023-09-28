<template>
    <div class="container-fluid bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="d-none d-lg-block">User: TestUser12</h4>
        <icon @click="openSideBar" class="fs-1 d-lg-none" icon="fa-solid fa-bars" />
        <h2>Webshop</h2>
    </div>
</template>

<script>
export default {
    setup() {

        function openSideBar () {
            document.getElementById("sidebar").classList.remove("d-none");
            document.getElementById("cart-button").classList.add("d-none")
        }      

        return {
            openSideBar,
        } 
    }
}
</script>

<style scoped>
    div {
        position: absolute;
    }

    h4 {
        margin-left: 35vh;
    }
</style>