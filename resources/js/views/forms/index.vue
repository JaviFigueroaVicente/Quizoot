<template>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <header class="text-center py-3 mt-3 mb-1 title ">
        <h1 class="fw-bold">Formularios</h1>
    </header>

    <main class="container my-2">
        <div class="dropdown">
            <button class="btn btn-light me-2 btn-hover-lila dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> + </button>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!-- Todos los formularios -->
                <li>
                    <a class="dropdown-item" href="#" @click.prevent="selectCategory()">
                        Todos
                    </a>
                </li>
                <!-- Categorías -->
                <li v-for="category in categoryList" :key="category.id">
                    <a class="dropdown-item" href="#" @click.prevent="selectCategory(category.id)">
                        {{ category.name }}
                    </a>
                </li>
            </ul>
            
            <span>Categorías</span>
        </div>

        <FormCards :formularios="paginatedFormularios"></FormCards>

        <div class="mt-4 mb-4">
            <Paginator :rows="rowsPerPage" :totalRecords="formularios.length" :pageLinkSize="3" :first="currentPage * rowsPerPage"@page="onPageChange"/>
        </div>
    </main>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import Paginator from 'primevue/paginator';
import FormCards from '@/components/FormCards.vue';
import useCategories from "@/composables/categories";
import useForms from "@/composables/forms";

const { categoryList, getCategoryList } = useCategories();
const { formularios, getForms } = useForms();

const currentPage = ref(0);
const rowsPerPage = 9;

const paginatedFormularios = computed(() => {
  const start = currentPage.value * rowsPerPage;
  return formularios.value.slice(start, start + rowsPerPage);
});

const onPageChange = (event) => {
  currentPage.value = event.page;
};

onMounted(() => {
  getCategoryList();
  getForms();
});

const selectCategory = (categoryId) => {
  console.log("Categoría seleccionada:", categoryId);
  currentPage.value = 0;
  getForms(categoryId);
};
</script>

<style scoped>
    .title{
        color: #874ECA;
        font-family: "Atma";
    }

    .btn-hover-lila {
        font-size: 12px;
        font-weight: bold;
    }

    .btn-hover-lila:hover {
        color: #874ECA;
    }

    .dropdown-menu .dropdown-item:hover {
        color: #874ECA;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
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

    .pagination .page-link {
        color: #874ECA;
        border: 1px solid #874ECA;
        border-radius: 5px;
        padding: 0.5rem 1rem;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #874ECA;
        color: white;
        border-color: #874ECA;
    }

    .pagination .page-link:hover {
        background-color: #dcdcdc;
        color: #874ECA;
    }

    .pagination .page-item.disabled .page-link {
        color: #dcdcdc;
        pointer-events: none;
    }

    .pagination .page-link:focus {
        box-shadow: none;
    }
</style>