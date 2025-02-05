<template>
    <div class="fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form @submit.prevent="submitRegister">
                                <div class="">
                                    <span class="title">REGISTER</span>
                                    <!-- Email -->
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">{{ $t('name') }}</label>
                                        <input v-model="registerForm.name" id="name" type="text" class="form-control" autofocus>
                                        <!-- Validation Errors -->
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.name">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ $t('email') }}</label>
                                        <input v-model="registerForm.email" id="email" type="email" class="form-control" autocomplete="username">
                                        <!-- Validation Errors -->
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.email">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">
                                            {{ $t('password') }}
                                        </label>
                                        <input v-model="registerForm.password" id="password" type="password" class="form-control" autocomplete="current-password">
                                        <!-- Validation Errors -->
                                        <div class="text-danger-600 mt-1">
                                            <div v-for="message in validationErrors?.password">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">
                                            {{ $t('confirm_password') }}
                                        </label>
                                        <input v-model="registerForm.password_confirmation" id="password_confirmation" type="password" class="form-control" autocomplete="current-password">
                                        <!-- Validation Errors -->
                                        <div class="text-danger-600 mt-1">
                                            <div v-for="message in validationErrors?.password_confirmation">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button class="btn btn-primary button-action" :class="{ 'opacity-25': processing }" :disabled="processing">
                                            {{ $t('register') }}
                                        </button>
                                    </div>
                                </div>
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

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

</script>

<style scoped>

.title{
    color: #874eca;
    font-family: "Atma";
    font-size: 40px;
    font-weight: bold;
}

.fondo {
    background-image: url("images/Home/Fondo_Home.webp");
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
    background-color: rgba(0, 0, 0, 0.5); /* Color negro con 80% de transparencia */
    z-index: 1; /* Se asegura de que la capa de transparencia esté encima de la imagen */
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.card {
    margin-top: 100px;
    z-index: 2; /* Asegura que el contenido (como las tarjetas) esté por encima de la capa de fondo */
}

input {
    border-color: #874eca;
}

.form-control:focus{
    border: none;
    box-shadow: 0 0 0 0.15rem rgb(64, 36, 98, 0.85);
}


</style>
