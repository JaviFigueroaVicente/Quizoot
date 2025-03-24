<template>
    <div class="mt-5 mb-5">
        <div class="container my-2">
            <div class="row" v-if="formulario">
                <!-- Left Section -->
                <div class="col-md-4 left-section">
                    <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="form-image">
                    <img v-else src="images/placeholder.png" alt="Placeholder" class="form-image">
                    <h3 class="fw-bold mb-1 mt-2">{{ formulario.name }}</h3>
                    <p>{{ formulario.description }}</p>
                    <router-link :to="{name:'formIndividual'}"><button class="btn btn-lila mb-3">Jugar Solo</button></router-link>
                    <!-- Sección Derecha: Ranking -->
                    <div class="ranking-container mb-2">
                        <h4 class="ranking-title">🏆 Ranking</h4>
                        <ul class="ranking-list">
                            <li class="ranking-item">
                                <span class="ranking-position">🥇</span> John Doe - 95 pts
                            </li>
                            <li class="ranking-item">
                                <span class="ranking-position">🥈</span> Jane Smith - 90 pts
                            </li>
                            <li class="ranking-item">
                                <span class="ranking-position">🥉</span> Alice Johnson - 85 pts
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Right Section -->
                <div class="col-md-8 right-section">
                    <ul class="list-group">
                        <li v-for="(pregunta, index) in selectedPreguntas" :key="pregunta.id" class="list-group-item">
                            <strong>{{ index + 1 }} - Pregunta: </strong>
                            <br>
                            <span class="question-text">{{ pregunta.pregunta }}</span>
                            <button class="ver-respuestas" @click="verRespuestas(pregunta)">
                                Ver Respuestas
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div v-else class="col-md-4 left-section">
                <p>Cargando formulario...</p>
            </div>
        </div>
    </div>

    <Dialog v-model:visible="dialogVisible" modal :style="{ width: '30rem', padding: '15px', height: 'auto' }" pcCloseButton="">
        <template #header>
            <h2><strong>Respuestas</strong></h2>
        </template>
        <div class="flex items-center gap-4 mb-8">
            <ul class="list-respuestas">
                <li v-for="respuesta in preguntaActual.respuestas" :key="respuesta.id">
                    <div v-if="respuesta.correcta == 1">
                        <i class="pi pi-check" style="color: green;"></i>
                        <p>{{respuesta.respuesta}}</p>
                    </div>
                    <div v-else>
                        <i class="pi pi-times" style="color: red;"></i>
                        <p>{{respuesta.respuesta}}</p>
                    </div>                
                </li>
            </ul>
        </div>
    </Dialog>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import useForms from '@/composables/forms';

const dialogVisible = ref(false);
const preguntaActual = ref({});

const route = useRoute();
const { getForm, formulario, getFormPreguntas,selectedPreguntas } = useForms();

onMounted(() => {
    console.log(route.params.id);
    getForm(route.params.id);
    getFormPreguntas(route.params.id);
});

const verRespuestas= (pregunta)=>{
    preguntaActual.value = pregunta;
    dialogVisible.value = true;
}


</script>
<style scoped>
    .btn-lila {
        background-color: #874ECA;
        color: white;
        border: none;
        font-size: 14px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-lila:hover {
        background-color: #402462;
    }

    .form-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
    }

    .list-respuestas {
        list-style: none;
        gap: 30px;
        margin: 30px;
    }

    .list-respuestas div{
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .list-respuestas p{
        font-size: 1.75rem;
    }


    .list-group {
        border: 2px solid #874ECA;
        background-color: white;
        margin-bottom: 8px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        color: #333;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
    }

    .question-text {
        display: block;
        margin-top: 5px;
        font-size: 14px;
    }
    
    .col-md-4 h3,
    .col-md-4 button {
        text-align: left;
    }

    /* Ranking */
    .ranking-container {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); 
    }

    .ranking-title {
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
        font-size: 16px;
    }

    .ranking-list {
        list-style: none;
        padding: 0;
    }

    .ranking-item {
        padding: 6px;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .ranking-item:last-child {
        border-bottom: none;
    }

    .ranking-position {
        font-size: 16px;
        font-weight: bold;
    }

    .left-section {
        position: sticky;
        top: 20px;
        height: calc(100vh - 20px);
    }

    .right-section {
        max-height: calc(100vh - 110px);
        overflow-y: auto;
    }

    .right-section::-webkit-scrollbar {
    width: 10px;
    }

    .right-section::-webkit-scrollbar-thumb {
        background-color: #874eca;
        border-radius: 5px;
    }

    .right-section::-webkit-scrollbar-thumb:hover {
        background-color: #402462;
    }

    @media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .left-section {
        position: relative;
        height: auto;
        margin-bottom: 20px; 
    }

    .right-section {
        max-height: none; 
        overflow-y: visible; 
    }

    .list-group {
        max-height: 400px; 
        overflow-y: auto; 
    }
}

</style>
