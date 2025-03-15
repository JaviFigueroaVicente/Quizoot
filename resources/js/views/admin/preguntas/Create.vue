<template>
    <h2>CREAR PREGUNTA</h2>
    <div class="container">
        <div class="row">
            <label for="pregunta">Pregunta</label>
            <input type="text" v-model="pregunta.pregunta" placeholder="Escibre tu pregunta" class="w-full md:w-80" />
        </div>
        <div class="row">
            <label for="categoria">Categoria</label>
            <MultiSelect display="chip" :options="categorias" optionLabel="name" filter placeholder="Select categorias"
                :maxSelectedLabels="1" class="w-full md:w-80" />
        </div>
        <div class="row card justify-center gap-4">
            <div class="flex items-center gap-2" v-for="(respuesta, index) in pregunta.respuestas" :key="index">
                <Checkbox v-model="respuesta.correcta" :inputId="'ingredient' + (index + 1)" :name="'pregunta.respuestas.' + index + '.correcta'" :binary="true" :false-value="0" :true-value="1" />
                <label :for="'ingredient' + (index + 1)"></label>
                <input :name="'ingredient' + (index + 1)" v-model="respuesta.respuesta" type="text" />
            </div>
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

const categorias = ref([
    { name: 'Entretenimiento', code: '1' },
    { name: 'Cultura General', code: '2' },
    { name: 'Deportes', code: '3' },
    { name: 'Videojuegos', code: '4' },
    { name: 'Música', code: '5' },
    { name: 'Historia', code: '6' },
    { name: 'Comida', code: '7' },
    { name: 'Ciencia y Tecnología', code: '8' },
    { name: 'Personalidad y Estilo de Vida', code: '9' }
]);


const schema = yup.object().shape({
    pregunta: yup.string().required(),
    respuestas: yup.array().of(
        yup.object().shape({
            respuesta: yup.string().required(),
            correcta: yup.boolean(),
        })
    ).min(1).required(),
});


const onFormSubmit = async () => {
    try {
        schema.validate(pregunta.value, { abortEarly: false });
        storePregunta();
        router.push({name: 'questions.index'});
    } catch (validationError) {
        console.error(validationError);
    }
};

</script>