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
    <div class="rounded shadow border" v-for="animal in animals_arr">
      <img :src="'https://img.icons8.com/glyph-neue/52/' + animal.name + '.png'" :alt="animal.name">
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  setup () {
    let animals_arr = ref([
      {name: "cow"},
      {name: "chicken"},
      {name: "pig"},
      {name: "fish-food"},
      {name: "sheep"},
      {name: "deer"},
    ]);

    return {
      animals_arr,
    }
  }
}
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