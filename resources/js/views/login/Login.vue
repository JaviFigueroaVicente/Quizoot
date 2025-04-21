<template>
    <div class="container">
        <div class="video-fondo-div">
            <video class="video-fondo" src="/images/Home/fondo4.mp4" autoplay="true" muted="true" loop="true"></video>        
        </div>      
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

</template>

<script setup>

import useAuth from '@/composables/auth'

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

</script>

<style scoped>

.video-fondo-div {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}

.video-fondo {
    position: absolute;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -1;
    object-fit: cover;
    filter: blur(10px);
}
.title{
    color: #874eca;
    font-family: "Atma";
    font-size: 40px;
    font-weight: bold;
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