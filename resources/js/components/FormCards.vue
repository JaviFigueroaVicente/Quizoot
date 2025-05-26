<template>
    <!-- Parte del componente para mostrar formularios -->
    <div class="custom-grid g-4 mt-3">
        <div v-if="formularios.length === 0" class="col-12 text-center">
            <p>No hay formularios disponibles.</p>
        </div>
        <div class="col" v-for="formulario in formularios" :key="formulario.id">
            <router-link :to="{ name: 'forms.details', params: { id: formulario.id }}">
                <div class="card text-center p-3 h-100 d-flex flex-column justify-content-between">
                    <img :src="formulario.original_image ? formulario.original_image : '/images/placeholder.jpg'" alt="Formulario 1" class="form-image">
                    <p class="mt-2">{{ formulario.name }}</p>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script setup>
    // Definir los formularios que se cogeran
    defineProps({
        formularios: Array
    });
</script>

<style scoped>
.card {
    border: none;
    background-color: #b26fff ;
    border-radius: 10px;
    box-shadow: 0px 8px 0px 0px rgba(136, 78, 202, 0.5);
    transition: all 0.3s ease-in-out;
    color: #ffffff;
}

.card:hover {
    transform: translateY(5px);
    box-shadow: 0px 4px 0px 0px rgba(136, 78, 202, 0.5);
    background-color: #874ECA;
}

.card p {
    font-size: 16px;
}

.form-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
}

.custom-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

@media (max-width: 768px) {
    .custom-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>