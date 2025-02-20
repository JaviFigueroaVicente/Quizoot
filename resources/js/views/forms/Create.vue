<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Crear Formulario</h4>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Formulario</label>
            <input type="text" class="form-control" id="name" v-model="formulario.name">
        </div>
        <div class="mb-3">
            <label for="total_preguntas" class="form-label">total_preguntas</label>
            <input type="number" class="form-control" id="total_preguntas" v-model="formulario.total_preguntas">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" v-model="formulario.description">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen:</label>
            <input type="file" class="form-control" id="image" @change="onFileChange">
        </div>
        <button type="submit" class="btn btn-primary" @click="onFormSubmit">Crear formulario</button>
    </div>

</template>

<style scoped>

</style>
<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import * as yup from "yup";
import { es, id } from "yup-locales";
import { authStore } from "@/store/auth";

yup.setLocale(es);

const route = useRoute();
const store = authStore();

const formulario = ref({
    id: '',
    name: '',
    total_preguntas: '',
    description: '',
    user_id: store.user.id,    
    image: '',
});

const onFileChange = (event) => {
    formulario.value.image = event.target.files[0]; 
};

const schema = yup.object({
    name: yup.string().required(),
    total_preguntas: yup.number().required(),
    description: yup.string().required()
});

const createFormulario = async () => {
    try {
        const response = axios.post('/api/formulario', formulario.value);
        console.log(response);
    } catch (error) {
        console.error(error);
    }
};

const onFormSubmit = async () => {
    try {
        schema.validate(formulario.value, { abortEarly: false });
        createFormulario();
    } catch (validationError) {
        console.error(validationError);
    }
};
</script>