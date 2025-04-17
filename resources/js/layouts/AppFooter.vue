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
    <!-- Sección de Logo -->
    <div class="container mt-1">
      <div class="row text-center">
        <div class="col-md-12 mb-3 d-flex justify-content-center align-items-center">
          <a href="/">
            <img src="/images/Nav/Logo.webp" alt="Logo" class="footer-logo">
          </a>
        </div>
      </div>
      <hr class="footer-divider">

      <!-- Sección de Enlaces de Columnas -->
      <div class="row text-start footer-columns">
          <ul class="list-unstyled d-flex align-items-center justify-content-evenly">
            <li class="mb-2"><a href="#" class="footer-link">About</a></li>
            <li class="mb-2"><a href="#" class="footer-link">Sobre Nosotros</a></li>
            <li class="mb-2"><a href="#" class="footer-link">Contáctanos</a></li>
            <li class="mb-2"><a href="#" class="footer-link">Recourses</a></li>
            <li class="mb-2"><a href="#" class="footer-link">Formularios</a></li>
            <li class="mb-2"><a href="#" class="footer-link">Rankings</a></li>
          </ul>
      </div>

      <hr class="footer-divider">

      <!-- Sección de Redes Sociales -->
      <div class="footer-social display-flex justify-content-evenly">
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
footer {
  font-family: Arial, sans-serif;
  text-align: left;
  padding-bottom: 20px;
  background-color: #6b6b6b;
  overflow-x: hidden;
}

.footer-link {
  color: white;
  text-decoration: none;
  font-size: 14px;
  transition: color 0.3s;
}

.footer-link:hover {
  color: #bbb;
}

.footer-divider {
  border: 0.5px solid #000000;
  margin: 10px 0;
}

.footer-social {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 20px;
  padding: 10px 0;
  flex-wrap: wrap;
}

.footer-title {
  font-weight: bold;
  font-size: 18px;
  margin-right: 10px;
}

.footer-social span {
  font-size: 25px;
  white-space: nowrap;
}

.social-icon {
  font-size: 25px; 
  color: white;
  transition: color 0.3s;
}

.social-icon:hover {
  color: #bbb;
}

.footer-text {
  font-size: 15px;
  margin-top: 15px;
  text-align: center;
  font-family: "Atma";
}

.footer-columns {
  margin-top: 30px;
  overflow-x: hidden;
}

.footer-columns li a {
  font-size: 18px;
}

@media (max-width: 767px) {
  .footer-columns ul {
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }

  .footer-social {
    justify-content: center;
  }

  .footer-social span {
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
  }
}
</style>
