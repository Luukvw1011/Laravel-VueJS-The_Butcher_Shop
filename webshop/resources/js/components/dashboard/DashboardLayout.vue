<template>
    <div class="d-flex">
        <div id="sidebar" class="sidebar-mobile col-6 col-lg-2">
            <SideBarComponent></SideBarComponent>
        </div>
        
        <div class="col-lg-10 col-12">
            <HeaderBarComponent></HeaderBarComponent>
            <div class="container mt-3">
                <router-view></router-view> 
            </div>
        </div>
    </div>
</template>

<script setup>
    import HeaderBarComponent from './HeaderBarComponent.vue';
    import SideBarComponent from './SideBarComponent.vue'; 
</script>

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