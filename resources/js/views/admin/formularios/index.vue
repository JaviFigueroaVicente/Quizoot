<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <DataTable v-model:filters="filters" :value="formularios" paginator :rows="5"
                            :globalFilterFields="['id','name', 'description','user_id','created_at']" stripedRows dataKey="id" size="small">
                    <template #header>
                        <Toolbar pt:root:class="toolbar-table">
                            <template #start>
                                <IconField >
                                    <InputIcon class="pi pi-search"> </InputIcon>
                                    <InputText v-model="filters['global'].value" placeholder="Buscar" />
                                </IconField>
                                <Button type="button" icon="pi pi-filter-slash" label="Clear" class="ml-1" outlined @click="initFilters()" />
                                <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getUsers()" />
                                <router-link :to="{name: 'formularios.create'}" class="flex align-items-center"><button type="button" class="btn btn-primary button button-action">Crear formulario</button></router-link>
                            </template>
                        </Toolbar>
                    </template>

                    <template #empty> No se encuentran formularios </template>

                    <Column field="id" header="ID" sortable></Column>
                    <Column field="name" header="Nombre" sortable></Column>
                    <Column field="description" header="Descripcion"></Column>
                    <Column field="user_id" header="Id Usuario" sortable>
                    </Column>
                    <Column field="original_image" header="Foto"><template #body="slotProps">
                            <img v-if="slotProps.data.original_image" :src="slotProps.data.original_image" alt="Imagen" class="thumbnail" />
                            <span v-else>No hay imagen</span>
                        </template>
                    </Column>
                    <Column field="created_at" header="Creado el" sortable></Column>
                    <Column class="pe-0 me-0 icon-column-2">
                        <template #body="slotProps">
                            <router-link v-if="can('user-edit')" :to="{ name: 'formularios.edit', params: { id: slotProps.data.id } }">
                                <Button icon="pi pi-pencil" severity="info" size="small" class="mr-1"/>
                            </router-link>

                            <Button icon="pi pi-trash" severity="danger" @click.prevent="deleteForm(slotProps.data.id)" size="small"/>
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
import useForms from '@/composables/forms';
import {useAbility} from '@casl/vue'
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';

const router = useRouter();
const {formularios, getForms, deleteForm} = useForms();
const {can} = useAbility()
const filters = ref();

onMounted(() => {
    getForms().then(() => {
    console.log("Datos de formularios:", formularios.value);
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