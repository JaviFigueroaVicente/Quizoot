<template>
    <!-- Espera de los datos -->
    <div v-if="isLoading">
        <div class="text-center py-3 pt-5 mb-1 title ">
            <h1 class="fw-bold mt-5">FORMULARIOS</h1>
        </div>

        <div class="container pb-2">
            <!-- Div categorias -->
            <Skeleton class="dropdown mb-3 skeleton" height="30px" width="125px"/>

            <!-- Componentes Formularios -->
            <Skeleton class="mt-3 skeleton" height="25rem"/>

            <!-- Paginación -->
            <div class="mt-4 pb-4">
                <Skeleton height="50px" class="skeleton"/>
            </div>
        </div>
    </div>
    <!-- Despúes de recuperar todos los datos -->
    <div v-else>   
        <div class="text-center py-3 pt-5 mb-1 title ">
            <h1 class="fw-bold mt-5">FORMULARIOS</h1>
        </div>

        <div class="container pb-5">
            <!-- Div categorias -->
            <div class="dropdown">
                <button class="btn btn-light me-2 btn-hover-lila dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> + </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- Botón para mostrar todos los formularios -->
                    <li>
                        <a class="dropdown-item" :class="{ active: selectedCategory === null }" href="#" @click.prevent="selectCategory()">Todos</a>
                    </li>
                    <!-- Lista de categorías con clase activa si está seleccionada -->
                    <li v-for="category in categoryList" :key="category.id">
                        <a class="dropdown-item" :class="{ active: selectedCategory === category.id }" href="#" @click.prevent="selectCategory(category.id)">
                            {{ category.name }}
                        </a>
                    </li>
                </ul>
                <span>Categorías</span>
            </div>

            <!-- Componentes Formularios -->
            <FormCards :formularios="paginatedFormularios"></FormCards>

            <!-- Paginación -->
            <div class="mt-4">
                <Paginator :rows="rowsPerPage" :totalRecords="formularios.length" :pageLinkSize="3" :first="currentPage * rowsPerPage" @page="onPageChange"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import Paginator from 'primevue/paginator';
import FormCards from '@/components/FormCards.vue';
import useCategories from "@/composables/categories";
import useForms from "@/composables/forms";
import { Skeleton } from "primevue";

const { categoryList, getCategoryList } = useCategories();
const { formularios, getForms, isLoading } = useForms();

const currentPage = ref(0);
const rowsPerPage = 9;

// Variable para guardar la categoría seleccionada y marcarla visualmente
const selectedCategory = ref(null);

// Funcion para guardar los formularios en el paginator y asi mostrarlos como queramos
const paginatedFormularios = computed(() => {
  const start = currentPage.value * rowsPerPage;
  return formularios.value.slice(start, start + rowsPerPage);
});

// Funcion para cambiar de pagina
const onPageChange = (event) => {
  currentPage.value = event.page;
};

// Funcion que llama a las funciones para coger la lista de categorias y formularios al cargar la pagina
onMounted(() => {
  getCategoryList();
  getForms();
});

// Funcion para seleccionar la categoria que quieres y dejarla marcada como activa
const selectCategory = (categoryId = null) => {
  selectedCategory.value = categoryId;
  currentPage.value = 0;
  getForms(categoryId);
};
</script>

<style scoped>
.skeleton{
    background-color: #cb9dff !important;
}
.title{
    color: #ffffff;
    font-family: "Atma";
}

.btn-hover-lila {
    font-size: 12px;
    font-weight: bold;
}

.btn-hover-lila:hover {
    color: #874ECA;
}

.dropdown-menu .dropdown-item:active {
    background-color: #f1f1f1 !important;
    color: #333 !important;
}

.dropdown-menu .dropdown-item:hover {
    color: #ffffff;
    background-color: #cb9dff;
}

span{
    color: #ffffff;
}

.dropdown-menu .active {
    background-color: #e9d8fd;
    font-weight: bold;
    color: #874ECA;
}

.form-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
}

.text-center span {
    font-size: 1.2rem;
    cursor: pointer;
}

.dropdown ul{
    background-color: #874ECA;
}

.dropdown a{
    color: #ffffff;
}

.dropdown button{
    color: #ffffff;
    background-color: #b26fff;
    border: none;
    transition: all 0.3s ease-in-out;
}

.dropdown button:hover{
    background-color: #874ECA;
    color: #ffffff;
}


</style>