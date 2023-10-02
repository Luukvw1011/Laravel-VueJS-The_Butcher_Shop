<template>
    <div class="bg-primary text-white d-flex align-items-center px-2 justify-content-between">
        <h4 class="d-lg-block d-none">User: testUser1</h4>
        <icon @click="openSideBar" class="fs-1 d-lg-none" icon="fa-solid fa-bars" />
        <h2>Webshop</h2>
    </div>
</template>

<script>
export default {
    setup() {

        function openSideBar () {
            document.getElementById("sidebar").classList.remove("d-none");
            document.getElementById("cart-button").remove()
        }      

        return {
            openSideBar,
        } 
    }
}
</script>

<style scoped>
    div {
        width: 100%;
    }
</style>