<template>
    <h1>ASIGNAR PREGUNTAS</h1>
    <div class="grid">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0">
                    <h5 class="float-start mb-0">BUSCAR PREGUNTAS</h5>
                </div>
                <!-- Tabla para crear ver las preguntas creadas por el usuario -->
                <DataTable v-model:filters="filters" :size="'normal'" v-model:selection="selectedPreguntas" :value="preguntas.data" paginator :rows="5"
                        :globalFilterFields="['id','pregunta','created_at']" stripedRows dataKey="id" size="small" class="datatable">
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
                                    <div class="buttons-container flex gap-2 ml-2">
                                        <Button type="button" icon="pi pi-filter-slash" label="Clear" outlined @click="initFilters()" />
                                        <Button type="button" icon="pi pi-refresh" outlined @click="getUserPreguntas()" />
                                        <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center">
                                            <button type="button" class="btn btn-primary button button-action crear-pregunta">Crear pregunta</button>
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
        <!-- Contenedor donde se muestran las preguntas seleccionadas -->
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-transparent ps-0 pe-0 mb-5">
                    <h5 class="float-start mb-0">PREGUNTAS SELECCIONADAS</h5>
                    <Button type="button" class="p-button-danger limpiar-button" @click="clearSelectedPreguntas">Borrar todas</Button>
                </div>
                <DataTable :size="'normal'" :value="selectedPreguntas" paginator :rows="5" class="datatable mt-5">
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
    <div class="button-asignar flex flex-column align-items-center">
        <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">ASIGNAR PREGUNTAS</button>
        <router-link :to="{name: 'mis-formularios.index'}" class="flex align-items-center"><button type="button" class="btn btn-cancelar mt-3">CANCELAR</button></router-link>
    </div>
</template>

<script setup>
import { ref, onMounted, watch, inject } from 'vue';
import { useRouter } from 'vue-router';
import usePreguntas from '@/composables/preguntas';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import useForms from '@/composables/forms';
import * as yup from 'yup';


const swal = inject('$swal')
const errors = ref({});
const router = useRouter();
const { preguntas, getUserPreguntas } = usePreguntas();
const { getForm, getFormPreguntas, selectedPreguntas, asignarPreguntas } = useForms();
const filters = ref();


// Validador de las preguntas seleccionadas
const schema = yup.object().shape({
    pregunta_ids: yup.array().of(yup.number()).min(1, 'Debe seleccionar al menos una pregunta'),
});

// Método para recuperar los datos necesarios
onMounted(() => {
    getUserPreguntas();
    getForm(router.currentRoute.value.params.id);
    getFormPreguntas(router.currentRoute.value.params.id);
});

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};

initFilters();

// Métodos para la gestión de las preguntas seleccionadas
const removePregunta = (pregunta) => {
    selectedPreguntas.value = selectedPreguntas.value.filter(p => p.id !== pregunta.id);
};

const clearSelectedPreguntas = () => {
    selectedPreguntas.value = [];
};

// Enviar datos de las preguntas seleccionadas con la gestión de errores
const onFormSubmit = async () => {
    try {
        await schema.validate({ pregunta_ids: selectedPreguntas.value.map(p => p.id) }, { abortEarly: false });
        await asignarPreguntas();
        router.push({name: 'mis-formularios.index'});
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
.p-button-danger{
    border-radius: 50px;
}

.btn-cancelar{
    border: 2px solid #874eca;
    color: #874eca;
    transition: all 0.3s ease-in-out;
}

.btn-cancelar:hover{
    background-color: #402462;
    border-color: #402462;
    color: white;
}

.crear-pregunta{
    background-color: #cb9dff !important;
}

.crear-pregunta:hover{
    background-color: #402462 !important;
}
.card{
    background-color: #874eca;
    height: 50vh;
}
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
    color: #ffffff;
    font-family: 'Roboto';
}

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
/* Boton para asignar preguntas */
.button-asignar{
    display: flex;
    justify-content: center;
    margin-bottom: 50px;
}

.button-asignar button{
    margin-top: 0px;
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

@media (max-width: 1440px) {
    .card{
        height: 70vh;
    }
}

@media (max-width: 1024px) {
    .grid{
        display: flex;
        flex-direction: column;
    }

    .card{
        height: auto;
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
        margin-left: 0px !important;
        margin-top: 10px;
    }
    .search-and-filters-container{
        flex-wrap: wrap;
    }

    .button-asignar button{
        font-size: 15px;
    }
}

</style>