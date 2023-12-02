<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Account</h2>
  </div>

  <div class="account-info rounded shadow p-3">
    <p>{{ userData.name }}</p>

    <ul class="mb-5">
      <li>Email: {{ userData.email }}</li>
    </ul>

    <a href="#">Order history <icon class="ms-1" icon="fas-solid fa-clock-rotate-left"></icon></a>
  </div>
</template>

<script setup>
  import axios from 'axios';
  import { reactive, watchEffect } from 'vue';

  const userData = reactive({
    name: null,
    email: null
  });

  watchEffect(() => {
    axios.get('/api/user/authenticate')
      .then(res => {
        userData.name = res.data.full_name;
        userData.email = res.data.email;
      })
      .catch(err => {
        console.log(err);
      })
  })
</script>

<style scoped>
  ul {
    list-style-type: "- ";
  }

  ul li {
    margin-bottom: 10px;
  }
</style>