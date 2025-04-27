<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        {{ authStore().user.value }}
        <div class="container">
            <!-- Logo a la izquierda -->
            <a href="/" class="navbar-brand">
                <img src="/images/Nav/Logo.webp" alt="Logo" class="logo-nav">
            </a>

            <!-- Foto de usuario en el centro (en pantallas pequeñas) -->
            <div class="nav-center d-md-none">
                <div v-if="authStore().user?.name" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="user-btn">
                            <img :src="authStore().user?.avatar || '/images/Nav/PerfilSinFoto.webp'" alt="Foto Perfil">
                        </button>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><router-link class="dropdown-item" to="/app/profile">Perfil</router-link></li>
                        <li v-if="authStore().user?.roles[0].name === 'admin'"><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                        <li><router-link to="/profile/mis-formularios" class="dropdown-item">Mis formularios</router-link></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                    </ul>
                </div>
                <template v-if="!authStore().user?.name">
                    <router-link class="nav-link button-login" to="/login">{{ $t('login') }}</router-link>
                    <router-link class="nav-link button-jugar" to="/register">{{ $t('register') }}</router-link>
                </template>
            </div>

            <!-- Botón de hamburguesa para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido colapsable para pantallas grandes -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" @click="playRandomForm"><Button variant="text" class="button-jugar">Jugar</Button></a>
                    </li>
                    <li class="nav-item">
                        <router-link to="/forms" severity="help" class="nav-link"><Button :class="{'active': $route.path === '/forms'}" severity="help" variant="text">Formularios</Button></router-link>
                    </li>            
                    <li class="nav-item">
                        <router-link to="/rankings" severity="help" class="nav-link"><Button :class="{'active': $route.path === '/rankings'}" severity="help" variant="text">Rankings</Button></router-link>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto nav-right">    
                    <!-- Foto de usuario en la parte derecha para pantallas grandes -->
                    <li v-if="authStore().user?.name" class="nav-item dropdown d-none d-md-block">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <button><img :src="authStore().user?.avatar || '/images/Nav/PerfilSinFoto.webp'" alt="Foto Perfil"></button>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><router-link class="dropdown-item" to="/profile">Perfil</router-link></li>
                            <li v-if="authStore().user?.roles[0].name === 'admin'"><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                            <li><router-link to="/profile/mis-formularios" class="dropdown-item">Mis formularios</router-link></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                        </ul>
                    </li>
                    <template v-if="!authStore().user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link button-login" to="/login">{{ $t('login') }}</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link button-jugar" to="/register">{{ $t('register') }}</router-link>
                        </li>
                    </template>
                    <LocaleSwitcher class="locale-switcher" />
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import useAuth from "@/composables/auth";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import { authStore } from "../store/auth";
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';
import useForms from '@/composables/forms';

const { processing, logout } = useAuth();
const router = useRouter();
const { formularios, getForms } = useForms();

const playRandomForm = async () => {
    await getForms()  
    if (!formularios.value || formularios.value.length === 0) {
        console.error("No hay formularios disponibles.");
        return;
    }
    
    const randomForm = formularios.value[Math.floor(Math.random() * formularios.value.length)];

    if (!randomForm || !randomForm.id) {
        console.error("Formulario aleatorio no encontrado.");
        return;
    }
    
    router.push(`/forms/details/${randomForm.id}`);
};

onMounted(() => {
    getForms()
})



</script>

<style scoped>
.nav-link button.active {
    color: #874ECA;
    border-radius: 0px; 
    border-bottom: 2px solid #874ECA; 
}
.dropdown-item.active, .dropdown-item:active {
    background-color: #874ECA !important;
}
.dropdown-item.active, .dropdown-item:active {
    background-color: #874ECA !important;
}
.navbar {
    padding: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

button, .nav-link {
    font-size: 20px;
    font-weight: 500;
}

nav .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 100%;
}

.logo-nav {
    width: 60px;
    height: 60px;
}

.nav-center {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-center img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.nav-center .user-btn {
    border: none;
    background-color: transparent;
    cursor: pointer;
    padding: 0;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-right img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.nav-right button {
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.button-jugar {
    color: #ffffff;
    border-radius: 10px;
    background-color: #874ECA;
}

.button-jugar:hover {
    background-color: #402462 !important;
    color: #ffffff !important;
}

.button-login {
    border: 1px solid #000000;
    border-radius: 10px;
    color: #000000;
    transition: all 0.2s ease;
}

.button-login:hover {
    background-color: #402462;
    color: #ffffff;
}

@media (max-width: 767px) {
    .nav-center {
        flex-direction: column;
        align-items: center;
    }

    .navbar-nav {
        width: 100%;
        text-align: center;
    }

    .navbar-toggler {
        border: none;
    }
}
</style>