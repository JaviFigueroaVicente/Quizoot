<template>
    <div>
        <Navbar class="navbar"/>
        <router-view></router-view>
        <Footer></Footer>
    </div>
</template>
<script setup>
import Navbar from './Nav.vue'
import Footer from './AppFooter.vue'
</script>
<style scoped>
.navbar{
    position: sticky;
    top: 0;
    z-index: 1000;
}
</style>