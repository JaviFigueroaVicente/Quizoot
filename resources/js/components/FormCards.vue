<template>
<div class="row row-cols-3 g-4 mt-3 ">   <!-- Tarjetas de formularios con imágenes -->
    <div class="col" v-for="formulario in formularios" :key="formulario.id">
        <router-link :to="{ name: 'forms.details', params: { id: formulario.id }}">
            <div class="card text-center p-3">
                <img :src="formulario.original_image || '/images/placeholder.jpg'" alt="Formulario 1" class="form-image">
                <p class="mt-2">{{ formulario.name }}</p>
            </div>
        </router-link>
        <template>
            
        </template>
    </div>
</div>
</template>
<style scoped>
/* Tarjetas de formulario */
.card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

.card:hover {
    transform: translateY(-5px);
}

/* Imágenes de formularios */
.form-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
}
</style>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const formularios = ref([]);

onMounted(() => {
    axios.get('/api/formulario',{
        headers: {
                "content-type": "multipart/form-data"
        }})
        .then(response => {
            formularios.value = response.data.data;
            console.log(response.data.data);
        });
});

</script>

