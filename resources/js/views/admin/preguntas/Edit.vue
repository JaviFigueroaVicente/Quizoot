<template>
    <h2>EDITAR PREGUNTA</h2>

    {{ pregunta }}
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
                <Checkbox v-model="pregunta.respuestas[0].correcta" inputId="ingredient1" name="pregunta.respuestas[0].correcta" binary />
                <label for="ingredient1"></label>
                <input name="ingredient1" v-model="pregunta.respuestas[0].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[1].correcta" inputId="ingredient2" name="pregunta.respuestas[1].correcta" binary />
                <label for="ingredient2"></label>
                <input name="ingredient2" v-model="pregunta.respuestas[1].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[2].correcta" inputId="ingredient3" name="pregunta.respuestas[2].correcta" binary />  
                <label for="ingredient3"></label>
                <input name="ingredient3" v-model="pregunta.respuestas[2].respuesta" type="text"></input>
            </div>
            <div class="flex items-center gap-2">
                <Checkbox v-model="pregunta.respuestas[3].correcta" inputId="ingredient4" name="pregunta.respuestas[3].correcta" binary />
                <label for="ingredient4"></label>
                <input name="ingredient4" v-model="pregunta.respuestas[3].respuesta" type="text"></input>
            </div>
        </div>
        <button type="submit" class="btn btn-primary button button-action mt-2" @click.prevent="onFormSubmit">Crear Pregunta</button>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import usePreguntas from "@/composables/preguntas";


yup.setLocale(es);
const route = useRoute();
const { getPregunta, pregunta, storePregunta} = usePreguntas();

const schema = yup.object().shape({
    pregunta: yup.string().required(),
    respuestas: yup.array().of(
        yup.object().shape({
            respuesta: yup.string().required(),
            correcta: yup.boolean(),
        })
    ).min(1).required(),
});

onMounted(() => {
    console.log(route.params.id);
    getPregunta(route.params.id);
    //console.log(getPregunta(route.params.id));
});

const onFormSubmit = async () => {
    try {
        schema.validate(pregunta.value, { abortEarly: false });
        storePregunta();
    } catch (validationError) {
        console.error(validationError);
    }
};
</script>