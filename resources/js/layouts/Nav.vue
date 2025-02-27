<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link to="/" class="navbar-brand"><img src="/images/Nav/Logo.webp" alt="Logo" class="logo-nav"></router-link>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" aria-current="page"><Button variant="text" class="button-jugar">Jugar</Button></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/forms" severity="help" class="nav-link"><Button severity="help" variant="text">Formularios</Button></router-link>
                    </li>               
                    <li class="nav-item">
                        <router-link to="/rankings" severity="help" class="nav-link"><Button severity="help" variant="text">Rankings</Button></router-link>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto nav-right">    
                    <li v-if="authStore().user?.name" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <button><img :src="authStore().user?.avatar || '/images/Nav/PerfilSinFoto.webp'" alt="Foto Perfil"></button>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><router-link class="dropdown-item" to="/app/profile">Perfil</router-link></li>
                            <li><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                            <li><router-link to="/admin/posts" class="dropdown-item">Mis formularios</router-link></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                        </ul>
                    </li>
                    <template v-if="!authStore().user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link button-login" to="/login"
                            >{{ $t('login') }}</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link button-jugar" to="/register">{{ $t('register') }}</router-link>
                        </li>
                    </template>
                    <LocaleSwitcher />
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>

import useAuth from "@/composables/auth";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import { authStore } from "../store/auth";

const { processing, logout } = useAuth();
</script>

<style scoped>
.navbar{
    padding: 0;
}
li, button{
    font-size: 20px;
    font-weight: 500;
}

nav .container{
    margin: 0;
    max-width: 100%;
}
.p-button-text.p-button-help {
    color: #000000;
}
.navbar-nav .nav-link.active{
    color: #913595;
    background-color: #d8bfd8;
    border-radius: 10px;
}

.logo-nav{
    width: 60px;
    height: 60px;
}

.nav-right{
    display: flex;
    align-items: center;
    gap: 20px;
}
.nav-right img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.nav-right button{
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.button-jugar{
    color: #ffffff;
    border-radius: 10px;
    background-color: #874ECA;
}

.button-jugar:hover{
    background-color: #402462 !important;
    color: #ffffff !important;
}
.button-login{
    border: 1px solid #000000;
    border-radius: 10px;
    color: #000000;
    transition: all 0.2s ease;
}

.button-login:hover{
    border: 1px solid #000000;
    background-color: var(--p-button-text-help-hover-background);
    color: var(--p-button-text-help-color);
}
</style>
