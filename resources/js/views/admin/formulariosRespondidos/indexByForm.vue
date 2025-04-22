<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <!-- Tabla de datos de los usuarios que han respondido el formulario con su respectivo score -->
                <DataTable v-model:filters="filters" :value="formulariosRespondidos" paginator :rows="5"
                            :globalFilterFields="['user_id', 'score', 'created_at', 'updated_at']" stripedRows size="small" dataKey="formulario_id">
                    <template #header>
                        <Toolbar pt:root:class="toolbar-table">
                            <template #start>
                                <IconField >
                                    <InputIcon class="pi pi-search"> </InputIcon>
                                    <InputText v-model="filters['global'].value" placeholder="Buscar" />
                                </IconField>
                                <Button type="button" icon="pi pi-filter-slash" label="Clear" class="ml-1" outlined @click="initFilters()" />
                                <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getFormulariosRespondidosUser(route.params.id)" />
                            </template>
                        </Toolbar>
                    </template>

                    <template #empty> No se encuentran usuario que han respondido </template>

                    <Column field="user_id" header="ID del usuario" sortable></Column>
                    <Column field="score" header="Score"></Column>
                    <Column field="created_at" header="Creado el" sortable></Column>
                    <Column field="updated_at" header="Actualizado el" sortable></Column>
                    <Column class="pe-0 me-0 icon-column-2">
                        <template #body="slotProps">
                            <router-link :to="{ name: 'formulariosRespondidos.edit', params: { id: slotProps.data.user_id, formularioId: slotProps.data.formulario_id } } ">
                                <Button icon="pi pi-pencil" severity="info" size="small" class="mr-1"/>
                            </router-link>

                            <Button icon="pi pi-trash" severity="danger" @click.prevent="deleteFormularioRespondido(slotProps.data.user_id, slotProps.data.formulario_id)" size="small"/>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import useFormulariosRespondidos from '@/composables/formularios_respondidos';
import {useAbility} from '@casl/vue'
import { FilterMatchMode } from '@primevue/core/api';

const route = useRoute();
const router = useRouter();
const {getFormulariosRespondidosFormulario, deleteFormularioRespondido, formulariosRespondidos } = useFormulariosRespondidos();
const {can} = useAbility()
const filters = ref();

// Recuperado de los datos de los formularios respondidos filtrados por formulario
onMounted(() => {
    getFormulariosRespondidosFormulario(route.params.id).then(() => {
    console.log("Datos de formularios:", formulariosRespondidos.value);
  });
});


const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();

</script>
<style scoped>
.thumbnail {
    width: 50px;
    height: 50px; 
    object-fit: cover; 
    border-radius: 4px; 
}
</style>