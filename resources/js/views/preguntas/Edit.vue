<template>
    <h1>EDITAR PREGUNTA</h1>
    <!-- Contenedor editar pregunta -->
    <div class="container flex flex-column align-items-center">
        <div class="row">
            <label for="pregunta">PREGUNTA</label>
            <input type="text" v-model="pregunta.pregunta" placeholder="Escribe tu pregunta" class="w-full md:w-80" />
            <small class="text-danger" v-if="errors.pregunta">{{ errors.pregunta }}</small>
        </div>
        <div class="row card justify-center gap-4">
            <div class="flex align-items-center gap-2" v-for="(respuesta, index) in pregunta.respuestas" :key="index">
                <Checkbox v-model="respuesta.correcta" :inputId="'respuesta' + (index + 1)" :name="'pregunta.respuestas.' + index + '.correcta'" :binary="true" :false-value="0" :true-value="1" />
                <label :for="'respuesta' + (index + 1)"></label>
                <input :name="'respuesta' + (index + 1)" v-model="respuesta.respuesta" type="text" />
                <small class="text-danger" v-if="errors[`respuestas[${index}].respuesta`]">{{ errors[`respuestas[${index}].respuesta`] }}</small>
            </div>
            <small class="text-danger" v-if="errors.respuestas">{{ errors.respuestas }}</small>
        </div>
        <button type="submit" class="btn btn-primary button button-action mt-2" @click.prevent="onFormSubmit">ACTUALIZAR PREGUNTA</button>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import usePreguntas from "@/composables/preguntas";

const errors = ref({});
yup.setLocale(es);
const router = useRouter();
const route = useRoute();
const { getPregunta, pregunta, updatePregunta} = usePreguntas();

// Validador de datos de la pregunta
const schema = yup.object().shape({
    pregunta: yup.string().required("Pregunta es un campo requerido"),
    respuestas: yup.array().of(
        yup.object().shape({
            respuesta: yup.string().required("La respuesta es requerida"),
            correcta: yup.boolean(),
        })
    ).min(4, "Debe haber al menos 4 respuestas")
    .test('una-correcta', 'Solo una respuesta puede ser correcta', function(value) {
        const correctas = value.filter(respuesta => respuesta.correcta);
        return correctas.length === 1;
    }),
});

// enviar datos de la pregunta con la gestión de errores
const onFormSubmit = async () => {
    try {
        await schema.validate(pregunta.value, { abortEarly: false });
        await updatePregunta(pregunta.value);
        router.push({name: 'questions.index'});
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

// Recuperar datos de la pregunta
onMounted(() => {
    // console.log(route.params.id);
    getPregunta(route.params.id);
    
});

</script>

<style scoped>
.container{
    width: 100%;
}
h1{
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bolder;
    color: blueviolet;
}

.row{
    width: 100%;
    gap: 10px;
    margin-bottom: 20px;
}

button{
    display: flex;
    justify-content: center;
}

button{
    margin-top: 20px;
    margin-bottom: 50px;
    width: 100%;
    padding: 10px 30px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 10px;
}

button:active, button:focus-visible {
    background-color: #402462 !important;
    border: none;
    color: #ffffff;
}

.flex input{
    width: 100%;
}

@media (max-width: 768px) {
    button{
        font-size: 15px;
    }
}
</style>