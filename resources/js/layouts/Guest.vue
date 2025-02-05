<template>
    <div>
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
    return route.path !== '/login' && route.path !== '/register'
})

</script>
<style scoped>
.navbar{
    position: sticky;
    top: 0;
    z-index: 1000;
}
</style>