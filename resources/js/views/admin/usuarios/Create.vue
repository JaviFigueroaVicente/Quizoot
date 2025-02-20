<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Crear Usuario</h4>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" v-model="usuario.nombre">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="surname" v-model="usuario.surname">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" v-model="usuario.email">
        </div>
        <router-link :to="{ name: 'usuarios.index' }">
            <button type="submit" class="btn btn-primary" @click="onFormSubmit">Crear usuario</button>
        </router-link>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";

yup.setLocale(es);

const route = useRoute();
const usuario = ref({
    nombre: '',
    surname: '',
    email: ''
});

const schema = yup.object().shape({
    nombre: yup.string().required(),
    email: yup.string().required(),
    surname: yup.string()
});

const createUsuario = async () => {
    try {
        const response = axios.post('/api/usuarios', usuario.value);
        console.log(response);
    } catch (error) {
        console.error(error);
    }
};

onMounted(async () => {
    if (route.params.id) {
        try {
            const response = axios.get(`/api/usuarios/${route.params.id}`);
            usuario.value = response.data;
        } catch (error) {
            console.error(error);
        }
    }
});
 
const onFormSubmit = async () => {
    try {
        schema.validate(usuario.value, { abortEarly: false });
        createUsuario();
    } catch (validationError) {
        console.error(validationError);
    }
};
</script>
<style scoped>

</style>