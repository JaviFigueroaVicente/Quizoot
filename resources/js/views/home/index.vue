<template>
    <main>
        <section class="section-principal">
            <video src="/images/Home/Home_Fondo.mp4" autoplay="true" muted="true" loop="true"></video>
            <div class="section-principal-top">
                <h1>BIENVENIDO A <strong>QUIZOOT</strong></h1>
                <p>Únete a millones de jugadores en la plataforma de <br>aprendizaje más divertida</p>
                <router-link to="/forms"><button class="button-aprende">¡APRENDE AHORA!</button></router-link>
                <!-- <button class="button-aprende">¡APRENDE AHORA!</button> -->
                
            </div>
        </section>
        <section class="section-cards">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                
                <div class="col">
                    <router-link to="/forms">
                        <div class="card">
                            <img src="/images/Home/play.webp" class="card-img-top play" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Formularios<img src="/images/icons/play.svg" class="icon" alt=""></h5>
                                <p class="card-text">Elige un formulario de muchas categorías y compite con otros jugadores para ganar.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col">
                    <router-link to="/form/mis-formularios/create">
                        <div class="card">
                            <img src="/images/Home/pencil.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Crear <img src="/images/icons/pencil.svg" class="icon" alt=""></h5>
                                <p class="card-text">Diseña un formulario personalizado y reta a la comunidad a demostrar su conocimiento.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col">
                    <router-link to="/rankings">
                        <div class="card">
                            <img src="/images/Home/trophy.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ranking <img src="/images/icons/trophy.svg" class="icon" alt=""></h5>
                                <p class="card-text">Consulta el ranking global y descubre tu mejor puntuación en cada formulario.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col">
                    <router-link to="#" @click="playRandomForm">
                        <div class="card">
                            <img src="/images/Home/form.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Random <img src="/images/icons/dice.svg" class="icon" alt=""></h5>
                                <p class="card-text">Déjanos elegir por ti y demuestra cuánto sabes en una categoría aleatoria.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </section>
        <section class="section-comenzar">
            <div class="card mb-8">
                <div class="row g-0">
                    <div class="col-md-6 div-foto">
                        <img src="/images/Home/cohete.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6 div-body">
                        <div class="card-body">
                            <h5 class="card-title">¿LISTO PARA COMENZAR?</h5>
                            <p class="card-text">Es tu momento de demostrar lo que sabes, superar desafíos y escalar posiciones hasta convertirte en el número uno del ranking.</p>
                            <router-link to="/forms"><button class="button-contestar">CONTESTAR FORMULARIO</button></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';
import useForms from '@/composables/forms';

const router = useRouter();
const { formularios, getForms } = useForms();

onMounted(async () => {
  await getForms();
});

const playRandomForm = () => {
  if (!formularios.value || formularios.value.length === 0) {
    console.error("No hay formularios disponibles.");
    return;
  }
  
  const randomForm = formularios.value[Math.floor(Math.random() * formularios.value.length)];

  if (!randomForm || !randomForm.id) {
    console.error("Formulario aleatorio no encontrado.");
    return;
  }
  
  router.push(`/forms/details/${randomForm.id}`);
};

</script>

