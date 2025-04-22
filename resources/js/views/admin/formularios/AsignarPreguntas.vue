<template>
    <h1>ASIGNAR PREGUNTAS</h1>
    <div class="grid">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h5 class="float-start mb-0">BUSCAR PREGUNTAS</h5>
                </div>
                <!-- Tabla con las preguntas a seleccionar -->
                <DataTable v-model:filters="filters" :size="'normal'" v-model:selection="selectedPreguntas" :value="preguntas.data" paginator :rows="5"
                        :globalFilterFields="['id','pregunta','created_at']" stripedRows dataKey="id" size="small">
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
                                        <Button type="button" icon="pi pi-refresh" outlined @click="getUserPreguntas()" />
                                        <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center">
                                            <button type="button" class="btn btn-primary button button-action">Crear pregunta</button>
                                        </router-link>
                                    </div>
                                </div>
                            </template>
                        </Toolbar>
                    </template>
                    <template #empty> No hay preguntas. </template>
                    <Column selectionMode="multiple" value="preguntas.data" dataKey="id"></Column>
                    <Column field="id" header="ID" sortable></Column>
                    <Column field="pregunta" header="Pregunta" sortable></Column>
                    <Column field="created_at" header="Creado el" sortable></Column>
                </DataTable>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h5 class="float-start mb-0">PREGUNTAS SELECCIONADAS</h5>
                    <Button type="button" class="p-button-danger limpiar-button" @click="clearSelectedPreguntas">Borrar todas</Button>
                </div>
                <hr>
                <!-- Tabla con las preguntas seleccionadas -->
                <DataTable :size="'normal'" :value="selectedPreguntas" paginator :rows="5">
                    <template #loading> Cargando preguntas seleccionadas... </template>
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
    <div class="button-asignar">
        <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">ASIGNAR PREGUNTAS</button>
    </div>
</template>

<script setup>
import { ref, onMounted, inject } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import { FilterMatchMode} from '@primevue/core/api';
import useForms from '@/composables/forms';
import * as yup from 'yup';


const swal = inject('$swal')
const errors = ref({});
const router = useRouter();
const { preguntas, getPreguntas } = usePreguntas();
const { getForm, getFormPreguntas, selectedPreguntas, asignarPreguntas } = useForms();
const filters = ref();

// Validador de preguntas seleccionadas
const schema = yup.object().shape({
    pregunta_ids: yup.array().of(yup.number()).min(1, 'Debe seleccionar al menos una pregunta'),
});

// Recuperar datos para mostrarlos y comprarlos
onMounted(() => {
    getPreguntas();
    getForm(router.currentRoute.value.params.id);
    getFormPreguntas(router.currentRoute.value.params.id);
});

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();

// Métodos de gestión de las preguntas a asignar
const removePregunta = (pregunta) => {
    selectedPreguntas.value = selectedPreguntas.value.filter(p => p.id !== pregunta.id);
};

const clearSelectedPreguntas = () => {
    selectedPreguntas.value = [];
};

// Enviar y validar las preguntas seleccionadas
const onFormSubmit = async () => {
    try {
        await schema.validate({ pregunta_ids: selectedPreguntas.value.map(p => p.id) }, { abortEarly: false });
        await asignarPreguntas();
        router.push({name: 'formularios.index'});
    } catch (err) {
        if (err instanceof yup.ValidationError) {
            errors.value = {};
            err.inner.forEach(error => {
                errors.value[error.path] = error.message;
            });
        } else {
            console.error(err);
        }
        swal({
            icon: 'error',
            title: errors.value.pregunta_ids,
            showConfirmButton: true,
            allowOutsideClick: false 
        });
    }
};

</script>

<style scoped>

.p-toolbar{
    width: 100%;
}
.card-header{
    display: flex;
    align-items: center;
}

h1{
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bolder;
    color: blueviolet;
}

h5{
    font-weight: bolder;
    color: #402462;
    font-family: 'Roboto';
}

/* Estilo de la lista de las preguntas seleccionadas */

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

.grid{
    margin-bottom: 40px;
}

/* Estilo botón asignar */
.button-asignar{
    display: flex;
    justify-content: center;
}

.button-asignar button{
    margin-top: 0px;
    margin-bottom: 50px;
    width: 400px;
    padding: 10px 30px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 10px;
}

.button-asignar button:active, button:focus-visible {
    background-color: #402462 !important;
    border: none;
    color: #ffffff;
}

@media (max-width: 1024px) {
    .grid{
        display: flex;
        flex-direction: column;
    }
    .col-6{
        width: 100%;
    }
}

@media (max-width: 768px) {
    .grid{
        display: flex;
        flex-direction: column;
    }
    .col-6{
        width: 100%;
    }

    .icon-field-container,
    .buttons-container {
        display: flex;
        width: auto;
        margin-bottom: 0;
    }
    .search-and-filters-container{
        flex-wrap: wrap;
    }

    .button-asignar button{
        font-size: 15px;
    }
}

</style>