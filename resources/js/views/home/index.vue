<template>
    <main>
        <!-- Sección principal login -->
        <section class="section-principal" :key="componentKey">
            <transition name="video-izquierda">
                <div v-if="showVideos" class="video-container">
                    <video class="video-izquierda" src="/images/Home/fondo2.mp4" autoplay="true" muted="true" loop="true"></video>
                </div>
            </transition>
            <div class="section-principal-top fade-in">
                <h1>BIENVENIDO A <strong>QUIZOOT</strong></h1>
                <p>Únete a millones de jugadores en la plataforma de <br>aprendizaje más divertida</p>
                <router-link to="/forms">
                    <button class="button-aprende">¡APRENDE AHORA!</button>
                </router-link>
            </div>
            <transition name="video-derecha">
                <div v-if="showVideos" class="video-container">
                    <video class="video-derecha" src="/images/Home/fondo2.mp4" autoplay="true" muted="true" loop="true"></video>
                </div>
            </transition>
        </section>
        <!-- Sección Cards -->
        <section class="section-cards container mt-4">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 mb-4" v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 zoom-in-50 animate-duration-1000' }">
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
                <div class="col col-lg-3 col-md-6 col-sm-12 mb-4" v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 zoom-in-75 animate-duration-1000' }">
                    <router-link :to="{ name: 'mis-formularios.create' }">
                        <div class="card">
                            <img src="/images/Home/pencil.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Crear <img src="/images/icons/pencil.svg" class="icon" alt=""></h5>
                                <p class="card-text">Diseña un formulario personalizado y reta a la comunidad a demostrar su conocimiento.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 mb-4" v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 zoom-in-75 animate-duration-1000' }">
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
                <div class="col col-lg-3 col-md-6 col-sm-12 mb-4" v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 zoom-in-50 animate-duration-1000' }">
                    <router-link @click="playRandomForm" to="#" >
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
        <!-- Sección -->
        <section class="section-comenzar">
            <div class="card mb-8">
                <div class="row g-0">
                    <div class="col-md-6 div-foto">
                        <video src="/images/Home/cohete.mp4" class="img-fluid" alt="..." autoplay="true" muted="true" loop="true"></video>
                    </div>
                    <div class="col-md-6 div-body">
                        <div class="card-body">
                            <h5 class="card-title">¿LISTO PARA COMENZAR?</h5>
                            <p class="card-text">Es tu momento de demostrar lo que sabes, superar desafíos y escalar posiciones hasta convertirte en el número uno del ranking.</p>
                            <router-link to="/forms">
                                <button class="button-contestar">CONTESTAR FORMULARIO</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router';
import useForms from '@/composables/forms';
import { onMounted, onBeforeUnmount, ref, watch } from 'vue';

const showVideos = ref(false)
const componentKey = ref(0)

const route = useRoute();
const router = useRouter();
const { formularios, getForms } = useForms();

// Método para recuperar un formulario aleatorio
const playRandomForm = () => {    
    if (!formularios.value || formularios.value.length === 0) {
        // console.error("No hay formularios disponibles.");
        return;
    }
    
    const randomForm = formularios.value[Math.floor(Math.random() * formularios.value.length)];

    if (!randomForm || !randomForm.id) {
        // console.error("Formulario aleatorio no encontrado.");
        return;
    }
    
    router.push(`/forms/details/${randomForm.id}`);
};

// Reiniciar animación de entrada
const restartAnimation = () => {
    showVideos.value = false
    componentKey.value += 1

    // Esperar a que se renderice el DOM con showVideos = false
    setTimeout(() => {
        loadVideosAndStartAnimation()
    }, 50)
}

const loadVideosAndStartAnimation = () => {
    const videos = document.querySelectorAll('video')

    if (videos.length === 0) {
        showVideos.value = true
        return
    }

    let loadedCount = 0

    const handleVideoLoad = () => {
        loadedCount++
        if (loadedCount === videos.length) {
            showVideos.value = true
        }
    }

    videos.forEach(video => {
        if (video.readyState >= 3) {
            // Video already can play
            handleVideoLoad()
        } else {
            video.addEventListener('canplaythrough', handleVideoLoad)
        }
    })
}

onMounted(() =>{
    getForms()
    restartAnimation()
}) 

// Observador de cambios de ruta
watch(
    () => route.path,
    (newPath) => {
        if (newPath === '/') {
            restartAnimation()
        }
    }
)
</script>
<style scoped>
/* Animación de entrada de las cards */
.animate-enter {
    opacity: 0;
    transform: scale(0.8);
}

