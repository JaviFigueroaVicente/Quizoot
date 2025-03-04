<template>
    <div class="mt-5 mb-5">
        <div class="container my-2">
            <div class="row" v-if="formulario">
                <!-- Left Section -->
                <div class="col-md-4 left-section" >
                    <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="form-image">
                    <img v-else src="images/placeholder.png" alt="Placeholder" class="form-image">
                    <h3 class="fw-bold mb-1 mt-2">{{ formulario.name }}</h3>
                    <p>{{ formulario.description }}</p>
                    <button class="btn btn-lila mb-3">Jugar Solo</button>
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
                        <li class="list-group-item">1 - Question 1<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">2 - Question 2<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">3 - Question 3<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">4 - Question 4<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">5 - Question 5<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">6 - Question 6<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">7 - Question 7<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">8 - Question 8<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">9 - Question 9<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">10 - Question 10<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">11 - Question 1<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">12 - Question 2<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">13 - Question 3<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">14 - Question 4<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">15 - Question 5<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">16 - Question 6<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">17 - Question 7<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">18 - Question 8<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">19 - Question 9<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                        <li class="list-group-item">20 - Question 10<br><span class="question-text">This is an example of what the question might look like, it will improve later ???</span></li>
                    </ul>
                </div>
            </div>
            <div v-else class="col-md-4 left-section">
                <p>Cargando formulario...</p>
            </div>
        </div>
    </div>
</template>
<script setup>
import {ref, onMounted} from "vue";
import {useRoute} from "vue-router";
import useForms from "@/composables/forms";

const route = useRoute();
const {getForm, formulario} = useForms();

onMounted(() => {
    console.log(route.params.id);
    getForm(route.params.id);
    })
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

    /* Fixed Left Section */
    .left-section {
        position: sticky;
        top: 20px;
        height: calc(100vh - 20px);
    }

    .right-section {
        max-height: calc(100vh - 110px);
        overflow-y: auto;
    }
</style>