<style scoped>
    main{
        overflow-x: hidden;
    }
    section{
        text-align: center;
    }

    /* SECTION PRINCIPAL */
    .section-principal{
        height: 85vh;
    }
    
    video {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: -1000;
        object-fit: cover; /* Asegura que el video cubra toda la sección sin distorsionarse */
    }

    .section-principal-top{
        padding-top: 7.5em;
        padding-bottom: 10em;
        margin-left: 20%;
        margin-right: 20%;
        background-color: #ffffff;
        height: 90vh;
        -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
        mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 85%, rgba(0,0,0,0));
        display: flex; 
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    h1{
        font-size: 6rem;
        font-weight: bolder;
        margin-bottom: 0.5em;
        letter-spacing: 5%;
        line-height: 125x;
        width: 60%;
    }
    
    strong{
        color: #874ECA;
        font-family: "Atma";
    }

    p{
        font-size: 1.375rem;
    }

    .button-aprende {
        margin-top: 1em;
        height: 75px;
        width: 400px; /* Aumento del ancho para pantallas grandes */
        font-size: 1.56rem;
        font-weight: bold;
        border-radius: 50px;
        background-color: #874ECA;
        color: #ffffff;
        border: none;
        transition: all 0.2s ease;
        min-height: 75px;
        display: inline-flex; /* Cambiar display para mantener el texto en una línea */
        justify-content: center; /* Centra el texto en el botón */
        align-items: center; /* Centra el texto verticalmente */
        text-align: center; /* Asegura que el texto esté centrado */
        white-space: nowrap; /* Evita que el texto se divida en varias líneas */
    }

    .button-aprende:hover{
        background-color: #402462 !important;
    }

    /* SECTION CARDS */
    .section-cards{
        margin-top: 5%;
    }
    .section-cards img{
        height: 200px;
        width: 200px;
    }
    
    .play{
        height: 150px !important;
        width: 150px !important;
        margin-top: 10%;
        margin-bottom: 12%;
    }
    h5{
        font-size: 1.5rem;
        font-weight: bold;
        align-items: center;
    }
    h5 .icon{
        width: 30px;
        height: 30px;
        margin-left: 10px;
    }

    .section-cards .row{
        padding-left: 10%;
        padding-right: 10%;
        padding-top: 7.5em;
        gap: 3%;
    }

    .section-cards .col{
        border: 1px solid #874ECA;
        border-radius: 30px;
        background-color: #ffffff;
        transition: all 0.2s ease;
        
    }

    .section-cards .col:hover{
        border: solid 2px #402462; 
        transform: scale(1.05);
    }

    .section-cards .card{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        border: none;
    }

    .button-contestar {
        margin-top: 1em;
        height: 75px;
        width: 500px; /* Aumento del ancho para pantallas grandes */
        font-size: 1.56rem;
        font-weight: bold;
        border-radius: 50px;
        background-color: #874ECA;
        color: #ffffff;
        border: none;
        transition: all 0.2s ease;
        min-height: 75px;
        display: inline-flex; /* Cambiar display para mantener el texto en una línea */
        justify-content: center; /* Centra el texto en el botón */
        align-items: center; /* Centra el texto verticalmente */
        text-align: center; /* Asegura que el texto esté centrado */
        white-space: nowrap; /* Evita que el texto se divida en varias líneas */
    }

    .button-aprende:hover{
        background-color: #402462 !important;
    }

/* SECTION COMENZAR */
.section-comenzar{
    margin-top: 7.5%;
    background-color: #402462;
    display: flex;
    justify-content: center;
    padding-bottom: 5%;
}

.section-comenzar .card{
    margin-top: 7.5%;
    border-radius: 15px;   
    padding: 0;    
    width: 70%;
    max-width: 1100px;
    height: 500px;
    max-height: 500px;
    background-color: rgba(255, 255, 255, 0.7);
}

.section-comenzar .row{
    height: 100%;
}

.section-comenzar .card .div-foto{
    width: 40%;
}

.section-comenzar img{
    height: 104%;   
    width: 103%;
    margin-left: -3%;
    margin-top: -0.5%;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}

.section-comenzar .card-body{
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
    margin-left: 10%;
}

.section-comenzar h5{
    color: #874ECA;
    font-size: 3rem;
    font-weight: bolder;
    margin-top: 10%;
    margin-bottom: 5%;
}

.section-comenzar button{
    width: 100%;
    margin-bottom: 10%;
}

/* Responsive adjustments */
@media (max-width: 1024px) {

    .button-aprende {
        width: 250px !important;
        font-size: 1.5rem !important;
    }

    .section-principal-top {
        margin-left: 5%;
        margin-right: 5%;
        padding-top: 5em;
        padding-bottom: 5em;
        background-color: rgba(255, 255, 255, 0.8);
    }

    h1 {
        font-size: 4rem;
        width: 90%;
    }

    p {
        font-size: 1.4rem;
        width: 90%;
        margin-bottom: 0.5em;
    }

    .button-aprende {
        width: 250px;
        font-size: 1.2rem;
    }

    .section-comenzar .card {
        width: 85%;
        height: auto;
        margin: 50px 0;
    }

    .section-comenzar .div-foto {
        width: 50%;
    }

    .section-comenzar img {
        width: 100%;
        height: 104%;
        object-fit: cover;
        border-radius: 15px;
    }

    .section-comenzar .card-body {
        margin-left: 5%;
        text-align: center;
    }

    .section-comenzar h5 {
        font-size: 2.5rem;
    }

    .section-comenzar button {
        width: 100%;
        font-size: 1.2rem;
    }
}
/* 📱 Responsive para móviles */
@media (max-width: 768px) {

    .section-comenzar .card {
        width: 90%;
        height: 100%;
        margin: 80px 0;
        display: flex;
        flex-direction: row-reverse;
    }

    .section-comenzar .div-foto {
        width: 50%;
        height: 100%;
    }

    .section-comenzar img {
        width: 100%;
        height: 515px;
        object-fit: cover;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        margin-bottom: -200px;
    }

    .section-comenzar .card-body {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 155px;
        margin-top: -160px;
    }

    .section-comenzar h5 {
        font-size: 2rem;
    }

    .section-comenzar p {
        font-size: 1rem;
        width: 70%;
        text-align: center;
    }

    .button-aprende {
        width: 85%;
        font-size: 50px;
    }
}
</style>