<template>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Formularios - Quizoot</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header class="text-center py-3 mt-3 mb-1 title ">
            <h1 class="fw-bold">Formularios</h1>
        </header>
    
        <main class="container my-2">
            <div class="dropdown">
                <button class="btn btn-light me-2 btn-hover-lila" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    +
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Entretenimiento</a></li>
                    <li><a class="dropdown-item" href="#">Cultura General</a></li>
                    <li><a class="dropdown-item" href="#">Deportes</a></li>
                    <li><a class="dropdown-item" href="#">Videojuegos</a></li>
                    <li><a class="dropdown-item" href="#">Música</a></li>
                    <li><a class="dropdown-item" href="#">Historia</a></li>
                    <li><a class="dropdown-item" href="#">Comida</a></li>
                    <li><a class="dropdown-item" href="#">Ciencia y Tecnología</a></li>
                    <li><a class="dropdown-item" href="#">Personalidad y Estilo de Vida</a></li>
                </ul>
                <span>Categorías</span>
            </div>
                
            <div class="row row-cols-3 g-4 mt-3">
                <!-- Tarjetas de formularios con imágenes -->
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/disney.jpg" alt="Formulario 1" class="form-image">
                        <p class="mt-2">Disney Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/marvel.jpg" alt="Formulario 2" class="form-image">
                        <p class="mt-2">Marvel Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/coches.jpg" alt="Formulario 3" class="form-image">
                        <p class="mt-2">Car Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/componentes.webp" alt="Formulario 4" class="form-image">
                        <p class="mt-2">Components Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/deportes.jpg" alt="Formulario 5" class="form-image">
                        <p class="mt-2">Sports Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/gaming.jpg" alt="Formulario 6" class="form-image">
                        <p class="mt-2">Gaming Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/musica.jpg" alt="Formulario 7" class="form-image">
                        <p class="mt-2">Music Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/historia.jpg" alt="Formulario 8" class="form-image">
                        <p class="mt-2">History Form</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center p-3">
                        <img src="images/forms/comida.jpg" alt="Formulario 9" class="form-image">
                        <p class="mt-2">Food Form</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-4">
                <Paginator :rows="9" :totalRecords="90" :rowsPerPageOptions="[5, 10, 15, 20]" :pageLinkSize="3"></Paginator>
            </div>            
        </main>
    </body>
    </html>
</template>

<script setup>

import Paginator from 'primevue/paginator';

</script>

<style scoped>
    /* Estilos generales */
    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background-color: #f5f5f5;
        color: #000000;
    }

    .title{
        color: #874ECA;
        font-family: "Atma";
    }

    /* Cambiar el color del "+" al hacer hover */
    .btn-hover-lila {
        font-size: 12px;
        font-weight: bold;
    }

    .btn-hover-lila:hover {
        color: #874ECA; /* Lila */
    }
    
    /* Cambiar color de texto en hover para los enlaces del dropdown */
    .dropdown-menu .dropdown-item:hover {
        color: #874ECA;
    }

    /* Tarjetas de formulario */
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    /* Imágenes de formularios */
    .form-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
    }
    
    /* Paginación */
    .text-center span {
        font-size: 1.2rem;
        cursor: pointer;
    }   

    /* Estilos para el paginador */
    .pagination .page-link {
        color: #874ECA; /* Color lila para los números */
        border: 1px solid #874ECA;
        border-radius: 5px;
        padding: 0.5rem 1rem; /* Ajuste del tamaño de los botones */
        margin: 0 5px; /* Espaciado entre los botones */
    }

    .pagination .page-item.active .page-link {
        background-color: #874ECA; /* Fondo lila para el número activo */
        color: white; /* Texto blanco en el número activo */
        border-color: #874ECA;
    }

    .pagination .page-link:hover {
        background-color: #dcdcdc; /* Gris claro al hacer hover */
        color: #874ECA; /* Color lila del texto en hover */
    }

    .pagination .page-item.disabled .page-link {
        color: #dcdcdc; /* Gris para los números deshabilitados */
        pointer-events: none; /* Evita clics en los elementos deshabilitados */
    }

    .pagination .page-link:focus {
        box-shadow: none; /* Eliminar sombra de enfoque */
    }
</style>    