<template>
    <h2>CREAR PREGUNTA</h2>
    <div class="container">
        <div class="row">
            <label for="pregunta">Pregunta</label>
            <input type="text" v-model="pregunta.pregunta" placeholder="Escibre tu pregunta" class="w-full md:w-80" />
            <small class="text-danger" v-if="errors.pregunta">{{ errors.pregunta }}</small>
        </div>
        <div class="row card justify-center gap-4">
            <div class="flex items-center gap-2" v-for="(respuesta, index) in pregunta.respuestas" :key="index">
                <Checkbox v-model="respuesta.correcta" :inputId="'respuesta' + (index + 1)" :name="'pregunta.respuestas.' + index + '.correcta'" :binary="true" :false-value="0" :true-value="1" />
                <label :for="'respuesta' + (index + 1)"></label>
                <input :name="'respuesta' + (index + 1)" v-model="respuesta.respuesta" type="text" />
                <small class="text-danger" v-if="errors[`respuestas[${index}].respuesta`]">{{ errors[`respuestas[${index}].respuesta`] }}</small>
            </div>
            <small class="text-danger" v-if="errors.respuestas">{{ errors.respuestas }}</small>
        </div>
        <button type="submit" class="btn btn-primary button button-action mt-2" @click.prevent="onFormSubmit">Crear Pregunta</button>
    </div>
</template>
<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import usepregunta from '@/composables/preguntas';

const { storePregunta, pregunta } = usepregunta();

yup.setLocale(es);
const router = useRouter();

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



const errors = ref({});
const onFormSubmit = async () => {
    try {
        await schema.validate(pregunta.value, { abortEarly: false });
        await storePregunta();
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

</script>