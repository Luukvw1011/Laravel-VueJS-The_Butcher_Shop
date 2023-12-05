<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Account</h2>
  </div>

  <div class="account-info rounded shadow p-3">
    <div v-if="loggedIn">
      <p>{{ userData.full_name }}</p>

      <ul class="mb-5">
        <li>Email: {{ userData.email }}</li>
      </ul>

      <div class="d-flex justify-content-between align-items-center">
        <a href="#">Order history <icon class="ms-1" icon="fas-solid fa-clock-rotate-left"></icon></a>
        <button class="btn bg-primary text-white" @click="logout">Log out</button>
      </div>
    </div>

    <div v-if="!loggedIn">
      <p>Not logged in</p>

      <hr>

      <p>Create a new account or log in using the buttons below.</p>

      <div class="d-flex space-between gap-2">
        <router-link to="/login">
          <button class="btn btn-primary">Log in</button>
        </router-link>
        
        <router-link to="/register">
          <button class="btn">Create new account</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  import { ref } from 'vue';
  import { useUserStore } from '../../stores/user';

  const router = useRouter();
  
  var userData = ref(await useUserStore().getUserData());
  var loggedIn = ref(false);

  if (userData.value) {
    loggedIn.value = true;
  }

  function logout() {
    axios.get('/api/user/logout')
      .then(res => {
        if(res.status == 200) {
          alert('User logged out');
          router.push({ path: '/' });
        } 
      })
  }
</script>

<style scoped>
  ul {
    list-style-type: "- ";
  }

  ul li {
    margin-bottom: 10px;
  }
</style>