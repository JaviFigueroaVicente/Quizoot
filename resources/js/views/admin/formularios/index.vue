<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <!-- Tabla donde se muestran los datos de todos los formularios -->
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
                    <Column field="preguntas_count" header="Nº Preguntas" sortable>
                        <template #body="slotProps">
                            {{ slotProps.data.preguntas_count ?? 0 }}
                        </template>
                    </Column>
                    <Column field="categoria_id" header="Categoria" sortable>
                        <template #body="slotProps">
                            <!-- Mostrar las categorías asignadas -->
                            <span v-if="slotProps.data.categories && slotProps.data.categories.length > 0">
                                {{ slotProps.data.categories.map(category => category.nombre).join(', ') }}
                            </span>
                            <span v-else>No asignada</span>
                        </template>
                    </Column>
                    <Column field="user_id" header="Id Usuario" sortable></Column>
                    <Column field="original_image" header="Foto"><template #body="slotProps">
                            <img v-if="slotProps.data.original_image" :src="slotProps.data.original_image" alt="Imagen" class="thumbnail" />
                            <span v-else>No hay imagen</span>
                        </template>
                    </Column>
                    <Column field="created_at" header="Creado el" sortable></Column>
                    <Column>
                        <template #body="slotProps">
                            <router-link :to="{ name: 'formulariosRespondidos.indexByForm', params: { id: slotProps.data.id } }">
                                Ver Usuarios que han respondido
                            </router-link>
                        </template>
                    </Column>
                    <Column class="pe-0 me-0 icon-column-2">
                        <template #body="slotProps">
                            <router-link :to="{ name: 'formularios.asignar-preguntas', params: { id: slotProps.data.id } }">
                                <Button icon="pi pi-plus" severity="help" size="small" class="mr-1"></Button>
                            </router-link>
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
import { FilterMatchMode } from '@primevue/core/api';

const router = useRouter();
const {formularios, getForms, deleteForm} = useForms();
const {can} = useAbility()
const filters = ref();

// Cargar datos de los formularios
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