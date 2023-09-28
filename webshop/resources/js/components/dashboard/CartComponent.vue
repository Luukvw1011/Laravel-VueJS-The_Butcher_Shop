<template>
    <button id="cart-button" type="button" class="badge bg-primary">
        <icon class="fs-1" icon="fas-solid fa-cart-shopping"></icon>
    </button>
</template>

<script>
export default {

}
</script>

<style scoped>
    button {
        position: absolute;
        bottom: 10px;
        left: 20px;
        width: 210px;
        height: 70px;
        border: none;
        border-radius: 30px;
        z-index: -1;
    }
</style>