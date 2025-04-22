<template>
    <h1>MIS FORMULARIOS RESPONDIDOS</h1>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <!-- Tabla con todos los datos que el usuario de la sesión ha respondido -->
                <DataTable v-model:filters="filters" :size="'normal'" :value="formulariosRespondidos" paginator :rows="10"
                            :globalFilterFields="['formulario_id', 'score', 'created_at']" stripedRows size="small" dataKey="formulario_id">
                    <template #header>
                        <Toolbar pt:root:class="toolbar-table">
                            <template #start>
                                <IconField >
                                    <InputIcon class="pi pi-search"> </InputIcon>
                                    <InputText v-model="filters['global'].value" placeholder="Buscar" />
                                </IconField>
                                <Button type="button" icon="pi pi-filter-slash" label="Clear" class="ml-1" outlined @click="initFilters()" />
                                <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getFormulariosRespondidosUserLogged()" />
                            </template>
                        </Toolbar>
                    </template>

                    <template #empty> No se encuentran formularios respondidos </template>

                    <Column field="formulario_id" header="ID del formulario" sortable></Column>
                    <Column field="score" header="Score" sortable></Column>
                    <Column field="created_at" header="Respondido el" sortable data-type="date"></Column>
                    <Column>
                        <template #body="slotProps">
                            <router-link :to="{ name: 'forms.details', params: { id: slotProps.data.formulario_id }}">
                                <button class="ver-detalles">
                                    Ver Detalles del Formulario
                                </button>
                            </router-link>                            
                        </template>
                    </Column>
                    <Column>
                        <template #body="slotProps">
                            <router-link :to="{ name: 'rankings.details', params: { id: slotProps.data.formulario_id }}">
                                <button class="ver-detalles">
                                    Ver Ranking del Formulario
                                </button>
                            </router-link>                            
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
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import { size } from 'lodash';

const route = useRoute();
const router = useRouter();
const {getFormulariosRespondidosUserLogged, formulariosRespondidos } = useFormulariosRespondidos();
const {can} = useAbility()
const filters = ref();

// Cargar los datos del usuario filtrados por sesion
onMounted(() => {
    getFormulariosRespondidosUserLogged()
});


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
.ver-detalles{
    border: none;
    background-color: transparent;
    color: #874eca;
    font-family: 'Roboto';
}
.ver-detalles:hover{
    color: #402462;
}

</style>