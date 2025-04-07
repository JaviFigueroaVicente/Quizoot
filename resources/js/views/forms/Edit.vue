<template>
  <div class="main-container mb-3">
    <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
      <div class="container left-container" v-if="formulario">
          <div>
              <label for="name"></label>
              <input class="fw-bold editable-title align-left mb-5" id="name" placeholder='Introducir Aquí El Nombre  Del Formulario' v-model="formulario.name"></input>
          </div>
          <div>
              <label for="description"></label>
              <input class="editable-description align-left mb-5" id="description" placeholder='Escribe aquí la descripción del formulario...' v-model="formulario.description"></input>
          </div>
          <MultiSelect v-model="formulario.category_id" :options="categoryList" display="chip" optionLabel="name" optionValue="id" placeholder="Seleccione nuevas categorías" :maxSelectedLabels="3" class="w-full md:w-80"></MultiSelect>
          <div>
              <img v-if="formulario && formulario.media && formulario.media.length > 0" :src="formulario.media[0].original_url" alt="User image" class="form-image">
              <img v-else src="images/placeholder.png" alt="Placeholder" class="form-image">
          </div>
          <DropZone v-model="formulario.thumbnail"/>
      </div>
      <div v-else class="col-md-4 left-section">
          <p>Cargando formulario...</p>
      </div>
  </div>
  <button type="submit" class="btn btn-custom mt-2" @click.prevent="onFormSubmit">Actualizar Formulario</button>
</template>

<script setup>
import { useRouter, useRoute } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";
import DropZone from "@/components/DropZone.vue";
import useForms from "@/composables/forms";
import useCategories from "@/composables/categories";
import { onMounted } from "vue";

const { getForm, updateForm, formulario, getFormCategories} = useForms();
const { categoryList, getCategoryList} = useCategories();
const router = useRouter();
const route = useRoute();
yup.setLocale(es);

// Inicializar formulario
formulario.value = {
  name: "",
  description: "",
  thumbnail: null,
  category_id: [],
};

const schema = yup.object().shape({
  name: yup.string().required("El nombre es obligatorio"),
  description: yup.string().required("La descripción es obligatoria"),
  category_id: yup.array().min(1, "Debe seleccionar al menos una categoría"),
});

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

// Enviar formulario
const onFormSubmit = async () => {
  try {
      await schema.validate(formulario.value, { abortEarly: false });

      await updateForm(formulario.value);

      router.push({ name: "mis-formularios.index" });
  } catch (validationError) {
      console.error("Errores de validación:", validationError.errors);
  }
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

.form-image {
width: auto;
height: 100px;
object-fit: cover;
border-radius: 10px;
}
</style>