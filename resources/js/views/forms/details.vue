<template>
    <!-- Mostrar antes de tener los datos cargados -->
    <div class="mt-5 mb-5" v-if="isLoading">
        <div class="container d-flex align-center gap-2">
            <router-link :to="{name: 'forms.index'}" class="migas">Formularios</router-link>
            <p>></p>
            <p>{{ formulario.name }}</p>
        </div>     
        <h1 class="container fw-bolder text-left">DETALLES DEL FORMULARIO</h1>
        <div class="container my-2">
            <div class="row" v-if="formulario">
                <!-- Left Section -->
                <div class="col-md-4 left-section">
                    <Skeleton height="335px"></Skeleton>
                    
                    <Skeleton class="fw-bold mb-1 mt-3" height="40px"></Skeleton>
                    <Skeleton class="mt-2" height="18px"></Skeleton>
                    <Skeleton class="d-flex flex-wrap text-start w-20 mt-2 mb-4" borderRadius="25px" height="30px"></Skeleton>
                    <Skeleton class="btn mb-3 w-100 text-center mt-10" height="30px"></Skeleton>
                    <!-- Sección Derecha: Ranking -->
                    <div class="ranking-container mt-10 mb-2">
                        <Skeleton class="ranking-title" height="5rem"></Skeleton>
                    </div>
                </div>
                
                <!-- Right Section -->
                <div class="col-md-8 right-section">
                    <Skeleton height="45rem"></Skeleton>
                </div>
            </div>
        </div>
    </div>
    <!-- Mostrar después de cargar los datos -->
    <div class="mt-5 mb-5" v-else>
        <div class="container d-flex align-center gap-2">
            <router-link :to="{name: 'forms.index'}" class="migas">Formularios</router-link>
            <p>></p>
            <p>{{ formulario.name }}</p>
        </div>
        <h1 class="container fw-bolder text-left">DETALLES DEL FORMULARIO</h1>
        <div class="container my-2">
            <div class="row" v-if="formulario">
                <!-- Left Section -->
                <div class="col-md-4 left-section">
                    <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="form-image">
                    <img v-else src="/images/placeholder.jpg" alt="Placeholder" class="form-image">
                    <h3 class="fw-bold mb-1 mt-3">{{ formulario.name }}</h3>
                    <p class="mt-1">{{ formulario.description }}</p>
                    <div class="d-flex flex-wrap text-start w-100">
                        <span v-for="category in formulario.categories" :key="category.id" class="category-decoration">
                            {{ category.name }}
                        </span>
                    </div>
                    <router-link :to="{name:'formIndividual'}"><button class="btn btn-lila mb-3 w-100 text-center">Jugar Solo</button></router-link>
                    <!-- Sección Derecha: Ranking -->
                    <div class="ranking-container mb-2">
                        <h4 class="ranking-title">🏆 Ranking</h4>
                        <ul class="ranking-list">
                            <li v-for="rank in ranking.slice(0, 3)" :key="rank.user_id" class="ranking-item">
                                <img
                                    :src="rank.user.media?.[0]?.original_url || '/images/profile-placeholder.png'"
                                    alt="Foto de perfil"
                                    class="ranking-avatar"
                                />
                                <span class="ranking-info">
                                    {{ rank.user.name }} {{ rank.user.surname1 }} - {{ rank.score }} pts
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Right Section -->
                <div class="col-md-8 right-section">
                    <ul class="list-group">
                        <li v-for="(pregunta, index) in selectedPreguntas" :key="pregunta.id" class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div>
                                    <strong>{{ index + 1 }} - Pregunta: </strong><br>
                                    <span class="question-text">{{ pregunta.pregunta }}</span>
                                </div>
                                <button class="btn-ver-respuestas" @click="verRespuestas(pregunta)">
                                    Ver Respuestas
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Dialog para mostrar las respuestas de la pregunta -->
    <Dialog v-model:visible="dialogVisible" modal :draggable="false" :style="{ width: '30rem', padding: '15px', height: 'auto',backgroundImage: 'url(/images/forms/fondoVentana.jpeg)', backgroundPosition: 'center', backgroundSize: 'cover',}" pcCloseButton="">
        <template #header>
            <h2 class="dialog-title">RESPUESTAS</h2>
        </template>
        <div class="respuestas-dialog-body">
            <ul class="list-respuestas">
                <li v-for="respuesta in preguntaActual.respuestas" :key="respuesta.id" class="respuesta-item">
                    <div :class="respuesta.correcta == 1 ? 'respuesta-correcta' : 'respuesta-incorrecta'">
                        <i :class="respuesta.correcta == 1 ? 'pi pi-check' : 'pi pi-times'"></i>
                        <p>{{ respuesta.respuesta }}</p>
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
import { Skeleton } from 'primevue';

const dialogVisible = ref(false);
const preguntaActual = ref({});

const route = useRoute();
const { getForm, formulario, getFormPreguntas, selectedPreguntas, getRankingFormulario, ranking, isLoading } = useForms();

// Cargar datos del formulario
onMounted(() => {
    // console.log(route.params.id);    
    getFormPreguntas(route.params.id);
    getRankingFormulario(route.params.id);
    getForm(route.params.id);
});

// Llamar al Dialog
const verRespuestas= (pregunta)=>{
    preguntaActual.value = pregunta;
    dialogVisible.value = true;
}


</script>
<style scoped>
.migas{
    color: #874ECA;
}

.migas:hover{
    color: #402462;
    text-decoration: 1px solid underline;
}

h1 {
    margin-top: 25px;
    margin-bottom: 20px;
    color: #874ECA;
}
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
        height: 330px;
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

    .question-text {
        display: block;
        margin-top: 5px;
        font-size: 14px;
    }
    
    .col-md-4 h3,
    .col-md-4 button {
        text-align: left;
    }

    .category-decoration {
        background-color: #5e2ea5;
        color: #ffffff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 20px;
        margin-right: 5px;
        margin-top: -6px;
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

    .ranking-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #874ECA;
    }

    .ranking-info {
        font-size: 14px;
    }

    /* Secciones */
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

    /* Ver respuestas boton */
    .btn-ver-respuestas {
        background-color: #874ECA;
        color: white;
        border: none;
        font-size: 13px;
        font-weight: 500;
        padding: 8px 14px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        white-space: nowrap;
        font-family: 'Roboto', sans-serif;
    }

    .btn-ver-respuestas:hover {
        background-color: #402462;
    }

    /* Pestaña respuestas */
    .dialog-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 10px;
    }

    .list-respuestas {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin: 0;
        padding: 0;
    }

    .respuesta-item {
        padding: 10px 15px;
        border-radius: 10px;
        background-color: #f9f6ff;
        box-shadow: 0 2px 5px rgba(135, 78, 202, 0.1);
        transition: all 0.3s ease;
    }

    .respuesta-correcta,
    .respuesta-incorrecta {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 1.2rem;
    }

    .respuesta-correcta i {
        color: green;
        font-size: 1.5rem;
    }

    .respuesta-incorrecta i {
        color: red;
        font-size: 1.5rem;
    }

    .respuesta-item:hover {
        transform: scale(1.01);
        background-color: #efe5ff;
    }

    /* Responsive ajustes */
    @media (max-width: 992px) {
        .left-section {
            position: relative;
            top: unset;
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

    @media (max-width: 768px) {
        .list-group {
            max-height: 687px; 
            overflow-y: auto; 
        }
    }

    @media (max-width: 576px) {
        .row {
            flex-direction: column;
        }
    }

</style>
