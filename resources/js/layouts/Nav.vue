<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link to="/" class="navbar-brand">DAW 2</router-link>
            <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <LocaleSwitcher />
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link" aria-current="page"><Button severity="help" variant="text">{{ $t('home') }}</Button></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name : 'public-posts.index'}" severity="help" class="nav-link"><Button severity="help" variant="text">Blog</Button></router-link>
                        </li>
                    <template v-if="!authStore().user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login"
                            ><Button severity="help" variant="text">{{ $t('login') }}</Button></router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/register"><Button severity="help" variant="text">{{ $t('register') }}</Button></router-link>
                        </li>
                    </template>
                    <li v-if="authStore().user?.name" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <Button severity="help" variant="text">{{ authStore().user?.name }}</Button>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                            <li><router-link to="/admin/posts" class="dropdown-item">Post</router-link></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                        </ul>
                    </li>
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
.p-button-text.p-button-help {
    color: #000000;
}
.navbar-nav .nav-link.active{
    color: #913595;
    background-color: #d8bfd8;
    border-radius: 10px;
}

</style>
