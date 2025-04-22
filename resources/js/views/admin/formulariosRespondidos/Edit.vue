<template>
    <div class="main-container mb-3">
        <!-- Sección con los datos del formulario respondido seleccionado -->
        <div class="container left-container" v-if="formularioRespondido">
            <div>
                <label for="formulario_id"></label>
                <input class="align-left mb-5" id="formulario_id" v-model="formularioRespondido.formulario_id" disabled></input>
            </div>
            <div>
                <label for="user_id"></label>
                <input class="align-left mb-5" id="user_id" v-model="formularioRespondido.user_id" disabled></input>
            </div>
            <div>
                <label for="score"></label>
                <input class="align-left mb-5" id="score" v-model="formularioRespondido.score" type="number"></input>
                <small class="text-danger" v-if="errors.score">{{ errors.score }}</small>
            </div>
            
        </div>
        <div v-else class="col-md-4 left-section">
            <p>Cargando formulario Respondido...</p>
        </div>
    </div>
    <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">Actualizar Formulario Respondido</button>
</template>
<script setup>
import { useRouter, useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import useFormulariosRespondidos from "@/composables/formularios_respondidos";
import { onMounted, ref } from "vue";

const { formularioRespondido, getFormularioRespondido, updateFormularioRespondido } = useFormulariosRespondidos();

yup.setLocale(es);
const router = useRouter();
const route = useRoute();

// Validador de los datos del formulario respondido 
const schema = yup.object().shape({
    formulario_id: yup.number().required(),
    user_id: yup.number().required(),
    score: yup.number().required("Puntaje es un campo requerido"),
});

const errors = ref({});

// Método para enviar los datos con la validación de errores
const onFormSubmit = async () => {
    try {
      await schema.validate(formularioRespondido.value, { abortEarly: false });
      await updateFormularioRespondido(formularioRespondido.value);
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
    }
};

// Recuperado de datos del formulario repsondido
onMounted(() => {
    console.log(route.params.formularioId, route.params.id);
    getFormularioRespondido(route.params.id, route.params.formularioId);
})

</script>

<style scoped>

</style>