<template>
  <div class="outer-wrapper">
    <h1>EDITAR FORMULARIO</h1>
    <div class="main-container equal-container mb-3 mt-3">
      <!-- Contenedor izquierdo -->
      <div class="container left-container">
        <div class="input-form mb-5">
          <input class="form-control editable-title align-left" id="name" placeholder='' v-model="formulario.name" />
          <label for="form-label name">Nombre del formulario</label>
          <small class="text-danger" v-if="errors.name">{{ errors.name }}</small>
        </div>

        <div class="input-form mb-5">          
          <input class="form-control editable-description align-left" id="description" placeholder='' v-model="formulario.description" />
          <label for="form-label description">Descripción del formulario</label>          
          <small class="text-danger" v-if="errors.description">{{ errors.description }}</small>
        </div>

        <div class="mb-4">
          <label class="label" for="category">Categorías:</label>
          <MultiSelect v-model="formulario.category_id" :options="categoryList" display="chip" optionLabel="name" optionValue="id" placeholder="Seleccione nuevas categorías" :maxSelectedLabels="3" class="w-full md:w-80" />
          <small class="text-danger" v-if="errors.category_id">{{ errors.category_id }}</small>
        </div>
      </div>

      <!-- Contenedor derecho -->
      <div class="container right-container">
        <div class="mb-3">
          <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="Imagen del formulario" class="form-image" />
          <img v-else src="images/placeholder.png" alt="Placeholder" class="form-image" />
        </div>
        <DropZone v-model="formulario.thumbnail" />
      </div>
    </div>

    <div class="form-button-wrapper">
      <button type="submit" class="btn btn-custom mt-2 mb-5" @click.prevent="onFormSubmit">ACTUALIZAR FORMULARIO</button>
    </div>
  </div>
</template>

<script setup>
import { useRouter, useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import DropZone from "@/components/DropZone.vue";
import useForms from "@/composables/forms";
import useCategories from "@/composables/categories";
import { onMounted, ref } from "vue";

const { getForm, updateForm, formulario, getFormCategories } = useForms();
const { categoryList, getCategoryList } = useCategories();
const router = useRouter();
const route = useRoute();
yup.setLocale(es);
const errors = ref({});

// Inicializar
formulario.value = {
  name: "",
  description: "",
  thumbnail: null,
  category_id: [],
};

// Validador de los datos del formulario
const schema = yup.object().shape({
  name: yup.string().required("El nombre es obligatorio"),
  description: yup.string().required("La descripción es obligatoria"),
  category_id: yup.array().min(1, "Debe seleccionar al menos una categoría"),
});

// Recuperar categorias y datos del formulario
onMounted(async () => {
  await getCategoryList();
  const formularioId = route.params.id;

  if (formularioId) {
    const response = await getForm(formularioId);
    formulario.value = response;

    const categorias = await getFormCategories(formularioId);
    formulario.value.category_id = categorias;
  }
});

// Enviar nuevos datos con la gestión de errores
const onFormSubmit = async () => {
  try {
    await schema.validate(formulario.value, { abortEarly: false });
    await updateForm(formulario.value);
    router.push({ name: "mis-formularios.index" });
  } catch (err) {
    if (err instanceof yup.ValidationError) {
        errors.value = {};
        err.inner.forEach(error => {
            errors.value[error.path] = error.message;
        });
    } else {
        console.error(err);
    };
  }
};
</script>

<style scoped>
label {
  color: #ffffff;
}
h1 {
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
  background: #402462d7;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
  min-height: 100%;
  height: 100%;
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

.btn-custom {
  background-color: #874eca;
  font-size: 24px;
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

.form-image {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
  border-radius: 10px;
}
</style>
