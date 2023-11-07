<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Categories</h2>
  </div>

  <div class="category-tiles">
    <div class="category-tile rounded p-2 mb-3" v-for="meat in meatArr">
        <h4>{{ meat.name }}</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi beatae reprehenderit harum provident saepe blanditiis quod quis quae? Neque natus perferendis omnis distinctio corrupti ex impedit minus, assumenda quod iure.</p>
        
        <div class="d-grid justify-content-lg-end">
          <button class="btn bg-primary text-white" @click="navigateToCategory(meat.name)">browse</button>
        </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router'

export default {
  setup () {
    const router = useRouter();

    let meatArr = ref([
      {name: "Beef"},
      {name: "Poultry"},
      {name: "Pork"},
      {name: "Seafood"},
      {name: "Lamb"},
      {name: "Wild"},
    ]);

    function navigateToCategory (typeOfCut) {
      router.push({ name: 'category', params: { meat: typeOfCut.toLowerCase() }})
    }

    return {
      meatArr,
      navigateToCategory
    }
  }
}
</script>
