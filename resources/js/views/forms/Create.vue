<template>
  <div class="main-container mb-3">
    <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
    <div class="container left-container">
      <h2 
        class="fw-bold editable-title align-left mb-5"
        contenteditable="true"
        @input="actualizarTitulo"
        :data-placeholder="'Introducir Aquí El Nombre  Del Formulario'"
      >
        {{ tituloFormulario }}
      </h2>

      <p 
        class="editable-description align-left mb-5"
        contenteditable="true"
        @input="actualizarDescripcion"
        :data-placeholder="'Escribe aquí la descripción del formulario...'"
      >
        {{ descripcionFormulario }}
      </p>

      <div class="align-left">
        <input type="file" @change="cargarImagen" accept="image/*" />
        <img v-if="imagenUrl" :src="imagenUrl" class="preview-image" alt="Imagen subida">
      </div>
    </div>

    <!-- Sección Derecha: Preguntas -->
    <div class="container right-container">
      <p class="text-center">
        Introduce las preguntas junto con las respuestas y selecciona cuál es la respuesta correcta
      </p>

      <div v-for="(pregunta, preguntaIndex) in preguntas" :key="preguntaIndex">
        <p class="question-title">Q{{ preguntaIndex + 1 }}</p>

        <div 
          v-for="(respuesta, respuestaIndex) in pregunta.respuestas" 
          :key="respuestaIndex" 
          class="answer-container"
          :class="{
            'correct-answer': respuesta.estado === true, 
            'incorrect-answer': respuesta.estado === false
          }"
        >
          <input 
            v-model="pregunta.respuestas[respuestaIndex].texto" 
            type="text" 
            class="form-control" 
            placeholder="Introduce una respuesta" 
          />
          
          <span 
            class="icon text-success" 
            @click="marcarComoCorrecta(preguntaIndex, respuestaIndex)"
          >✔️</span>

          <span 
            class="icon text-danger" 
            @click="marcarComoIncorrecta(preguntaIndex, respuestaIndex)"
          >❌</span>
        </div>
      </div>

      <button class="btn btn-light" @click="añadirPregunta">Añadir pregunta</button>
    </div>
  </div>

  <button class="btn btn-custom mt-2">Crear Formulario</button>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import * as yup from "yup";
import { es, id } from "yup-locales";
import { authStore } from "@/store/auth";

yup.setLocale(es);

const route = useRoute();
const store = authStore();

const formulario = ref({
    id: '',
    name: '',
    total_preguntas: '',
    description: '',
    user_id: store.user.id,    
    image: '',
});

const onFileChange = (event) => {
    formulario.value.image = event.target.files[0]; 
};

const schema = yup.object({
    name: yup.string().required(),
    total_preguntas: yup.number().required(),
    description: yup.string().required()
});

const createFormulario = async () => {
    try {
        const response = axios.post('/api/formulario', formulario.value);
        console.log(response);
    } catch (error) {
        console.error(error);
    }
};

const onFormSubmit = async () => {
    try {
        schema.validate(formulario.value, { abortEarly: false });
        createFormulario();
    } catch (validationError) {
        console.error(validationError);
    }
};import { ref } from "vue";

const tituloFormulario = ref("");
const descripcionFormulario = ref("");
const imagenUrl = ref(null);

const preguntas = ref([
  { 
    id: 1, 
    respuestas: [
      { texto: "", estado: null },
      { texto: "", estado: null },
      { texto: "", estado: null },
      { texto: "", estado: null }
    ]
  }
]);

const actualizarTitulo = (event) => {
  tituloFormulario.value = event.target.innerText.trim() || "";
};

const actualizarDescripcion = (event) => {
  descripcionFormulario.value = event.target.innerText.trim() || "";
};

const añadirPregunta = () => {
  preguntas.value.push({ 
    id: preguntas.value.length + 1, 
    respuestas: [
      { texto: "", estado: null },
      { texto: "", estado: null },
      { texto: "", estado: null },
      { texto: "", estado: null }
    ]
  });
};

const cargarImagen = (event) => {
  const file = event.target.files[0];
  if (file) {
    imagenUrl.value = URL.createObjectURL(file);
  }
};

const marcarComoCorrecta = (preguntaIndex, respuestaIndex) => {
  preguntas.value[preguntaIndex].respuestas[respuestaIndex].estado = true;
};

const marcarComoIncorrecta = (preguntaIndex, respuestaIndex) => {
  preguntas.value[preguntaIndex].respuestas[respuestaIndex].estado = false;
};
</script>

<style scoped>
.main-container {
  display: flex;
  gap: 20px;
  justify-content: center;
  align-items: flex-start;
}

.left-container {
  flex: 1;
  text-align: center;
}

.right-container {
  flex: 2;
}

.container {
  max-width: 600px;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
}

.editable-title,
.editable-description {
  cursor: text;
  outline: none;
  min-height: 40px;
  padding: 8px;
  border: 2px solid #402462;
  border-radius: 8px;
  border-color: #d0d0d0;
  background-color: #fff;
}

.editable-title:focus,
.editable-description:focus {
  border-color: #874eca;
}

.editable-title:empty:before,
.editable-description:empty:before {
  content: attr(data-placeholder);
  color: #aaa;
  position: absolute;
  pointer-events: none;
}

.align-left {
  text-align: left;
}

.preview-image {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
  border-radius: 10px;
  margin-top: 10px;
}

.question-title {
  font-weight: bold;
  font-style: italic;
  margin-top: 15px;
}

.answer-container {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
  padding: 5px;
  border-radius: 5px;
}

.correct-answer {
  background-color: #d4edda;
}

.incorrect-answer {
  background-color: #f8d7da;
}

.icon {
  font-size: 20px;
  cursor: pointer;
}

.hidden-radio {
  display: none;
}

.btn-custom {
  background-color: #874eca;
  color: white;
  border: none;
  padding: 10px;
  width: 100%;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}
.btn-custom:hover {
  background-color: #402462;
}

.btn-light {
  width: 100%;
  margin-top: 10px;
}
</style>