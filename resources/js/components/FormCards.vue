<template>
    <div class="row row-cols-3 g-4 mt-3 ">
        <div v-if="formularios.length === 0" class="col-12 text-center">
            <p>No hay formularios disponibles.</p>
        </div>
        <div class="col" v-for="formulario in formularios" :key="formulario.id">
            <router-link :to="{ name: 'forms.details', params: { id: formulario.id }}">
                <div class="card text-center p-3">
                    <img :src="formulario.original_image ? formulario.original_image : '/images/placeholder.jpg'" alt="Formulario 1" class="form-image">
                    <p class="mt-2">{{ formulario.name }}</p>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script setup>
    defineProps({
        formularios: Array
    });
</script>
    

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
