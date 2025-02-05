<script setup>
import { useLayout } from '../composables/layout';
import { computed } from 'vue';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>
<footer class="text-white pt-4">
    <div class="container mt-1">
        <div class="row text-start"> <!-- Alineación a la izquierda -->
            <!-- Columna 1 -->
            <div class="col-md-2 mb-3">
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">About</a></li>
                    <li><a href="#" class="footer-link">Sobre Nosotros</a></li>
                    <li><a href="#" class="footer-link">Contáctanos</a></li>
                </ul>
            </div>
            <!-- Columna 2 (Ahora alineada a la izquierda también) -->
            <div class="col-md-6 mb-3">
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Recourses</a></li>
                    <li><a href="#" class="footer-link">Formularios</a></li>
                    <li><a href="#" class="footer-link">Rankings</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <!-- Sección de Redes Sociales (Ahora alineada a la izquierda) -->
        <div class="footer-social text-start">
            <span>Síguenos</span>
            <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-tiktok"></i></a>
        </div>

        <hr class="footer-divider">

        <p class="footer-text text-center">Copyright © 2025, Quizoot! All Rights Reserved.</p>
    </div>
</footer>
</template>

<style scoped>
/* Estilos generales del footer */
footer {
    font-family: Arial, sans-serif;
    text-align: left; /* Alineación global a la izquierda */
    padding-bottom: 20px; /* Más espacio en la parte final */
    background-color: #4B4B4B;
}

/* Links del footer */
.footer-link {
    color: white;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
}

.footer-link:hover {
    color: #bbb;
}

/* Línea divisoria */
.footer-divider {
    border: 0.5px solid #000000;
    margin: 10px 0;
}

/* Sección de redes sociales */
.footer-social {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Alineado a la izquierda */
    gap: 200px;
    padding: 10px 0;
}

/* Título "Síguenos" */
.footer-title {
    font-weight: bold;
    font-size: 16px;
    margin-right: 10px;
}

/* Iconos de redes sociales */
.social-icon {
    font-size: 18px; /* Tamaño aún más pequeño */
    color: white;
    transition: color 0.3s;
}

.social-icon:hover {
    color: #bbb;
}

/* Texto del copyright */
.footer-text {
    font-size: 15px;
    margin-top: 10px;
    text-align: center;
    font-family: "Atma";
}
</style>
