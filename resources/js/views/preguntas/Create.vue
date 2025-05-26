<template>
    <h1>CREAR PREGUNTA</h1>
    <!-- Contenedor del formulario de creación de preguntas con respuestas  -->
    <div class="container card flex flex-column align-items-center mb-5">
        <div class="row">
            <span>Pregunta:</span>
            <div class="input-form">
                <input type="text" v-model="pregunta.pregunta" placeholder="" class="form-control w-full md:w-80" />
                <label for="pregunta" class="form-label">Escribe tu pregunta</label>
                <small class="text-danger" v-if="errors.pregunta">{{ errors.pregunta }}</small>
            </div>
        </div>
        <div class="row justify-center gap-4">
            <span>Respuestas:</span>
            <div class="flex flex-column gap-2" v-for="(respuesta, index) in pregunta.respuestas" :key="index">
                <div class="flex align-items-center w-full">
                    <Checkbox v-model="respuesta.correcta" :inputId="'respuesta' + (index + 1)" :name="'pregunta.respuestas.' + index + '.correcta'" :binary="true" :false-value="0" :true-value="1" />
                    <div class="input-form w-full ml-2">
                        <input class="form-control" :name="'respuesta' + (index + 1)" v-model="respuesta.respuesta" type="text" placeholder=""/>
                        <label class="form-label" :for="'respuesta' + (index + 1)">Escribe tu respuesta</label>
                    </div>
                </div>
                <small class="text-danger" v-if="errors[`respuestas[${index}].respuesta`]">{{ errors[`respuestas[${index}].respuesta`] }}</small>
            </div>
            <small class="text-danger" v-if="errors.respuestas">{{ errors.respuestas }}</small>
        </div>
    </div>
    <button type="submit" class="btn btn-primary button button-action mt-5 my-5" @click.prevent="onFormSubmit">CREAR PREGUNTA</button>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import usepregunta from '@/composables/preguntas';

const { storePregunta, pregunta } = usepregunta();

const errors = ref({});
yup.setLocale(es);
const router = useRouter();

// Validación de la pregunta y respuestas
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

// Enviar Formulario de pregunta con validación de errores
const onFormSubmit = async () => {
    try {
        await schema.validate(pregunta.value, { abortEarly: false });
        await storePregunta();
        router.push({name: 'mis-preguntas.index'});
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

<style scoped>
span {
    font-weight: bold;
    color: #ffffff;
    font-size: 18px;
}
.container {
    width: 100%;
    padding: 40px;
    background-color: #874eca; 
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
}
h1 {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bolder;
    color: #ffffff;
}

.row {
    width: 100%;
    gap: 10px;
    margin-bottom: 20px;
}

button {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    width: 80%;
    padding: 10px 30px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 10px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0px 7px 0px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease-in-out;
}



button:active, button:focus-visible, button:hover {
    background-color: #402462 !important;
    border: none;
    color: #ffffff;
    box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.3) !important;
    transform: translateY(5px) ;
}

.flex input {
    width: 100%;
}

.input-form {
 position: relative;
}

.form-control {
 border: solid 1.5px #9e9e9e !important;
 background: #e8e8e850;
 padding: 1rem;
 font-size: 1rem;
 color: #f5f5f5;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
}

.form-label {
 position: absolute;
 left: 15px;
 color: #e8e8e8;
 pointer-events: none;
 transform: translateY(-2.5rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.form-control:focus, .form-control:not(:placeholder-shown) {
 outline: none;
 border: 1.5px solid #874eca;
 box-shadow: none;
}

.form-control:focus ~ label, .form-control:not(:placeholder-shown) ~ label {
 transform: translateY(-280%) scale(0.8) !important;
 background-color: transparent;
 padding: 0 .2em;
 color: #ffffff;
 box-shadow: none;
}


@media (max-width: 768px) {
    button {
        font-size: 15px;
    }
}
</style>