<template>
    <h2>Asignar Preguntas</h2>
    <div class="grid">
        <div class="col-6">
        <div class="card">
            <div class="card-header bg-transparent ps-0 pe-0">
                <h5 class="float-start mb-0">Buscar Preguntas</h5>
            </div>
            <DataTable v-model:filters="filters" :value="preguntas.data" paginator :rows="5"
                    :globalFilterFields="['id','pregunta','created_at']" stripedRows dataKey="id" size="small">
                <template #header>
                    <Toolbar pt:root:class="toolbar-table">
                    <template #start>
                        <IconField>
                            <InputIcon class="pi pi-search"></InputIcon>
                            <InputText v-model="filters['global'].value" placeholder="Buscar" />
                        </IconField>
                        <Button type="button" icon="pi pi-filter-slash" label="Clear" class="ml-1" outlined @click="initFilters()" />
                        <Button type="button" icon="pi pi-refresh" class="h-100 ml-1" outlined @click="getUserPreguntas()" />
                        <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center">
                            <button type="button" class="btn btn-primary button button-action">Crear pregunta</button>
                        </router-link>
                    </template>
                    </Toolbar>
                </template>

                <template #empty> No question found. </template>
                <Column>
                    <template #body="slotProps">
                        <Checkbox checkbox.checked.background="#ff0000" v-model="selectedPreguntas" :inputId="slotProps.data.id" :value="slotProps.data" b/>
                    </template>
                </Column>
                <Column field="id" header="ID" sortable></Column>
                <Column field="pregunta" header="Pregunta" sortable></Column>
                <Column field="created_at" header="Creado el" sortable></Column>
            </DataTable>
        </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h5 class="float-start mb-0">Preguntas Seleccionadas</h5>
                    <Button type="button" class="p-button-danger limpiar-button" @click="clearSelectedPreguntas">Borrar todas</Button>
                </div>
                <hr>
                <DataTable :value="selectedPreguntas" paginator :rows="3">
                    <template #empty> No hay preguntas seleccionadas </template>
                    <Column>
                        <template #body="slotProps">
                            <Button icon="pi pi-minus" class="p-button-danger" @click="removePregunta(slotProps.data)" />
                        </template>
                    </Column>
                    <Column field="id" header="ID"></Column>
                    <Column field="pregunta" header="Pregunta"></Column>
                </DataTable>
            </div>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">ASIGNAR PREGUNTAS</button>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import useForms from '@/composables/forms';
import * as yup from 'yup';


const router = useRouter();
const { preguntas, getUserPreguntas } = usePreguntas();
const { getForm, selectedPreguntas, asignarPreguntas } = useForms();
const filters = ref();

const schema = yup.object().shape({
    pregunta_ids: yup.array().of(yup.number()).min(1, 'Debe seleccionar al menos una pregunta'),
});

onMounted(() => {
    getUserPreguntas();
    getForm(router.currentRoute.value.params.id);
});

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();

const removePregunta = (pregunta) => {
    selectedPreguntas.value = selectedPreguntas.value.filter(p => p.id !== pregunta.id);
};

const clearSelectedPreguntas = () => {
    selectedPreguntas.value = [];
};

const onFormSubmit = async () => {
    try {
        const preguntaIds = [];
        for (let i = 0; i < selectedPreguntas.value.length; i++) {
            preguntaIds.push(selectedPreguntas.value[i].id);
        }
        schema.validate({ pregunta_ids: preguntaIds }, { abortEarly: false });
        asignarPreguntas(preguntaIds);
        router.push({name: 'mis-formularios.index'});
    } catch (validationError) {
        console.error(validationError);
    }
};

</script>

<style scoped>
li{
    list-style: none;
}

.p-button-danger{
    margin-right: 10px;
    height: 25px;
    width: 25px;
}

.limpiar-button{
    margin-left: 25px;
    height: 30px;
    width: 150px;
}


.btn-custom {
  padding: 10px;
  width: 100%;
}

.p-checkbox-checked{
    --p-checkbox-checked-background: #874eca;
    --p-checkbox-checked-hover-background: #402462;
    --p-checkbox-checked-border-color: #874eca;
    --p-checkbox-checked-hover-border-color: 402462;
    --p-checkbox-checked-focus-border-color: #874eca;
}
</style>