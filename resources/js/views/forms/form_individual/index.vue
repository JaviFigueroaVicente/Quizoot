<template>
    <section class="container">
        
        <img src="/images/Home/Fondo_Home.webp" class="background-image" />
        <section class="white-section">
            <div class="header">
                <Timeline :value="selectedPreguntas.preguntas_count" layout="horizontal" class="custom-timeline">
                    <template #marker="formulario">
                        <span class="p-p-2 p-rounded-full" :style="{ backgroundColor: '#607D8B', color: '#ffffff' }">
                        1
                        </span>
                    </template>
                    <!-- <template #content="formulario">
                        <p>{{ formulario.pregunta }}</p>
                    </template> -->
                </Timeline>
                <router-link to="/forms" class="navbar-brand">
                    <img src= "/images/Nav/Logo.webp" alt="Logo" class="logo-nav">
                </router-link>
                <h2>Pregunta 1:</h2>
            </div>
            <p>{{ formulario.pregunta }}</p>
        </section>
        <section class="buttons-section">
            <button class="kahoot-button red">Respuesta 1</button>
            <button class="kahoot-button blue">Respuesta 2</button>
            <button class="kahoot-button green">Respuesta 3</button>
            <button class="kahoot-button yellow">Respuesta 4</button>
        </section>
        <router-link to="/forms" class="exit-button">Abandonar</router-link>
    </section>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import useForms from '@/composables/forms';


const route = useRoute();
const { getForm, formulario, getFormPreguntas,selectedPreguntas } = useForms();

onMounted(() => {
    console.log(route.params.id);
    getForm(route.params.id);
    getFormPreguntas(route.params.id);
});
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: stretch;
    height: 100vh;
    width: 100vw;
    position: fixed;
    top: 0;
    left: 0;
    padding: 0;
}

.background-image {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    filter: brightness(50%);
}

.white-section {
    position: relative;
    top: 0;
    left: 0;
    width: 100vw;
    background-color: white;
    z-index: 1;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
    background: rgba(255, 255, 255, 0.9);
    max-height: 80vh;
}

.header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    width: 100%;
    position: relative;
}

.logo-nav {
    height: 60px;
}

.header h2 {
    font-size: 2.5rem;
    color: #333;
    margin: 0;
}

.white-section p {
    font-size: 1.2rem;
    color: #666;
    line-height: 1.6;
    margin-top: 20px;
}

.buttons-section {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 20px;
    justify-items: stretch;
    width: 100vw;
    padding: 0 20px;
}

@media (max-width: 768px) {
    .buttons-section {
        grid-template-columns: repeat(1, 1fr);
    }

    .white-section {
        margin-top: 50px;
    }
}

.kahoot-button {
    font-size: 2rem;
    padding: 40px 80px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}

.kahoot-button.red {
    background-color: #FF6347;
    color: white;
}

.kahoot-button.blue {
    background-color: #1E90FF;
    color: white;
}

.kahoot-button.green {
    background-color: #32CD32;
    color: white;
}

.kahoot-button.yellow {
    background-color: #FFD700;
    color: black;
}

.kahoot-button:hover {
    background-color: #874eca;
    transform: scale(1.02);
}

.exit-button {
    position: fixed;
    top: 20px;
    right: 20px;
    font-size: 1.2rem;
    color: white;
    text-decoration: none;
    background-color: #e84118;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
    font-weight: normal;
}

.exit-button:hover {
    background-color: #c23616;
}
</style>
