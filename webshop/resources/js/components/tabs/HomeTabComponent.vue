<template>
  <div class="sub-header p-2 rounded shadow border mb-5">
    <h2>Home</h2>

    <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi, earum! Aut temporibus nostrum exercitationem enim earum officia! Sit, laudantium assumenda! Aperiam harum voluptate ea adipisci optio voluptatum eum hic commodi.</p>
  </div>

  <div class="text-center text-white">
    <h4>Categories</h4>
    <hr>  
  </div>

  <div class="category-section mt-5">
    <router-link v-for="animal in animals_arr" :to="{ name: 'category', params: { meat: animal.meat } }">
      <div class="rounded shadow border">
        <img :src="'https://img.icons8.com/glyph-neue/52/' + animal.name + '.png'" :alt="animal.name">
      </div>
    </router-link>
  </div>
</template>

<script setup>
  import { ref } from 'vue';

  let animals_arr = ref([
    {name: "cow", meat: "beef"},
    {name: "chicken", meat: "poultry"},
    {name: "pig", meat: "pork"},
    {name: "fish-food", meat: "seafood"},
    {name: "sheep", meat: "lamb"},
    {name: "deer", meat: "wild"},
  ]);
</script>

<style scoped>
  .category-section {
    display: grid;
    grid-template-rows: auto auto auto;
    grid-template-columns: auto auto;
    column-gap: 15px;
    row-gap: 20px;
  }

  .category-section div{
    display: flex;
    justify-content: center;
    height: 150px;
    align-items: center;
    background-color: rgb(226, 226, 226);
  }

  .category-section div img {
    widows: 52px;
    height: 52px;
    transition: 0.4s;
  }

  @media (min-width: 992px) { 
    .category-section {
      grid-template-rows: auto auto;
      grid-template-columns: auto auto auto;
    }

    .category-section div:hover img{
      transform: scale(1.5);
    }
  }

</style>