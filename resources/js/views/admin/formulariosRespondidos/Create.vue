<template>
    <div class="main-container mb-3">
        <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
        <div class="container left-container">
            <div>
                <label for="name"></label>
                <input class="fw-bold editable-title align-left mb-5" id="name" placeholder='Introducir Aquí El Nombre  Del Formulario' v-model="formulario.name"></input>
            </div>
            <div>
                <label for="description"></label>
                <input class="editable-description align-left mb-5" id="description" placeholder='Escribe aquí la descripción del formulario...' v-model="formulario.description"></input>
            </div>
            <DropZone v-model="formulario.thumbnail"/>
        </div>
    </div>
    <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">Crear Formulario</button>
</template>
  
<script setup>
import { useRouter } from "vue-router";
import * as yup from "yup";
import { es, id } from "yup-locales";
import DropZone from "@/components/DropZone.vue";
import { authStore } from "@/store/auth";
import useForms from "@/composables/forms";


const { storeForm, formulario } = useForms();

yup.setLocale(es);
const router = useRouter();
const store = authStore();


const schema = yup.object().shape({
    name: yup.string().required(),
    description: yup.string().required(),
});

// Enviara crear el formulario
const onFormSubmit = async () => {
    try {
    schema.validate(formulario.value, { abortEarly: false });
    storeForm();
    router.push({name: 'formularios.index'});
    } catch (validationError) {
    console.error(validationError);
    }
};
  

</script>

<style scoped>

</style>