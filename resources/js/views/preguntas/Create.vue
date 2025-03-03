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
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[0].correcta" inputId="ingredient1" name="pregunta.respuestas[0].correcta" value="true" />
                <label for="ingredient1"></label>
                <input name="ingredient1" v-model="pregunta.respuestas[0].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[1].correcta" inputId="ingredient2" name="pregunta.respuestas[1].correcta" value="true" />
                <label for="ingredient2"></label>
                <input name="ingredient2" v-model="pregunta.respuestas[1].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[2].correcta" inputId="ingredient3" name="pregunta.respuestas[2].correcta" value="true" />  
                <label for="ingredient3"></label>
                <input name="ingredient3" v-model="pregunta.respuestas[2].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[3].correcta" inputId="ingredient4" name="pregunta.respuestas[3].correcta" value="true" />
                <label for="ingredient4"></label>
                <input name="ingredient4" v-model="pregunta.respuestas[3].respuesta" type="text"></input>
            </div>
        </div>
        <button type="submit" class="btn btn-primary button button-action mt-2" @click.prevent="onFormSubmit">Crear Formulario</button>
    </div>
</template>
<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";

yup.setLocale(es);
const route = useRoute();

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

const pregunta = ref({
    pregunta: '',
    respuestas: [
        { correcta: false, respuesta: '' },
        { correcta: false, respuesta: '' },
        { correcta: false, respuesta: '' },
        { correcta: false, respuesta: '' }
    ]
});

const schema = yup.object().shape({
    pregunta: yup.string().required(),
    respuestas: yup.array().of(
        yup.object().shape({
            correcta: yup.boolean().required(),
            respuesta: yup.string().required()
        })
    ).min(1).required(),
    respuesta: yup.string().required(),
});

const createPregunta = async () => {
    try {
        const response = axios.post('/pregunta', pregunta.value);
        console.log(response);
    } catch (error) {
        console.error(error);
    }
};

const onFormSubmit = async () => {
    try {
        schema.validate(pregunta.value, { abortEarly: false });
        createPregunta();
    } catch (validationError) {
        console.error(validationError);
    }
};

</script>