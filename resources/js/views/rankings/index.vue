<template>
    <!-- Vista mientras cargan los datos -->
    <div v-if="isLoading">
        <div class="text-center py-3 pt-5 pb-5 title ">
            <h1 class="fw-bold">RANKINGS</h1>
        </div>
        <div class="container pb-4">
            <!-- Div categorias -->
            <Skeleton class="skeleton dropdown mb-3" height="30px" width="125px"/>

            <!-- Componentes Formularios -->
            <Skeleton class="mt-5 skeleton" height="15rem"/>
            <Skeleton class="mt-6 skeleton" height="15rem"/>            
            <Skeleton class="mt-6 skeleton" height="15rem"/>

            <!-- Paginación -->
            <div class="mt-4 mb-4">
                <Skeleton height="50px" class="skeleton"/>
            </div>
        </div>
    </div>
    <!-- Vista con los datos cargados -->
    <div v-else>
        <div class="text-center py-3 pt-5 pb-5 title">
            <h1 class="fw-bold">RANKINGS</h1>
        </div>
        <div class="container pb-4">
            <!-- Div categorias -->
            <div class="dropdown">
                <button class="btn btn-light me-2 btn-hover-lila dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> + </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <!-- Botón para mostrar todos los formularios -->
                        <a class="dropdown-item" :class="{ 'active-category': selectedCategoryId === null }" href="#" @click.prevent="selectCategory()">
                            Todos
                        </a>
                    </li>
                    <li v-for="category in categoryList" :key="category.id">
                        <!-- Lista de categorías con clase activa si está seleccionada -->
                        <a class="dropdown-item" :class="{ 'active-category': selectedCategoryId === category.id }" href="#" @click.prevent="selectCategory(category.id)">
                            {{ category.name }}
                        </a>
                    </li>
                </ul>
                <span>Categorías</span>
            </div>
            <!-- Div Mostrar formularios -->
            <div class="row row-cols-1 g-4 mt-3">
                <div class="col" v-for="formulario in paginatedFormularios" :key="formulario.id">
                    <router-link :to="{ name: 'rankings.details', params: { id: formulario.id }}">
                        <div class="card d-flex flex-row align-items-center p-3 horizontal-card">
                            <img :src="formulario.original_image ? formulario.original_image : '/images/placeholder.jpg'" alt="Formulario" class="form-image-horizontal me-5">
                            <div class="d-flex justify-content-between w-100">
                                <h5 class="mb-0 fw-bold me-3">{{ formulario.name }}</h5>
                                <div class="d-flex align-items-center">
                                    <span v-if="formulario.categories && formulario.categories.length" class="badge me-3">
                                        {{ formulario.categories.map(categoria => categoria.nombre).join(', ') }}
                                    </span>
                                    <span v-else class="badge me-3">Sin categoría</span>
                                    <p class="mb-0 text-muted small">Respuestas: {{ formulario.formularios_respondidos_count || 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>

            <!-- Paginación -->
            <div class="mt-4 pb-4">
                <Paginator :rows="rowsPerPage" :totalRecords="formularios.length" :pageLinkSize="2" :first="currentPage * rowsPerPage" @page="onPageChange"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import Paginator from 'primevue/paginator';
import useCategories from "@/composables/categories";
import useForms from "@/composables/forms";

const { categoryList, getCategoryList} = useCategories();
const { formularios, getForms, isLoading } = useForms();

const currentPage = ref(0);
const rowsPerPage = ref(3);

const selectedCategoryId = ref(null);

// Paginación
const paginatedFormularios = computed(() => {
    const start = currentPage.value * rowsPerPage.value;
    return formularios.value.slice(start, start + rowsPerPage.value);
});

const onPageChange = (event) => {
    currentPage.value = event.page;
    rowsPerPage.value = event.rows;
};

// Cargar categorias y formularios
onMounted(() => {
    getCategoryList();
    getForms();
});

// Método para mostrar formularios filtrados por categoria
const selectCategory = (categoryId = null) => {
    console.log("Categoría seleccionada:", categoryId);
    selectedCategoryId.value = categoryId;
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

/* Botón Jugar */
.btn-hover-lila {
    font-size: 12px;
    font-weight: bold;
}

.btn-hover-lila:hover {
    color: #874ECA;
}

.dropdown-menu .dropdown-item:hover {
    color: #ffffff;
    background-color: #cb9dff;
}

.card {
    border: none;
    background-color: #b26fff ;
    border-radius: 10px;
    box-shadow: 0px 8px 0px 0px rgba(136, 78, 202, 0.5);
    transition: all 0.3s ease-in-out;
    color: #ffffff;
}

.card:hover {
    transform: translateY(5px);
    box-shadow: 0px 4px 0px 0px rgba(136, 78, 202, 0.5);
    background-color: #874ECA;
}

.card p {
    font-size: 16px;
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

/* Estilos Paginador */
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

/* Detalles del formulario */
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
    box-shadow: 0px 8px 0px 0px rgba(136, 78, 202, 0.5);
    transition: all 0.3s ease-in-out;
    margin-bottom: 30px;
}

.horizontal-card:hover {
    box-shadow: 0px 4px 0px 0px rgba(136, 78, 202, 0.5);
    transform: translateY(5px);
}

.card .d-flex {
    gap: 30px;
}

.card .badge {
    font-size: 1rem;
    padding: 0.4rem 0.8rem;
    border-radius: 10px;
    background-color: #402462;
}

.card .small {
    font-size: 1rem;
    margin-left: 30px;
    color: #ffffff !important;
}


.dropdown-menu .active {
    background-color: #e9d8fd;
    font-weight: bold;
    color: #874ECA;
}

.dropdown-menu .dropdown-item:active {
    background-color: #f1f1f1 !important;
    color: #333 !important;
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

span{
    color: #ffffff;
}

.active-category {
    background-color: #f1f1f1 !important;
    color: #874ECA !important;
    font-weight: bold;
}


/* Responsive a partir de 425px hacia abajo */
@media (max-width: 426px) {
    .card.d-flex.flex-row {
        flex-direction: column !important;
        align-items: flex-start !important;
    }

    .form-image-horizontal {
        width: 100% !important;
        height: 150px !important;
        margin-bottom: 15px;
    }

    .card .d-flex.justify-content-between {
        flex-direction: column !important;
        gap: 10px;
    }
}
</style>
