<template>
    <h1>Hola</h1>
    {{ usuarios }}
    <h2>{{ test }}</h2>
    <input v-model="test">
    <DataTable :value="usuarios" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"  tableStyle=" min-width: 50rem">
        <Column field="id" header="ID"></Column>
        <Column field="name" header="Nombre"></Column>
        <Column field="surname" header="Apellido"></Column>
        <Column field="email" header="Email"></Column>
    </DataTable>

    <li v-for="usuario in usuarios" :key="usuario.id">
        {{ usuario.name }}
    </li>
</template>

<script setup>
    import {ref, onMounted} from "vue";

    const usuarios = ref([]);

    onMounted( () => {
        axios.get('/api/usuarios')
            .then (response => {
                usuarios.value = response.data.data;
                console.log(response.data.data);
            })
    });
    const test = ref('hola');

</script>

<style scoped>
    
</style>s