<template>
    <div class="bg-primary text-white d-flex align-items-center px-2 justify-content-between">
        <icon @click="openSideBar" class="fs-1 d-lg-none" icon="fa-solid fa-bars" />
        <h2>The Butcher shop</h2>
    </div>
</template>

<script setup>
    function openSideBar () {
        document.getElementById("sidebar").classList.remove("d-none");
    }      
</script>

<style scoped>
    div {
        width: 100%;
    }
</style>