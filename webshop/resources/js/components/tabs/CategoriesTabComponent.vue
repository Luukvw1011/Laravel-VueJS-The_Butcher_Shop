<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Categories</h2>
  </div>

  <div class="category-tiles">
    <div class="category-tile rounded p-2 mb-3" v-for="meat in meat_arr">
        <h4>{{ meat.name }}</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi beatae reprehenderit harum provident saepe blanditiis quod quis quae? Neque natus perferendis omnis distinctio corrupti ex impedit minus, assumenda quod iure.</p>
        
        <div class="d-grid justify-content-lg-end">
            <button class="btn bg-primary text-white">browse</button>
        </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup () {
        let meat_arr = ref([
            {name: "Beef"},
            {name: "Chicken"},
            {name: "Pig"},
            {name: "Fish"},
            {name: "Lamb"},
            {name: "Wild"},
        ]);

        return {
            meat_arr,
        }
    }
}
</script>

<style scoped>

</style>