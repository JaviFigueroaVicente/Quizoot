<template>
    {{ usuarios }}
    <h2>{{ test }}</h2>
    <input v-model="test" />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="usuario in usuarios" :key="usuario.id">
                <td>{{ usuario.id }}</td>
                <td>{{ usuario.nombre }}</td>
                <td>{{ usuario.surname }}</td>
                <td>{{ usuario.email }}</td>
                <td>
                    <router-link :to="{ name: 'usuarios.edit', params: { id: usuario.id } }" class="me-2">
                        <i class="pi pi-pencil"></i>
                    </router-link>
                    <a @click.prevent="deleteUsuario(usuario.id)"><i class="pi pi-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const usuarios = ref([]);
const test = ref('hola');

onMounted(() => {
    axios.get('/api/usuarios')
        .then(response => {
            usuarios.value = response.data.data;
            console.log(response.data.data);
        });
});

const deleteUsuario = (id) => {
    if (confirm("¿Seguro que quieres eliminar este usuario?")) {
        axios.delete(`/api/usuarios/${id}`)
            .then(() => {
                usuarios.value = usuarios.value.filter((usuario) => usuario.id !== id);
            })
            .catch((error) => {
                console.error("Error al eliminar usuario:", error);
            });
    }
};
</script>

<style scoped>
/* Styles (if needed) */
</style>
