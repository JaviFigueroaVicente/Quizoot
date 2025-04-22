<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h1 class="mb-0">BUSCAR PREGUNTAS</h1>
                </div>
                <!-- Tabla con las preguntas filtradas por el usuario de la sesión -->
                    <DataTable v-model:filters="filters" :size="'normal'" :value="preguntas.data" paginator :rows="5"
                               :globalFilterFields="['id','pregunta', 'user_id','created_at']" stripedRows dataKey="id" size="small">
                        <template #header>
                            <Toolbar pt:root:class="toolbar-table">
                                <template #start>
                                    <div class="search-and-filters-container flex md:flex-row ">
                                        <div class="icon-field-container flex align-items-center">
                                            <IconField>
                                                <InputIcon class="pi pi-search"></InputIcon>
                                                <InputText v-model="filters['global'].value" placeholder="Buscar" />
                                            </IconField>
                                        </div>
                                        <div class="buttons-container flex gap-2">
                                            <Button type="button" icon="pi pi-filter-slash" label="Clear" outlined @click="initFilters()" />
                                            <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getPregunta()" />
                                            <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center"><button type="button" class="btn btn-primary button button-action">Crear pregunta</button></router-link>
                                        </div>
                                    </div>
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
    <!-- Dialog con las respuestas de la pregunta -->
    <Dialog v-model:visible="dialogVisible" modal :style="{ width: '30rem', padding: '15px', height: 'auto' }" pcCloseButton="">
        <template #header>
            <h2><strong>RESPUESTAS</strong></h2>
        </template>
        <div class="flex items-center gap-4 mb-8">
            <ul class="list-group">
                <li v-for="respuesta in preguntaActual.respuestas" :key="respuesta.id">
                    <div v-if="respuesta.correcta == 1">
                        <i class="pi pi-check" style="color: green;"></i>
                        <p>{{respuesta.respuesta}}</p>
                    </div>
                    <div v-else>
                        <i class="pi pi-times" style="color: red;"></i>
                        <p>{{respuesta.respuesta}}</p>
                    </div>                
                </li>
            </ul>
        </div>
    </Dialog>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import { Column } from 'primevue';
import { size } from 'lodash';

const dialogVisible = ref(false);
const preguntaActual = ref({});

const router = useRouter();
const {preguntas, getUserPreguntas, deletePregunta, getPregunta } = usePreguntas();

const filters = ref();

// Recuperar preguntas
onMounted(() => {
    getUserPreguntas();
});

// Abrir Dialog de respuestas
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
h1{
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bolder;
    color: blueviolet;
}
.ver-respuestas{
    border: none;
    background-color: transparent;
    color: #874eca;
    font-family: 'Roboto';
}
.ver-respuestas:hover{
    color: #402462;
}

.list-group {
    list-style: none;
    gap: 30px;
    margin: 30px;
}

.list-group div{
    display: flex;
    align-items: center;
    gap: 20px;
}

.list-group p{
    font-size: 1.75rem;
}


@media (max-width: 768px) {
    .icon-field-container,
    .buttons-container {
        display: flex;
        width: auto;
        margin-bottom: 0;
    }
    .search-and-filters-container{
        flex-wrap: wrap;
    }
}

</style>