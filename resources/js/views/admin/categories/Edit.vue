<template>
    <div class="main-container mb-3">
        <div class="container left-container" v-if="category">
            <div>
                <label for="name"></label>
                <input class="fw-bold editable-title align-left mb-5" id="name" placeholder="Introducir Aquí El Nombre De La Categoria" v-model="category.name" />
            </div>
        </div>
        <div v-else class="col-md-4 left-section">
            <p>Cargando Categoria...</p>
        </div>
    </div>
    <button type="submit" class="btn btn-custom mt-2" @click.prevent="submitForm">Actualizar Categoria</button>
</template>

<script setup>
import { onMounted, reactive, watchEffect } from "vue";
import { useRoute, useRouter } from "vue-router";
import useCategories from "../../../composables/categories";
import { useForm, useField, defineRule } from "vee-validate";
import { required, min } from "@/validation/rules";

defineRule('required', required);
defineRule('min', min);

const schema = {
    name: 'required|min:3'
};

const { validate, errors, resetForm } = useForm({ validationSchema: schema });
const { value: name } = useField('name', null, { initialValue: '' });
const { category: postData, getCategory, update, validationErrors, isLoading } = useCategories();
const category = reactive({
    name
});
const route = useRoute();
const router = useRouter();

function submitForm() {
    validate().then(form => {
        if (form.valid) {
            update(category);
        }
    });
}

onMounted(() => {
    getCategory(route.params.id);
});

// Rastrear cambios en `postData` y actualizar `category` correctamente
watchEffect(() => {
    if (postData.value) {
        category.id = postData.value.id;
        category.name = postData.value.name;
    }
});
</script>

<style scoped>
.editable-title {
    font-size: 2rem;
    border: none;
    outline: none;
    width: 100%;
}

.main-container {
  display: flex;
  gap: 20px;
  justify-content: center;
  align-items: flex-start;
}

.container {
  max-width: 600px;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
}
</style>