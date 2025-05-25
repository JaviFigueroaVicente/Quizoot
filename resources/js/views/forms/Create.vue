<template>
  <div class="outer-wrapper">
    <!-- Título -->
    <h1>CREAR FORMULARIO</h1>
    <!-- Contenedor principal-->
    <div class="main-container equal-container mb-3">
      <!-- Contenedor izquierdo datos -->
      <div class="container left-container">
        <div class="input-form mb-5">
          <input class="form-control editable-title align-left" id="name" placeholder='' v-model="formulario.name" />
          <label class="form-label" for="name">Nombre del formulario</label>
          <small class="text-danger" v-if="errors.name">{{ errors.name }}</small>
        </div>

        <div class="input-form mb-5">
          <input class="form-control editable-description align-left" id="description" placeholder='' v-model="formulario.description" />
          <label class="form-label" for="description">Descripción del formulario</label>
          <small class="text-danger" v-if="errors.description">{{ errors.description }}</small>
        </div>

        <div class="mb-4">
          <label class="label" for="category">Categorias:</label>
          <MultiSelect v-model="formulario.category_id" :options="categoryList" display="chip" optionLabel="name" optionValue="id" placeholder="Seleccione categorias" :maxSelectedLabels="3" class="white w-full md:w-80 select" />
          <small class="text-danger" v-if="errors.category_id">{{ errors.category_id }}</small>
        </div>
      </div>

      <!-- Contenedor derecho imagen -->
      <div class="container right-container">
        <DropZone v-model="formulario.thumbnail" />
      </div>
    </div>

    <!-- Botón de crear formulario -->
    <div class="form-button-wrapper">
      <button type="submit" class="btn btn-custom mt-2 mb-5" @click.prevent="onFormSubmit">CREAR FORMULARIO</button>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import DropZone from "@/components/DropZone.vue";
import useForms from "@/composables/forms";
import useCategories from "@/composables/categories";

const errors = ref({});
const { storeForm, formulario } = useForms();
const { categoryList, getCategoryList } = useCategories(); 

formulario.value = {
  name: "",
  description: "",
  category_id: [],
};

yup.setLocale(es);
const router = useRouter();

// Validador formulario
const schema = yup.object().shape({
  name: yup.string().required("El nombre es requerido"),
  description: yup.string().required("La descripción es requerida"),
  category_id: yup.array().min(1, "Debe seleccionar al menos una categoría"),
});

// Enviar datos del formulario con su gestión de errores
const onFormSubmit = async () => {
  try {
    await schema.validate(formulario.value, { abortEarly: false });
    // console.log("Formulario enviado:", formulario.value);
    await storeForm();
    router.push({ name: 'mis-formularios.index' });
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

// Recuperar categorías
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
  color: #874eca;
}

.select{
  background-color: #e8e8e850;
  --p-multiselect-placeholder-color: #ffffff !important;
  --p-multiselect-dropdown-color: #ffffff !important;
  --p-multiselect-focus-border-color: #cbd5e1 !important;
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

@media (max-width: 768px) {
  .main-container {
    display: flex;
    flex-direction: column;
  }
}

.left-container,
.right-container {
  display: flex;
  flex-direction: column;
}

.container {
  background-color: #874eca;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
  min-height: 100%;
  height: 100%;
}

/* Estilos de los inputs */
.label{
  color: #ffffff;
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


.align-left {
  text-align: left;
}

.form-button-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

/* Botón crear formulario */
.btn-custom {
  background-color: #874eca;
  font-size: 20px;
  color: white;
  font-weight: bold;
  border: none;
  padding: 15px 40px;
  border-radius: 10px;
  transition: background-color 0.3s ease;
}

.btn-custom:hover {
  background-color: #402462;
}
</style>