.fade-in-10 {
    animation: fadeIn 1s ease-in-out forwards;
}

.fade-in-10.zoom-in-50 {
    animation: zoomIn 1s ease-in-out forwards;
}

.fade-in-10.zoom-in-75 {
    animation: zoomIn75 1s ease-in-out forwards;
}

.animate-duration-1000 {
    animation-duration: 1s;
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes zoomIn75 {
    from {
        opacity: 0;
        transform: scale(0.75);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

main {
    overflow-x: hidden;
}

section {
    text-align: center;
}

/* SECTION PRINCIPAL */
.section-principal {
    height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    margin: 0;
    position: relative;
    overflow: hidden;
    z-index: 0;
}

/* Estilos de los videos - posicionados detrás */
.video-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; 
    pointer-events: none;
}

.video-izquierda,
.video-derecha {
    position: absolute;
    top: 0;
    width: 30%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
    transition: transform 0.5s ease;
}

.video-izquierda {
    left: 0;
    -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 25%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
    mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 0%, rgba(0,0,0,1) 80%, rgba(0,0,0,0));
}

.video-derecha {
    right: 0;
    -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1) 25%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
    mask-image: linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1) 0%, rgba(0,0,0,1) 80%, rgba(0,0,0,0));
}

video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Contenido central - siempre encima */
.section-principal-top {
    position: relative;
    z-index: 1;
    text-align: center;
    background-color: transparent;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    opacity: 0;
    transition: opacity 1s ease;
    padding: 2rem;
}

.section-principal-top.fade-in {
    opacity: 1;
}

/* Animaciones de transición de los videos */
.video-izquierda-enter-active {
    animation: videoIzquierdaEntrada 2s ease-in-out forwards;
}

.video-derecha-enter-active {
    animation: videoDerechaEntrada 2s ease-in-out forwards;
}

@keyframes videoIzquierdaEntrada {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes videoDerechaEntrada {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Fade general */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

h1 {
    font-size: 6rem;
    font-weight: bolder;
    margin-bottom: 0.5em;
    letter-spacing: 5%;
    line-height: 1.2;
    width: 65%;
}

strong {
    color: #874ECA;
    font-family: Atma;
}

p {
    font-size: 1.375rem;
}

/* Boton sección aprende */
.button-aprende {
    position: relative;
    margin-top: 1em;
    height: 75px;
    width: 400px; 
    font-size: 1.56rem;
    font-weight: bold;
    border-radius: 50px;
    background-color: #874ECA;
    color: #ffffff;
    border: none;
    transition: all 0.2s ease;
}

.button-aprende:active{  
    transform: scale(0.96);
}

.button-aprende:before,
.button-aprende:after {
    position: absolute;
    content: "";
    width: 150%;
    left: 50%;
    height: 100%;
    transform: translateX(-50%);
    z-index: -1000;
    background-repeat: no-repeat;
}

    
.button-aprende:hover:before {
    top: -70%;
    background-image: radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, transparent 20%, #402462 20%, transparent 30%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, transparent 10%, #402462 15%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%);
    background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%,
        10% 10%, 18% 18%;
    background-position: 50% 120%;
    animation: greentopBubbles 0.6s ease;
}

@keyframes greentopBubbles {
    0% {
        background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%,
        40% 90%, 55% 90%, 70% 90%;
    }

    50% {
        background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%,
        50% 50%, 65% 20%, 90% 30%;
    }

    100% {
        background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%,
        50% 40%, 65% 10%, 90% 20%;
        background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
    }
}

.button-aprende:hover::after {
    bottom: -70%;
    background-image: radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, transparent 10%, #402462 15%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%),
        radial-gradient(circle, #402462 20%, transparent 20%);
    background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 20% 20%, 18% 18%;
    background-position: 50% 0%;
    animation: greenbottomBubbles 0.6s ease;
}

@keyframes greenbottomBubbles {
    0% {
        background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%,
        70% -10%, 70% 0%;
    }

    50% {
        background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%,
        105% 0%;
    }

    100% {
        background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%,
        110% 10%;
        background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
    }
}

/* SECTION CARDS */
.section-cards{
    min-height: 90vh;
    display: flex;
    align-items: center;
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
    padding-top: 7.5em;
    gap: 3%;
}

.section-cards .col{
    border: 1px solid #874ECA;
    padding: 1em;
    border-radius: 30px;
    background-color: #ffffff;
    transition: all 0.2s ease-in-out; 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}

.section-cards .col:hover{
    border: solid 2px #402462; 
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
}

.section-cards .col:active{
    transform: translateY(0.5em);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}

.section-cards .card{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    border: none;
}

/* Boton contestar formularios */
.button-contestar {
    margin-top: 1em;
    height: 75px;
    width: 500px; 
    font-size: 1.56rem;
    font-weight: bold;
    border-radius: 50px;
    background-color: #874ECA;
    color: #ffffff;
    border: none;
    transition: all 0.2s ease;
    min-height: 75px;
    display: inline-flex;
    justify-content: center; 
    align-items: center; 
    text-align: center; 
    white-space: nowrap;transition: all 0.4s ease;
}

.button-aprende:hover{
    background-color: #402462 !important;
}

.button-contestar:hover{
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.3);
    background-color: #402462 !important;
}

.button-contestar:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.3);
}

