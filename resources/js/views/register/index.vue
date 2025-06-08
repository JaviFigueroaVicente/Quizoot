<template>
    <div class="container">
        <div class="video-fondo-div">
            <video class="video-fondo" src="/images/Home/fondo3.mp4" autoplay="true" muted="true" loop="true"></video>        
        </div> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form @submit.prevent="submitRegister">
                            <div class="">
                                <span class="title center">REGISTER</span>
                                <div class="input-form mb-4 mt-3"> 
                                    <input v-model="registerForm.name" id="name" type="text" class="form-control" placeholder="">
                                    <label for="name" class="form-label">{{ $t('name') }}</label>
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.name">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form mb-4">
                                    <input v-model="registerForm.email" id="email" type="email" class="form-control" placeholder="" autocomplete="username">
                                    <label for="email" class="form-label">{{ $t('email') }}</label>
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.email">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form mb-4">
                                    <input v-model="registerForm.password" id="password" type="password" class="form-control" placeholder="" autocomplete="current-password">
                                    <label for="password" class="form-label">
                                        {{ $t('password') }}
                                    </label>
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.password">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="input-form mb-6">
                                    <input v-model="registerForm.password_confirmation" id="password_confirmation" type="password" placeholder="" class="form-control" autocomplete="current-password">
                                    <label for="password_confirmation" class="form-label">
                                        {{ $t('confirm_password') }}
                                    </label>
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password_confirmation">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
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
</template>

<script setup>

import useAuth from '@/composables/auth'

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

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
    color: #ffffff;
    font-family: "Atma";
    font-size: 40px;
    font-weight: bold;
}
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.card {
    z-index: 2; 
    background-color: #402462d7;
    margin-top: 10%;
    padding: 40px;
}


button{
    background-color: #874eca;
    border: none;
    width: 100%;
    height: 50px;
}

button:hover{
    background-color: #402462;
}

.input-form {
 position: relative;
}

.form-control {
 border: solid 1.5px #9e9e9e !important;
 background: #e8e8e850;
 padding: 1rem;
 font-size: 1rem;
 color: #f5f5f5;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
}

.form-label {
 position: absolute;
 left: 15px;
 color: #e8e8e8;
 pointer-events: none;
 transform: translateY(-2.5rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.form-control:focus, .form-control:not(:placeholder-shown) {
 outline: none;
 border: 1.5px solid #874eca;
 box-shadow: none;
}

.form-control:focus ~ label, .form-control:not(:placeholder-shown) ~ label {
 transform: translateY(-280%) scale(0.8) !important;
 background-color: transparent;
 padding: 0 .2em;
 color: #ffffff;
 box-shadow: none;
}


</style>
