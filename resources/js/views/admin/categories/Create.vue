<template>
    <div class="mb-3">
        <!-- Sección Izquierda: Título, Descripción y Subir Imagen -->
        <div class="container">
            <div>
                <label for="name"></label>
                <input class="fw-bold editable-title align-left mb-5" id="name" placeholder='Introducir Aquí El Nombre  De La Categoria' v-model="category.name"></input>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-custom mt-2" @click.prevent="submitForm">Crear Categoria</button>
</template>

<script setup>
    import { reactive } from "vue";
    import useCategories from "../../../composables/categories";
    import { useForm, useField, defineRule } from "vee-validate";
    import { required, min } from "@/validation/rules"
    defineRule('required', required)
    defineRule('min', min);

    const schema = {
        name: 'required|min:3'
    }

    const { validate, errors } = useForm({ validationSchema: schema })

    const { value: name } = useField('name', null, { initialValue: '' });
    const { storeCategory, validationErrors, isLoading } = useCategories()
    const category = reactive({
        name
    })

    function submitForm() {
        validate().then(form => { if (form.valid) storeCategory(category) })
    }
</script>

<style scoped>

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
width: 100%;
}

.editable-title:focus,
.editable-description:focus {
border-color: #874eca;
}


.align-left {
text-align: left;
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
</style>
