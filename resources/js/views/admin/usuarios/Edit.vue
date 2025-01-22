<template>
    {{ usuario }}
    {{ errors }}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar Usuario</h4>
        </div>
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" v-model="usuario.id" readonly>
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
            <input type="email" class="form-control" id="email" v-model="usuario.email" readonly>
        </div>
        <router-link :to= "{name: 'usuarios.index'}">
            <button type="submit" class="btn btn-primary" @click="onFormSubmit">Guardar cambios</button>
        </router-link>
    </div>
    <Toast />
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router"; 
import { useToast } from "primevue/usetoast";
import * as yup from "yup";
import { es } from "yup-locales";

yup.setLocale(es);
const toast = useToast();
const route = useRoute();
const usuario = ref({});
const errors = ref({});

const schema = yup.object().shape({
    id: yup.number().required(),
    nombre: yup.string().required(),
    email: yup.string().required().email(),
    surname: yup.string().required(),
});

const updateUsuario = async () => {
    axios.put('/api/usuarios/' + route.params.id, usuario.value)
        .then((response) => {
            toast.add({
                severity: "success",
                summary: "Usuario Actualizado",
                detail: "El usuario ha sido actualizado",
                life: 3000,
            });
            usuario.value = response.data.data;
        })
};

onMounted(() => {
    console.log(route.params.id);

    axios.get('/api/usuarios/' + route.params.id)
        .then((response) => {
            usuario.value = response.data.data;
        })
});

const onFormSubmit = () => {
    schema.validate(usuario.value, { abortEarly: false })
        .then(() => {
            updateUsuario();
        })
};
</script>
