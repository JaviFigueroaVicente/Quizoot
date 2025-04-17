<template>
    <div class="fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form @submit.prevent="submitLogin">
                                <div class="">
                                    <span class="title">LOG IN</span>
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">{{ $t('email') }}</label>
                                        <input v-model="loginForm.email" id="email" type="email" class="form-control" required autofocus autocomplete="username">
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.email">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">
                                            {{ $t('password') }}
                                        </label>
                                        <input v-model="loginForm.password" id="password" type="password" class="form-control" required autocomplete="current-password">
                                        <div class="text-danger-600 mt-1">
                                            <div v-for="message in validationErrors?.password">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" v-model="loginForm.remember" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            {{ $t('remember_me') }}
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-end mt-4 mb-4">
                                        <button class="btn btn-primary button-action" :class="{ 'opacity-25': processing }" :disabled="processing">
                                            {{ $t('login') }}
                                        </button>
                                    </div>
                                </div>
                                <router-link :to="{name: 'auth.forgot-password'}">{{ $t('forgot_password')}}</router-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import useAuth from '@/composables/auth'

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

</script>

<style scoped>
.title{
    color: #874eca;
    font-family: "Atma";
    font-size: 40px;
    font-weight: bold;
}

.fondo {
    background-image: url("/images/Home/Fondo_Home.webp");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 90vh;
    margin: 0;
    padding: 0;
    position: relative;
}

.fondo::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
    backdrop-filter: blur(3px);
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-y: hidden !important;
}

.card {
    z-index: 2;
    margin-top: 12em;
}

input {
    border-color: #874eca;
}

.form-control:focus{
    border: none;
    box-shadow: 0 0 0 0.15rem rgb(64, 36, 98, 0.85);
}
.btn:focus-visible{
    background-color: #402462;
    border-color: transparent;
    box-shadow: none;
}

.btn:first-child:active{
    background-color: #402462;
    box-shadow: none;
}

button{
    background-color: #874eca;
    border: none;
}

button:hover{
    background-color: #402462;
}
</style>