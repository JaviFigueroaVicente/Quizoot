<template>
  <div class="main-container mb-3">
    <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
    <div class="container left-container">
      <div>
        <label for="name"></label>
        <input class="fw-bold editable-title align-left mb-5" id="name" placeholder='Introducir Aquí El Nombre  Del Formulario' v-model="formulario.name"></input>
      </div>

      <div>
        <label for="description"></label>
        <input class="editable-description align-left mb-5" id="description" placeholder='Escribe aquí la descripción del formulario...' v-model="formulario.description"></input>
      </div>

      <div class="mb-4">
        <label for="category">Categoría:</label>
        <select id="category" v-model="formulario.category_id" class="form-select">
          <option value="" disabled>Seleccione una categoría</option>
          <option v-for="category in categoryList" :key="category.id" :value="category.id">
            {{ category.name }}
          </option>
        </select>
      </div>
    
      <DropZone v-model="formulario.thumbnail"/>

    </div>
  </div>
  <router-link :to="{name: 'mis-preguntas.create'}" class="flex align-items-center"><button type="button" class="btn btn-primary button button-action">Crear pregunta</button></router-link>
  <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">Crear Formulario</button>
</template>

<script setup>
import { onMounted } from "vue";
import { useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import DropZone from "@/components/DropZone.vue";
import { authStore } from "@/store/auth";
import useForms from "@/composables/forms";
import useCategories from "@/composables/categories";


const { storeForm, formulario } = useForms();
const { categoryList, getCategoryList } = useCategories();

yup.setLocale(es);
const router = useRouter();
const store = authStore();


const schema = yup.object().shape({
    name: yup.string().required(),
    description: yup.string().required(),
    category_id: yup.number().required("Debe seleccionar una categoría"),
});

// Enviara crear el formulario
const onFormSubmit = async () => {
    try {
      schema.validate(formulario.value, { abortEarly: false });
      console.log(formulario.value);
      storeForm();
      router.push({name: 'mis-formularios.index'});
    } catch (validationError) {
      console.error(validationError);
    }
};

onMounted(() => {
  getCategoryList();
});

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