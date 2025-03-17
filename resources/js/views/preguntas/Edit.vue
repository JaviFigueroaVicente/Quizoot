<template>
    <h2>EDITAR PREGUNTA</h2>
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
                <Checkbox v-model="respuesta.correcta" :inputId="'respuesta' + (index + 1)" :name="'pregunta.respuestas.' + index + '.correcta'" :binary="true" :false-value="0" :true-value="1" />
                <label :for="'respuesta' + (index + 1)"></label>
                <input :name="'respuesta' + (index + 1)" v-model="respuesta.respuesta" type="text" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary button button-action mt-2" @click.prevent="onFormSubmit">Actualizar Pregunta</button>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import usePreguntas from "@/composables/preguntas";


yup.setLocale(es);
const router = useRouter();
const route = useRoute();
const { getPregunta, pregunta, updatePregunta} = usePreguntas();

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
        console.log(pregunta.value);        
        updatePregunta(pregunta.value);
        router.push({name: 'mis-preguntas.index'})
        
    } catch (validationError) {
        console.error(validationError);
    }
};

onMounted(() => {
    console.log(route.params.id);
    getPregunta(route.params.id);
    
});

</script>