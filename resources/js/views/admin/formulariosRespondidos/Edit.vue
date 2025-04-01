<template>
    <div class="main-container mb-3">
      <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
        <div class="container left-container" v-if="formularioRespondido">
            <div>
                <label for="formulario_id"></label>
                <input class="fw-bold editable-title align-left mb-5" id="name" v-model="formularioRespondido.formulario_id" disabled></input>
            </div>
            <div>
                <label for="user_id"></label>
                <input class="user_id align-left mb-5" id="user_id" v-model="formularioRespondido.user_id" disabled></input>
            </div>
            <div>
                <label for="score"></label>
                <input class="score align-left mb-5" id="description" v-model="formularioRespondido.score"></input>
            </div>
            
        </div>
        <div v-else class="col-md-4 left-section">
            <p>Cargando formulario respondido...</p>
        </div>
    </div>
    <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">Actualizar Formulario Respondido</button>
</template>
<script setup>
import { useRouter, useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import useFormulariosRespondidos from "@/composables/formularios_respondidos";
import { onMounted } from "vue";

const { formularioRespondido, getFormularioRespondido } = useFormulariosRespondidos();

yup.setLocale(es);
const router = useRouter();
const route = useRoute();

const schema = yup.object().shape({
    formulario_id: yup.number().required(),
    user_id: yup.number().required(),
    score: yup.string().required(),
});

// Enviara crear el formulario
const onFormSubmit = async () => {
    try {
      schema.validate(formularioRespondido.value, { abortEarly: false });
      router.push({name: 'formulariosRespondidos.index'});
    } catch (validationError) {
      console.error(validationError);
    }
};

onMounted(() => {
    console.log(route.params.id, route.params.idUser);
    getFormularioRespondido(route.params.id, route.params.id);
})

</script>

<style scoped>

</style>