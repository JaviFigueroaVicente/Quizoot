<template>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <div class="text-center py-3 mt-3 mb-1 title ">
        <h1 class="fw-bold">Rankings</h1>
    </div>

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
        
        <div class="row row-cols-1 g-4 mt-3">
            <router-link to="/rankings/details">
                <div class="col">
                    <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                        <img src="images/forms/disney.jpg" alt="Formulario 1" class="form-image-horizontal me-5">
                        <div class="d-flex justify-content-between w-100">
                            <h5 class="mb-0 fw-bold me-3">Disney Form</h5>
                            <div class="d-flex align-items-center">
                                <span class="badge me-3">Animación</span>
                                <p class="mb-0 text-muted small">Respuestas: 123</p>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/marvel.jpg" alt="Formulario 2" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Marvel Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Cultura General</span>
                            <p class="mb-0 text-muted small">Respuestas: 97</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/coches.jpg" alt="Formulario 3" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Car Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Videojuegos</span>
                            <p class="mb-0 text-muted small">Respuestas: 84</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/componentes.webp" alt="Formulario 4" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Components Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Ciencia</span>
                            <p class="mb-0 text-muted small">Respuestas: 110</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/deportes.jpg" alt="Formulario 5" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Sports Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Deportes</span>
                            <p class="mb-0 text-muted small">Respuestas: 88</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/gaming.jpg" alt="Formulario 6" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Gaming Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Videojuegos</span>
                            <p class="mb-0 text-muted small">Respuestas: 105</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/musica.jpg" alt="Formulario 7" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Music Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Música</span>
                            <p class="mb-0 text-muted small">Respuestas: 76</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/historia.jpg" alt="Formulario 8" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">History Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Historia</span>
                            <p class="mb-0 text-muted small">Respuestas: 68</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                    <img src="images/forms/comida.jpg" alt="Formulario 9" class="form-image-horizontal me-5">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-0 fw-bold me-3">Food Form</h5>
                        <div class="d-flex align-items-center">
                            <span class="badge me-3">Comida</span>
                            <p class="mb-0 text-muted small">Respuestas: 91</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-4">
            <Paginator :rows="9" :totalRecords="90" :rowsPerPageOptions="[5, 10, 15, 20]" :pageLinkSize="3"></Paginator>
        </div>            
    </main>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Paginator from 'primevue/paginator';
import useCategories from "@/composables/categories";
import useForms from "@/composables/forms";

const { categoryList, getCategoryList } = useCategories();
const { formularios, getForms } = useForms();

onMounted(() => {
    getCategoryList();
    getForms();
    filteredForms.value = formularios;
});

const selectCategory = (categoryId) => {
  console.log("Categoría seleccionada:", categoryId);
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

    .form-image-horizontal {
        width: 2000px;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
    }

    .horizontal-card {
        width: 100%;
        min-height: 160px;
        border: none;
        border-radius: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        margin-bottom: 30px;
    }

    .horizontal-card:hover {
        transform: translateY(-8px);
    }

    .card .d-flex {
        gap: 30px;
    }

    .card .badge {
        font-size: 1rem;
        padding: 0.4rem 0.8rem;
        border-radius: 10px;
        background-color: #874ECA;
    }

    .card .small {
        font-size: 1rem;
        margin-left: 30px;
    }
</style>