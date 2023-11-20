<template>
    <div class="d-flex justify-content-center mt-3">
        <div class="inputs bg-secondary-subtle w-50 p-4 rounded">
            <h3 class="mb-3">Register</h3>

            <form>
                <div class="d-flex gap-2">
                    <div class="firstname-row w-50">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" v-model="formData.firstname">
                        <div class="form-text text-red" id="basic-addon4" v-if="v$.firstname.$error || v$.infix.$error || v$.lastname.$error">{{ nameErrorMessage }}</div>
                    </div>
                
                    <div class="infix-row w-25">
                        <label for="infix" class="form-label">Infix</label>
                        <input type="text" class="form-control" id="infix" v-model="formData.infix">
                    </div>
                
                    <div class="lastname-row w-50">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname" v-model="formData.lastname">
                    </div>
                </div>

                <div class="email-row">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" v-model="formData.email">
                    <div class="form-text text-red" id="basic-addon4" v-for="error in v$.email.$errors" :key="error.$uid">{{ error.$message }}</div>
                </div>

                <div class="password-row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" v-model="formData.password.password">
                    <div class="form-text text-red" id="basic-addon4" v-for="error in v$.password.password.$errors" :key="error.$uid">{{ error.$message }}</div>
                </div>

                <div class="password-repeat-row">
                    <label for="confirm-password" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="confirm-password" v-model="formData.password.confirm">
                    <div class="form-text text-red" id="basic-addon4" v-for="error in v$.password.confirm.$errors" :key="error.$uid">{{ error.$message }}</div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" @click.prevent="signUpAction">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { reactive, ref, computed } from 'vue';
    import useVuelidate from '@vuelidate/core';
    import { required, email, sameAs } from '@vuelidate/validators';
    import axios from 'axios';

    const nameErrorMessage = "All fields must be filled in.";

    const formData = reactive({
        firstname: null,
        infix: null,
        lastname: null,
        email: null,
        password: {
            password: null,
            confirm: null
        }
    });
    
    const rules = computed(() => {
        return {
            firstname: { required },
            infix: { },
            lastname: { required },
            email: { required, email },
            password: {
                password: { required },
                confirm: { required, sameAs: sameAs(formData.password.password) }
            }
        }
    })

    const v$ = useVuelidate(rules, formData);

    const userObject = reactive({
        full_name: null,
        email: null,
        password: null,
    });

    async function signUpAction () {
        const result = await v$.value.$validate()

        if (result) {
            setUserObjectData();
        } 
    }

    function setUserObjectData () {
        userObject.password = formData.password.password;
        userObject.email = formData.email;

        if (formData.infix === null) {
            userObject.full_name = [formData.firstname, formData.lastname].join(' ');
        } else {
            userObject.full_name = setFullnameString([
                formData.firstname, 
                formData.infix, 
                formData.lastname
            ]);
        }

        processApiRequest(userObject);
    }

    function setFullnameString (fullnameArr) {
        return fullnameArr.join(' ');
    }

    function processApiRequest(userObject) {
        // axios.post('/api/user/register', userObject)
        //     .then(res => {
        //         if (res.status == 200) {
        //             alert(`User ${res.data.user.full_name} succesfully created`);
        //         }

        //         window.location.href = '/login';
        //     })
        //     .catch(err => {
        //         console.log(err);
        //     })
    }
</script>

<style scoped>
    .inputs div {
        margin-bottom: 12px;
    }
</style>

