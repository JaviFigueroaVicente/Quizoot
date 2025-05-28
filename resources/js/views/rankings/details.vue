<template>
    <div v-if="isLoading">
        <h1 class="container fw-bolder text-left">RANKING DEL FORMULARIO</h1>
        <div class="container-fluid px-3 my-2">
            <div class="row justify-content-center">
                <!-- Imagen Decorativa -->
                <div class="col-md-4 d-flex flex-column align-items-center left-section">
                    <Skeleton height="300px" class="skeleton"></Skeleton>
                    <Skeleton class="fw-bold mt-3 text-start w-100 skeleton" height="35px"></Skeleton>
                    <Skeleton class="text-start w-100 mt-2 skeleton" height="20px"></Skeleton>
                    <div class="d-flex flex-wrap gap-2 text-start w-10">
                        <Skeleton class="category-decoration mt-2 skeleton" height="30px" width="75px"></Skeleton>
                    </div>
                </div>

                <!-- Ranking Grande a la Derecha -->
                <div class="col-md-8 right-section">
                    <Skeleton class="ranking-container skeleton" height="45rem">
                    </Skeleton>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h1 class="container fw-bolder text-left">RANKING DEL FORMULARIO</h1>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Imagen Decorativa -->
                <div class="col-md-4 d-flex flex-column align-items-center left-section">
                    <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="img-fluid form-image">
                    <img v-else src="/images/placeholder.jpg" alt="Placeholder" class="form-image">
                    <h3 class="fw-bold mt-3 text-start w-100">{{ formulario.name }}</h3>
                    <p class="text-start w-100">{{ formulario.description }}</p>
                    <div class="d-flex flex-wrap gap-2 text-start w-100">
                        <span v-for="category in formulario.categories" :key="category.id" class="category-decoration">
                            {{ category.name }}
                        </span>
                    </div>
                </div>

                <!-- Ranking Grande a la Derecha -->
                <div class="col-md-8 right-section">
                    <div class="ranking-container">
                        <!-- Lista Jugadores -->
                        <h3 class="ranking-title">🏆 Top Players</h3>
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
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import useForms from '@/composables/forms';
import { Skeleton } from 'primevue';

const route = useRoute();
const router = useRouter();
const { getForm, getRankingFormulario, formulario, ranking, isLoading } = useForms();

onMounted(() => {
    getForm(route.params.id).then(() => {
        // console.log("Datos de formularios:", formulario.value);
    });
    getRankingFormulario(route.params.id).then(() => {
    // console.log("Datos de ranking:", ranking.value);
  });
});


</script>

<style scoped>

.skeleton{
    background-color: #cb9dff !important;
}

h1 {
    margin-top: 25px;
    margin-bottom: 20px;
    color: #ffffff;
    margin: 0;
    margin-left: 10%;
    margin-bottom: 20px;
}
.left-section {
    position: sticky;
    top: 20px;
    height: calc(100vh - 20px);
    padding-left: 10%;
}

.left-section h3, .left-section p, .left-section div {
    padding-left: 3%;
    color: #ffffff;
}

.right-section {
    padding-right: 10%;
}

.form-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

.category-decoration {
    background-color: #5e2ea5;
    color: #ffffff;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    margin-right: 2px;
}
/* Estilos de ranking */

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
    margin-left: 10px;
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

@media (max-width: 1440px) {
    .left-section {
       width: 40%;
    }

    .right-section {
        width: 60%;
    }

    .left-section h3, .left-section p, .left-section div {
        padding-left: 3%;
        color: #ffffff;
    }
    
    .left-section,
    .right-section{
        padding-right: 3%;
        padding-left: 3%;
    }

    h1{
        margin-left: 2%;
    }
}


/* Responsive de móvil */
@media (max-width: 786px) {
    .row {
        flex-direction: column;
    }

    .left-section {
        position: relative;
        height: auto;
        margin-bottom: 20px;
    }

    .left-section .left-section p, .left-section div {
        padding-left: 3%;
        color: #ffffff;
    }
    
    .ranking-container {
        height: auto;
        padding: 15px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .ranking-title {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .ranking-position {
        font-size: 18px;
    }

    .ranking-name {
        font-size: 16px;
    }

    .ranking-score {
        font-size: 16px;
    }

    .ranking-item {
        font-size: 16px;
    }

    .category-decoration {
        font-size: 12px;
    }

    .form-image {
        max-height: 250px;
    }
    .left-section,
    .right-section{
        padding-right: 3%;
        padding-left: 3%;
        width: 100%;
    }

    h1{
        margin-left: 3%;
    }
}

</style>