<template>
    {{ usuarios }}
    <h2>{{ test }}</h2>
    <input v-model="test" />
    <router-link :to="{ name: 'usuarios.create' }" class="btn btn-primary">Crear Usuario</router-link>
    <DataTable :value="usuarios" paginator :rows="2" :rowsPerPageOptions="[2,5, 10, 20, 50]" tableStyle="min-width: 50rem">
        <Column field="id" header="ID" sortable></Column>
        <Column field="nombre" header="Nombre" sortable></Column>
        <Column field="surname" header="Apellido"></Column>
        <Column field="email" header="Email"></Column>
        <Column header="Acciones">
            <template #body="slotProps">
                <router-link :to="{ name: 'usuarios.edit', params: { id: slotProps.data.id } }" class="me-2">
                    <i class="pi pi-pencil"></i>
                </router-link>
                <a @click.prevent="deleteUsuario(slotProps.data.id)">
                    <i class="pi pi-trash"></i>
                </a>
            </template>
        </Column>
    </DataTable>


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
    <Toast/>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useToast } from "primevue/usetoast";
import { Column } from "primevue";

const usuarios = ref([]);
const test = ref('hola');
const toast = useToast();

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
                toast.add({
                    severity: "success",
                    summary: "Usuario Eliminado",
                    detail: "El usuario ha sido eliminado",
                    life: 3000,
                });
            })
            .catch((error) => {
                console.error("Error al eliminar usuario:", error);
            });
    }
};
</script>

<style scoped>

</style>
