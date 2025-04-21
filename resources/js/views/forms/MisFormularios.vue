<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h1>MIS FORMULARIOS</h1>
                <DataTable :size="'normal'" v-model:filters="filters" :value="formularios" paginator :rows="5"
                            :globalFilterFields="['id','name', 'description','user_id','created_at']" stripedRows dataKey="id" size="small">
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
                                        <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getUserForms()" />
                                        <router-link :to="{name: 'mis-formularios.create'}" class="flex align-items-center">
                                            <button type="button" class="btn btn-primary button button-action">Crear formulario</button>
                                        </router-link>
                                    </div>
                                </div>
                            </template>
                        </Toolbar>
                    </template>

                    <template #empty> No se encuentran formularios </template>

                    <Column field="id" header="ID" sortable></Column>
                    <Column field="name" header="Nombre" sortable></Column>
                    <Column field="description" header="Descripcion"></Column>
                    <Column field="original_image" header="Foto">
                        <template #body="slotProps">
                            <img v-if="slotProps.data.original_image" :src="slotProps.data.original_image" alt="Imagen" class="thumbnail" />
                            <span v-else>No hay imagen</span>
                        </template>
                    </Column>
                    <Column field="preguntas_count" header="Nº Preguntas" sortable>
                        <template #body="slotProps">
                            {{ slotProps.data.preguntas_count ?? 0 }}
                        </template>
                    </Column>
                    <Column field="categoria_id" header="Categoria">
                        <template #body="slotProps">
                            <!-- Mostrar las categorías asignadas -->
                            <span v-if="slotProps.data.categories && slotProps.data.categories.length > 0">
                                {{ slotProps.data.categories.map(category => category.nombre).join(', ') }}
                            </span>
                            <span v-else>No asignada</span>
                        </template>
                    </Column>
                    <Column field="created_at" header="Creado el" sortable></Column>
                    <Column class="pe-0 me-0 icon-column-3">
                        <template #body="slotProps" class="d-flex">
                            <router-link :to="{ name: 'mis-formularios.asignar-preguntas', params: { id: slotProps.data.id } }">
                                <Button icon="pi pi-plus" severity="help" size="small" class="mr-1"></Button>
                            </router-link>
                            <router-link :to="{ name: 'mis-formularios.edit', params: { id: slotProps.data.id } }">
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
import { useAbility } from '@casl/vue';
import { FilterMatchMode } from '@primevue/core/api';
import { size } from 'lodash';

const router = useRouter();
const { formularios, getUserForms, deleteForm } = useForms();
const { can } = useAbility();
const filters = ref();

onMounted(() => {
    getUserForms();
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
    font-weight: bolder;
    color: #874eca;
}
.p-datatable {
    width: 100%;
}

.card {
    gap: 30px;
    align-items: center;
}

.p-toolbar{
    width: 100%;
}
.card-header{
    display: flex;
    align-items: center;
}

.thumbnail {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 6px;
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