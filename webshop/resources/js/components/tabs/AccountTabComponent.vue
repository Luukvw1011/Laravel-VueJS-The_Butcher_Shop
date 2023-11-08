<template>
  <div class="sub-header rounded shadow p-2 mb-3">
    <h2>Account</h2>
  </div>

  <div class="account-info rounded shadow p-3">
    <p>Username</p>

    <ul class="mb-5">
      <li>Volledige naam</li>
      <li>Email</li>
      <li>*********</li>
    </ul>

    <a href="#">Order history <icon class="ms-1" icon="fas-solid fa-clock-rotate-left"></icon></a>
  </div>
</template>

<script>
export default {

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