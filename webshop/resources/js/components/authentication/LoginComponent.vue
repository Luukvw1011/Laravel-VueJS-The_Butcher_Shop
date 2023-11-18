<template>
    <div class="d-flex justify-content-center mt-3">
        <div class="inputs bg-secondary-subtle w-50 p-4 rounded">
            <h3 class="mb-3">Login</h3>

            <form>
                <div class="email-row mb-2">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" v-model="userDataObject.email">
                    <div class="form-text text-red" id="basic-addon4" v-for="error in v$.email.$errors" :key="error.$uid">{{ error.$message }}</div>
                </div>

                <div class="password-row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" v-model="userDataObject.password">
                    <div class="form-text text-red" id="basic-addon4" v-for="error in v$.password.$errors" :key="error.$uid">{{ error.$message }}</div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" @click.prevent="loginAction">Log in</button>
                </div>
            </form>

            <div class="login-error"></div>
        </div>
    </div>
</template>

<script setup>
    import { reactive, computed } from 'vue';
    import useVuelidate from '@vuelidate/core';
    import { required, email } from '@vuelidate/validators';
    import axios from 'axios';

    const rules = computed(() => {
        return {
            email: { required, email },
            password: { required }
        }
    })

    const userDataObject = reactive({
        email: null,
        password: null,
    });

    const v$ = useVuelidate(rules, userDataObject);

    async function loginAction () {
        const result = await v$.value.$validate()

        if (result) {
            console.log(userDataObject);
        }
    }
</script>

