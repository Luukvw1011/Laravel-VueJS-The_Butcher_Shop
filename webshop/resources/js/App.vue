<template>
  <Suspense>
    <router-view></router-view>
  </Suspense>
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