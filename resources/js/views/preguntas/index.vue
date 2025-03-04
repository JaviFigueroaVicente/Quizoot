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
                                    <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getUsers()" />
                                </template>
                            </Toolbar>
                        </template>

                        <template #empty> No customers found. </template>

                        <Column field="id" header="ID" sortable></Column>
                        <Column field="pregunta" header="Pregunta" sortable></Column>
                        <Column field="user_id" header="Id Usuario" sortable></Column>
                        <Column field="created_at" header="Creado el" sortable></Column>
                        <Column class="pe-0 me-0 icon-column-2">
                            <template #body="slotProps">
                                <router-link v-if="can('user-edit')" :to="{ name: 'preguntas.edit', params: { id: slotProps.data.id } }">
                                    <Button icon="pi pi-pencil" severity="info" size="small" class="mr-1"/>
                                </router-link>

                                <Button icon="pi pi-trash" severity="danger" v-if="can('user-delete')" @click.prevent="deleteUser(slotProps.data.id, slotProps.index)" size="small"/>

                            </template>
                        </Column>

                    </DataTable>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import {useAbility} from '@casl/vue'
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';

const router = useRouter();
const {preguntas, getPreguntas} = usePreguntas();
const {can} = useAbility()
const filters = ref();

onMounted(() => {
    getPreguntas();
});


const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();


</script>

