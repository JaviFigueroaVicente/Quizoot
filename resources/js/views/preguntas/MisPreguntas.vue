<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h5 class="float-start mb-0">Buscar Preguntas</h5>
                </div>
                    <DataTable v-model:filters="filters" :value="preguntas.data" paginator :rows="5"
                               :globalFilterFields="['id','pregunta', 'user_id','created_at']" stripedRows dataKey="id" size="small">
                        <template #header>
                            <Toolbar pt:root:class="toolbar-table">
                                <template #start>
                                    <IconField >
                                        <InputIcon class="pi pi-search"> </InputIcon>
                                        <InputText v-model="filters['global'].value" placeholder="Buscar" />
                                    </IconField>
                                    <Button type="button" icon="pi pi-filter-slash" label="Clear" class="ml-1" outlined @click="initFilters()" />
                                    <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getPregunta()" />
                                    <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center"><button type="button" class="btn btn-primary button button-action">Crear pregunta</button></router-link>
                                </template>
                            </Toolbar>
                        </template>

                        <template #empty> No qusetion found. </template>

                        <Column field="id" header="ID" sortable></Column>
                        <Column field="pregunta" header="Pregunta" sortable></Column>
                        <Column field="created_at" header="Creado el" sortable></Column>
                        <Column>
                            <template #body="slotProps">
                                <button class="ver-respuestas" @click="verRespuestas(slotProps.data)">
                                    Ver Respuestas
                                </button>
                            </template>
                        </Column>
                        <Column class="pe-0 me-0 icon-column-2">
                            <template #body="slotProps">
                                <router-link :to="{ name: 'mis-preguntas.edit', params: { id: slotProps.data.id } }">
                                    <Button icon="pi pi-pencil" severity="info" size="small" class="mr-1"/>
                                </router-link>

                                <Button icon="pi pi-trash" severity="danger" @click.prevent="deletePregunta(slotProps.data.id)" size="small"/>
                            </template>
                        </Column>
                    </DataTable>
            </div>
        </div>
    </div>
    <Dialog v-model:visible="dialogVisible" modal header="Edit Profile" :style="{ width: '25rem' }">
        <span class="text-surface-500 dark:text-surface-400 block mb-8">Update your information.</span>
        <div class="flex items-center gap-4 mb-8">
            {{ preguntaActual.respuestas }}
        </div>
    </Dialog>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import { Column } from 'primevue';
const dialogVisible = ref(false);
const preguntaActual = ref({});

const router = useRouter();
const {preguntas, getUserPreguntas, deletePregunta, getPregunta } = usePreguntas();

const filters = ref();

onMounted(() => {
    getUserPreguntas();
});

const verRespuestas= (pregunta)=>{
    preguntaActual.value = pregunta;
    dialogVisible.value = true;
}

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();

</script>

<style scoped>
.ver-respuestas{
    border: none;
    background-color: transparent;
    color: #874eca;
}
.ver-respuestas:hover{
    color: #402462;
}
</style>