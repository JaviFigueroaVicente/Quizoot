<template>
  <div class="outer-wrapper">
    <!-- Título -->
    <h1>CREAR FORMULARIO</h1>
    <!-- Contenedor principal-->
    <div class="main-container equal-container mb-3">
      <!-- Contenedor izquierdo datos -->
      <div class="container left-container">
        <div>
          <label for="name"></label>
          <input class="fw-bold editable-title align-left mb-5" id="name" placeholder='Introducir Aquí El Nombre Del Formulario' v-model="formulario.name" />
        </div>

        <div>
          <label for="description"></label>
          <input class="editable-description align-left mb-5" id="description" placeholder='Escribe aquí la descripción del formulario...' v-model="formulario.description" />
        </div>

        <div class="mb-4">
          <label for="category" class="mb-3">Categorías:</label>
          <MultiSelect v-model="formulario.category_id" :options="categoryList" display="chip" optionLabel="name" optionValue="id" placeholder="Seleccione categorías" :maxSelectedLabels="3" class="w-full md:w-80" />
        </div>
      </div>

      <!-- Contenedor derecho imagen -->
      <div class="container right-container">
        <DropZone v-model="formulario.thumbnail" />
      </div>
    </div>

    <!-- Botón de crear formulario -->
    <div class="form-button-wrapper">
      <button type="submit" class="btn btn-custom" @click.prevent="onFormSubmit">Crear Formulario</button>
    </div>
  </div>
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

formulario.value = {
  name: "",
  description: "",
  category_id: [],
};

yup.setLocale(es);
const router = useRouter();
const store = authStore();

const schema = yup.object().shape({
  name: yup.string().required(),
  description: yup.string().required(),
  category_id: yup.array().min(1, "Debe seleccionar al menos una categoría"),
});

const onFormSubmit = async () => {
  try {
    await schema.validate(formulario.value, { abortEarly: false });
    console.log("Formulario enviado:", formulario.value);
    await storeForm();

    router.push({ name: 'mis-formularios.index' });
  } catch (validationError) {
    console.error("Errores de validación:", validationError.errors);
  }
};

onMounted(() => {
  getCategoryList();
});
</script>

<style scoped>
h1{
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bolder;
    color: blueviolet;
}

.outer-wrapper {
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 15px;
}

.main-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin-top: 20px;
}

@media (max-width: 426px) {
  .main-container {
    grid-template-columns: 1fr;
  }
}

.left-container,
.right-container {
  display: flex;
  flex-direction: column;
}

.container {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  min-height: 100%;
  height: 100%;
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
  width: 100%;
}

.editable-title:focus,
.editable-description:focus {
  border-color: #874eca;
}

.align-left {
  text-align: left;
}

.form-button-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.btn-custom {
  background-color: #874eca;
  color: white;
  border: none;
  padding: 10px 30px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.btn-custom:hover {
  background-color: #402462;
}
</style>