<template>
  <router-view></router-view>
</template>

<style> 
  body {
    background-color: rgb(95, 95, 95);
  }

  @media (max-width: 544px) { 
    .sidebar-mobile {
      position: absolute;
    }
  }
</style>

<script setup>
  import { useUserStore } from '@/stores/user';

  const store = useUserStore();
</script>