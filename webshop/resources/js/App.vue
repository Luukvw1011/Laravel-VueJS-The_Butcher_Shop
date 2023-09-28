<template>
  <HeaderBarComponent></HeaderBarComponent>
  <SideBarComponent></SideBarComponent>

  <div class="d-block d-lg-none">
    <CartComponent></CartComponent>
  </div>
</template>

<script setup>
  import HeaderBarComponent from './components/dashboard/HeaderBarComponent.vue';
  import SideBarComponent from './components/dashboard/SideBarComponent.vue';
  import CartComponent from './components/dashboard/CartComponent.vue';
</script>

<style> 
  body {
    background-color: rgb(95, 95, 95);
  }
</style>