.button-contestar:active {
    transform: scale(0.98);
    opacity: 0.8;
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
    min-height: 500px;
    max-height: 700px; 
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
}

.section-comenzar .row{
    height: 100%;
}

.section-comenzar .card .div-foto{
    width: 40%;
    height: 100%;
}

.section-comenzar video{
    height: 100%;   
    width: 100%;
    margin-left: 0%;
    margin-top: 0%;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 250px;
    border-top-right-radius: 250px;
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
    padding-left: 1.5em;
    padding-right: 1.5em;
}

.section-comenzar button:hover{
    background-color: #402462;
}

@media (max-width: 1400px) {
    .video-izquierda,
    .video-derecha {
        width: 20%; 
    }
}

/* Responsive adjustments */
@media (max-width: 1024px) {

    .button-aprende {
        font-size: 1.5rem !important;
    }

    .section-principal-top {
        padding-left: 10%;
        padding-right: 10%;
        padding-top: 5em;
        padding-bottom: 5em;
        width:100% !important;
    }

    h1 {
        font-size: 6rem;
        width: 90%;
        line-height: 120px;
    }

    p {
        font-size: 1.6rem;
        margin-bottom: 0.5em;
        line-height: 40px;
    }

    .button-aprende {
        font-size: 1.2rem;
        width: 100%
    }

    .section-principal-top a{
        width: 90%
    }

    .section-comenzar .card {
        width: 85%;
        height: auto;
        margin: 50px 0;
    }

    .section-comenzar .div-foto {
        width: 50%;
        height: 100%;
    }

    .section-comenzar img {
        width: 100%;
        height: 100%;
        margin-right: 30px;
        border-radius: 15px;
    }

    .section-comenzar .card-body {
        padding-left: 5%;
        text-align: center;
    }

    .section-comenzar h5 {
        font-size: 2.5rem;
    }

    .section-comenzar button {
        width: 100%;
        font-size: 1.2rem;
        padding-left: 1.5em;
        padding-right: 1.5em;
    }

    .section-comenzar button:hover{
        background-color: #402462;
    }

    .video-izquierda,
    .video-derecha {
        width: 7.5%;
    }

    
}
/*Responsive para móviles */
@media (max-width: 768px) {
    .section-principal{
        height: auto;
    }

    .section-principal-top{
        padding-left: 10%;
        padding-right: 10%;
    }

    .section-principal-top h1{
        font-size: 4.5rem;
        list-style: none;
    }
    .section-cards .row{
        padding-top: 20px
    }

    .section-cards .col{
        margin: 20px;
    }

    .section-comenzar .card {
        width: 90%;
        height: 100%;
        margin: 80px 0;
        display: flex;
        flex-direction: row-reverse;
    }

    .section-comenzar .card .div-foto {
        width: 100%;
        flex-direction: column;
    }

    .section-comenzar video{
        height: 250px;   
        width: 100%;;
        margin-left: 0%;
        margin-top: 0%;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 300px;
        border-bottom-right-radius: 300px;
        border-top-right-radius: 15px;
    }

    .section-comenzar .card-body {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 0;
    }

    .section-comenzar h5 {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 2.5rem;
    }

    .section-comenzar p {
        font-size: 1rem;
        width: 70%;
        text-align: center;
    }

    .section-comenzar .card-body a{
       width: 70%;
    }

    .button-contestar {
        margin-bottom: 10px;
        width: 85%;
    }
    .video-izquierda,
    .video-derecha {
        width: 5%;
    }
}
</style>