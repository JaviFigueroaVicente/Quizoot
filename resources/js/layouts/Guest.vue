<template>
    <div v-if="home" class="home">
        <Navbar class="navbar"/>
        <router-view></router-view>
        <Footer v-if="mostrarFooter"></Footer>
    </div>
    <div v-else>
        <Navbar class="navbar"/>
        <router-view></router-view>
        <Footer v-if="mostrarFooter"></Footer>
    </div>
</template>
<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import Navbar from './Nav.vue'
import Footer from './AppFooter.vue'

const route = useRoute()

const mostrarFooter = computed(() => {
    return route.path !== '/login' && route.path !== '/register' && route.path !== '/contestarFormulario/:id'
})

const home = computed(() => {
    return route.path === '/'
})

</script>
<style scoped>
div{
    background-color: #402462d7;
}

.home {
    background-color: #ffffff !important;
}

.navbar{
    position: sticky;
    top: 0;
    z-index: 1000;
}
</style>