<template>
    <div class="mt-7 mb-6">
        <div class="container my-2">
            <div class="row">
                <!-- Imagen Decorativa -->
                <div class="col-md-4 d-flex flex-column align-items-center left-section">
                    <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="img-fluid form-image">
                    <img v-else src="/images/placeholder.jpg" alt="Placeholder" class="form-image">
                    <h3 class="fw-bold mt-3">{{ formulario.name }}</h3>
                    <p>{{ formulario.description }}</p>
                </div>

                <!-- Ranking Grande a la Derecha -->
                <div class="col-md-8 ranking-container">
                    <h3 class="ranking-title">🏆 Top Players</h3>
                    <!-- Lista de Ranking Desplazable -->
                    <div class="ranking-list-container">
                        <ul class="ranking-list">
                            <li v-for="(rank, index) in ranking" :key="rank.user_id" class="ranking-item">
                                <div v-if="index%2 === 0" class="ranking-item-impar">
                                    <span class="ranking-position">{{ index + 1 }}</span>
                                    <img v-if="rank.user.media && rank.user.media.length > 0" :src="rank.user.media[0].original_url" :alt="rank.user.name" alt="">
                                    <img v-else src="/images/Nav/PerfilSinFoto.webp" alt="">
                                    <span class="ranking-name">{{ rank.user.name }} {{ rank.user.surname1 }}</span>
                                    <span class="ranking-score">{{ rank.score }} pts</span>
                                </div>
                                <div v-else>
                                    <span class="ranking-position">{{ index + 1 }}</span>
                                    <img v-if="rank.user.media && rank.user.media.length > 0" :src="rank.user.media[0].original_url" :alt="rank.user.name" alt="">
                                    <img v-else src="/images/Nav/PerfilSinFoto.webp" alt="">
                                    <span class="ranking-name">{{ rank.user.name }} {{ rank.user.surname1 }}</span>
                                    <span class="ranking-score">{{ rank.score }} pts</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import useForms from '@/composables/forms';

const route = useRoute();
const router = useRouter();
const { getForm, getRankingFormulario, formulario, ranking } = useForms();

onMounted(() => {
    getForm(route.params.id).then(() => {
        console.log("Datos de formularios:", formulario.value);
    });
    getRankingFormulario(route.params.id).then(() => {
    console.log("Datos de ranking:", ranking.value);
  });
});


</script>

<style scoped>
.left-section {
    position: sticky;
    top: 20px;
    height: calc(100vh - 20px);
    text-align: center;
}

.form-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

.ranking-container {
    background: #874eca;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
    text-align: center;
    height: 600px;
    display: flex;
    flex-direction: column;
}

.ranking-list-container {
    max-height: 500px;
    overflow-y: auto;
    padding-right: 15px;
}

.ranking-list-container::-webkit-scrollbar {
    width: 10px;
}

.ranking-list-container::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 5px;
}

.ranking-list-container::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255, 255, 255, 0.7);
}

.ranking-item div{
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
}

.ranking-title {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 15px;
}

.ranking-list {
    list-style: none;
    padding: 0;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

.ranking-list img{
    height: 50px;
    width: 50px;
    border-radius: 25px;
}

.ranking-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 18px;
}

.ranking-item-impar {
    background-color: rgba(255, 255, 255, 0.1);
}

.ranking-position {
    font-size: 22px;
    font-weight: bold;
    flex-shrink: 0;
    width: 40px;
    text-align: center;
}

.ranking-name {
    flex-grow: 1;
    text-align: left;
    padding-left: 10px;
}

.ranking-score {
    font-weight: bold;
    font-size: 18px;
    color: #ffffff;
    padding-right: 10px;
    text-align: right;
}

@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .left-section {
        position: relative; /* Evita que quede fija */
        height: auto;
        margin-bottom: 20px;
    }

    .ranking-container {
        height: auto; /* Permite que crezca según el contenido */
        padding: 15px;
        margin-top: 20px;
    }

    .ranking-list-container {
        max-height: 320px; /* Evita que sea demasiado larga */
        overflow-y: auto; /* Permite desplazamiento */
    }
}

</style>