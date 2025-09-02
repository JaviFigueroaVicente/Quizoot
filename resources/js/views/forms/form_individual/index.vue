<template>
  <!-- Mostrar un loader mientras se cargan las preguntas de los formulario seleccionado -->
    <section class="container-cargando" v-if="isLoading">  
        <div class="cargando">
            <svg xmlns="http://www.w3.org/2000/svg" height="200px" width="200px" viewBox="0 0 200 200" class="pencil">
                <defs>
                    <clipPath id="pencil-eraser">
                        <rect height="30" width="30" ry="5" rx="5"></rect>
                    </clipPath>
                </defs>
                <circle transform="rotate(-113,100,100)" stroke-linecap="round" stroke-dashoffset="439.82" stroke-dasharray="439.82 439.82" stroke-width="2" stroke="white" fill="none" r="70" class="pencil__stroke"></circle>
                <g transform="translate(100,100)" class="pencil__rotate">
                    <g fill="none">
                        <circle transform="rotate(-90)" stroke-dashoffset="402" stroke-dasharray="402.12 402.12" stroke-width="30" stroke="#402462" r="64" class="pencil__body1"></circle>
                        <circle transform="rotate(-90)" stroke-dashoffset="465" stroke-dasharray="464.96 464.96" stroke-width="10" stroke="#874eca" r="74" class="pencil__body2"></circle>
                        <circle transform="rotate(-90)" stroke-dashoffset="339" stroke-dasharray="339.29 339.29" stroke-width="10" stroke="#874eca" r="54" class="pencil__body3"></circle>
                    </g>
                    <g transform="rotate(-90) translate(49,0)" class="pencil__eraser">
                        <g class="pencil__eraser-skew">
                            <rect height="30" width="30" ry="5" rx="5" fill="#874eca"></rect>
                            <rect height="20" width="30" fill="hsl(223,10%,90%)"></rect>
                            <rect height="20" width="15" fill="hsl(223,10%,70%)"></rect>
                            <rect height="20" width="5" fill="hsl(223,10%,80%)"></rect>
                            <rect height="2" width="30" y="6" fill="hsla(223,10%,10%,0.2)"></rect>
                            <rect height="2" width="30" y="13" fill="hsla(223,10%,10%,0.2)"></rect>
                        </g>
                    </g>
                    <g transform="rotate(-90) translate(49,-30)" class="pencil__point">
                        <polygon points="15 0,30 30,0 30" fill="hsl(33,90%,70%)"></polygon>
                        <polygon points="15 0,6 30,0 30" fill="hsl(33,90%,50%)"></polygon>
                        <polygon points="15 0,20 10,10 10" fill="hsl(223,10%,10%)"></polygon>
                    </g>
                </g>
            </svg>
            <h3>CARGANDO</h3>
        </div>
    </section>
    <!-- Motrar la vista interactiva para responder el formulario -->
    <section v-else-if="!mostrarScore" class="container">
        <div class="video-fondo-div">
            <video class="video-fondo" src="/images/Home/fondo3.mp4" autoplay="true" muted="true" loop="true"></video>        
        </div>      
        <section class="text-section">
            <div class="top-preguntas">
                <p>{{ currentQuestionIndex + 1 }} / {{ preguntasTotales}}</p>
            </div>
            <div class="text-section-interior">
                <section class="header-container">
                    <div>
                        <ProgressBar :value="tiempo" class="tiempoPregunta" />
                    </div>            
                    <!-- <div class="header-score">
                        <h2 v-if="scoreAnterior !== 0">MEJOR PUNTUACIÓN:  {{ scoreAnterior }} pts</h2>
                        <h2 v-else>Mejor Puntuación: N/A</h2>
                    </div> -->
                </section>
                <section class="white-section">
                    <h4 v-if="preguntaActual">{{ preguntaActual.pregunta }}</h4>
                    <p>Puntuación: {{ score }} pts</p> 
                </section>
            </div>
        </section>
        <section class="buttons-section" v-if="preguntaActual">
            <button v-for="(respuesta, index) in preguntaActual.respuestas" :key="index" class="kahoot-button" :class="['red', 'blue', 'green', 'yellow'][index % 4]" @click="seleccionRespuesta(respuesta)">
                {{ respuesta }}
            </button>
        </section>
        <section class="exit-div">
            <button @click="abandonar" class="exit-button">Abandonar</button>
        </section>        
    </section>
    <!-- Una vez finalizado el formulario mostrar la puntuación con la validación de si es récord o no -->
    <section v-else class="container">
        <div class="video-fondo-div">
            <video class="video-fondo" src="/images/Home/fondo3.mp4" autoplay="true" muted="true" loop="true"></video>        
        </div>
        <div class="container-puntuacion-final">    
            <canvas v-if="scoreAnterior !== null && score > scoreAnterior" id="confetti" class="confetti-canvas"></canvas>          
            <div v-if="scoreAnterior !== null && score > scoreAnterior">  
                <img class="nuevo-record" src="/public/images/icons/corona.webp" alt="">
                <h2 class="text-center">¡NUEVO RÉCORD!</h2>
            </div>
            <div v-else>

            </div>
            <div> 
                <p class="text-center">Tu puntuación es de: {{ score }} pts</p>
            </div>
            <div class="puntuacion-buttons">
                <router-link :to="{ name: 'rankings.details', params: { id: route.params.id }}">
                    <button>VER RANKING</button>
                </router-link>
                <router-link to="/">
                    <button class="mb-5">INICIO</button>
                </router-link>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, computed, onUnmounted, inject, nextTick, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import useForms from '@/composables/forms';
import useFormulariosRespondidos from '@/composables/formularios_respondidos';
import { authStore } from '@/store/auth';
import confetti from 'canvas-confetti';

const store = authStore();
const router = useRouter();
const route = useRoute();
const { getForm, selectedPreguntas, getPreguntasSinRespuesta, verificarRespuesta, isLoading } = useForms();
const { storeFormulariosRespondidos, formularioRespondido, getScoreAnterior, updateFormularioRespondido, scoreAnterior } = useFormulariosRespondidos();
const currentQuestionIndex = ref(0);
const score = ref(0);
let tiempoRestante = ref(0)
const swal = inject('$swal')
const tiempo = ref(0);
const interval = ref();
const mostrarScore = ref(false);
const preguntasTotales = computed(() => selectedPreguntas.value.length);

// Mostrar confetti si es récord de puntuación
const mostrarConfetti = async () => {
    await nextTick();
    const canvas = document.getElementById('confetti');
    canvas.confetti = canvas.confetti || confetti.create(canvas, { resize: true });
    canvas.confetti({
        particleCount: 150, 
        spread: 70,
        origin: { y: 1}, 
        ticks: 300,
        gravity: 0.1
    });
};


const preguntaActual = computed(() => {
    return selectedPreguntas.value && selectedPreguntas.value.length > 0 ? selectedPreguntas.value[currentQuestionIndex.value] : null;
});

// Validador de la respuesta seleccionada (si es correcta o no)
const seleccionRespuesta = async (respuesta) => {
    endProgress();
    if (preguntaActual.value) {
        const result = await verificarRespuesta(preguntaActual.value, respuesta);
        if(result){
            const puntosPorTiempo = tiempoRestante.value * 10;
            score.value += puntosPorTiempo;
        }
        mostrarMensaje(result);
    }
};

// Pasar a la siguiente pregunta con la validación para saber si quedan mas preguntas o no
const siguientePregunta = () => {
    if (currentQuestionIndex.value < selectedPreguntas.value.length - 1) {
        currentQuestionIndex.value++;
        startProgress();
    }else{
        endProgress();        
        mostrarScore.value = true;
        console.log(score.value);
        console.log(scoreAnterior.value);
        if (score.value > scoreAnterior.value) {
            if(scoreAnterior.value !== 0){
                formularioRespondido.value.formulario_id = route.params.id;
                formularioRespondido.value.user_id = store.user.id;
                formularioRespondido.value.score = score.value;
                updateFormularioRespondido(formularioRespondido.value);
                // console.log("formulario actualizado");
                // console.log(formularioRespondido.value);
                mostrarScore.value = true;
            }else{                
                storeFormulariosRespondidos(route.params.id, score.value);
                console.log(route.params.id, score.value);
                // console.log("formulario creado");
            }
            mostrarConfetti();
        } else {
            mostrarScore.value = true;
            // console.log("puntuacion inferior a la anterior");
        }      
    }
};

// Mostrar mensajes de pregunta correcta o incorrecta
const mostrarMensaje = (result) => {
    tiempo.value = 0;
    tiempoRestante.value = 100; 
    if (result) {     
        swal({
            icon: 'success',
            title: 'Has acertado!',
            showConfirmButton: false,
            timer: 3000,
            allowOutsideClick: false,
            customClass: {
                popup: 'swal'
            }
        }).then(() => {
            siguientePregunta();
        })

    } else {
        swal({
            icon: 'error',
            title: 'Has fallado...',
            showConfirmButton: false,
            timer: 3000,
            allowOutsideClick: false,
            customClass: {
              popup: 'swal'
          }
        }).then(() => {
            siguientePregunta();
        })

    }
};

// Método para iniciar la barra de carga
const startProgress = () => {
    interval.value = setInterval(() => {
        let newValue = tiempo.value + 1;
        if (newValue >= 100) {
            newValue = 100;
            tiempoRestante.value = 0;
            endProgress();
            mostrarMensaje(false);
            return;
        }
        tiempo.value = newValue;
        tiempoRestante.value = 100 - newValue;
    }, 300);
};

// Método para parar la barra de carga
const endProgress = () => {
    clearInterval(interval.value);
    interval.value = null;
}


// Método para gestionar el abandono del formulario
const abandonar = () => {
    endProgress();
    swal({
        title: 'Seguro que quieres abandonar?',
        text: 'Perderás tu puntuación actual!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, quiero abandonar!',
        confirmButtonColor: '#ef4444',
        allowOutsideClick: false,
        reverseButtons: true,
        customClass: {
            popup: 'swal'
        }
    })
    .then(result => {
        if(result.isConfirmed){
            router.push({ name: 'forms.details', params: { id: route.params.id } });
        }else{
            startProgress();
        }
    })
}

// Cargar los datos del formulario
onMounted(() => {
    // console.log(route.params.id);
    getForm(route.params.id);
    getPreguntasSinRespuesta(route.params.id).then(() => {
        currentQuestionIndex.value = 0;
        tiempo.value = 0
        tiempoRestante.value = 100;
    });
   getScoreAnterior(store.user.id, route.params.id);
});

onUnmounted(() => {
    endProgress();
});


// Gestionar el loading para que el contador empiece al desaparecer el loading
watch(isLoading, (newVal) => {
    if (!newVal) {
        startProgress();
    }
});
</script>

<style scoped>
.video-fondo-div {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}

.video-fondo {
    position: absolute;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -1;
    object-fit: cover;
    filter: blur(10px);
}

/* contenedor preguntas */
.container{
    padding: 50px;
    height: 100%;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}

.text-section{
    border: 1px solid #874eca;
    width: 100%;
    border-radius: 20px;
    background-color: #402462;
}


.top-preguntas{
    display: flex;
    justify-content: center;
    color: #FFFFFF;
    margin-top: -25px;
    font-size: 1.2rem;
    font-weight: bold;
}

.top-preguntas p{
    padding: 10px 30px;
    border-radius: 25px;
    border: 1px solid #874eca;
    background-color: #402462;
}

.text-section-interior{
    padding: 30px;
    padding-top: 20px
}

/* Estilos barra de carga */
.p-progressbar{
    border: 1px solid #874eca;
    --p-progressbar-value-background: #874eca;
    --p-progressbar-label-color: #874eca;
    background-color: #4f2f77;
}

/* Estilos de datos de la pregunta */
.header-container{
    width: 100%;
}

.header-container .header-score{
    display: flex;
    justify-content: center;;
    padding-top: 50px;
    color: #FFFFFF;
}

h2{   
    font-weight: bolder;
    font-size: 2.5rem;
    margin-bottom: 0px;
}

.white-section{
    padding-top: 25px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    align-items: center;
    color: #FFFFFF; 
    gap: 15px;  

}

.white-section .header{
    display: flex;
    align-items: center;
    gap: 20px;
}


.white-section h4{
    font-size: 1.8rem;
    padding-bottom: 50px;
}

.white-section p{
    font-size: 1.3rem;
}

/* Estilos del botón abandonar */
.exit-div{
    width: 100%;
    display: flex;
    justify-content: flex-end;
}

.exit-button {
    font-size: 1.2rem;
    color: white;
    text-decoration: none;
    background-color: #e84118;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
    font-weight: normal;
    border: none;
}


.exit-button:hover {
    background-color: #aa2608;
}

/* Estilos de los botones de respuesta */
.buttons-section{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
}

.buttons-section{
    padding-top: 20px;
    padding-bottom: 20px;
}

.kahoot-button {
    font-size: 2rem;
    padding: 40px 80px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    color: #FFFFFF;
    
}

.kahoot-button.red {
    background-color: #1E90FF;
    box-shadow: rgb(20, 98, 134) 0px 10px 0px 0px;
}

.kahoot-button.blue {
    background-color: #50af70;    
    box-shadow: rgb(0, 110, 77) 0px 10px 0px 0px;
}

.kahoot-button.green {
    background-color:#ffae00;
    box-shadow: rgb(184, 141, 0) 0px 10px 0px 0px;
}

.kahoot-button.yellow {
    background-color: #FF6347;
    box-shadow: rgb(156, 0, 0) 0px 10px 0px 0px;
}

.kahoot-button.red:hover {
    box-shadow: rgb(20, 98, 134) 0px 7px 0px 0px;
    transform: translateY(5px);
}

.kahoot-button.blue:hover {
    box-shadow: rgb(0, 110, 77) 0px 7px 0px 0px;
    transform: translateY(5px);
}

.kahoot-button.green:hover {
    box-shadow: rgb(184, 141, 0) 0px 6px 0px 0px;
    transform: translateY(5px);
}

.kahoot-button.yellow:hover {
    box-shadow: rgb(156, 0, 0) 0px 7px 0px 0px;
    transform: translateY(5px);
}


/* Responsive móvil */
@media (max-width: 768px) {
    .container{
        padding: 20px;
        padding-top: 30px
    }

    .text-section-interior{
        padding: 15px;
        padding-top: 20px;
    }

    .white-section{
        padding-top: 0px;
    }

    .white-section h4{
        padding-bottom: 0px;
    }
    .buttons-section {
        padding-top: 20px;
        padding-bottom: 20px;
        grid-template-columns: repeat(1, 1fr);
        gap: 20px;
    }

    .white-section {
        margin-top: 20px;
    }
    
    .kahoot-button{
        font-size: 1.5rem;
        padding: 20px 30px;
    }

    .header-container .header-score{
        padding-top: 20px;
    }

    .puntuacion-buttons button{
      width: 250px !important;
    }

    .container-puntuacion-final p{
      font-size: 1.5rem !important;
    }
}

/* Contenedor puntuación final */
.container-puntuacion-final{
    height: 100%;
    width: 100%;
    border-radius: 25px;
    background-color: rgb(64, 36, 98, 0.85);
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    gap: 20px;
    color: white;
}

.container-puntuacion-final div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.container-puntuacion-final img{
    width: 200px;
    height: 200px;
    padding-bottom: 25px;
}

.container-puntuacion-final h2{
    font-size: 4rem;
    font-weight: bold;
}

.container-puntuacion-final p{
    font-size: 2rem;
}

.puntuacion-buttons button{
    font-size: 1.5rem;
    padding: 15px 30px;
    border: 1px solid #874eca;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 400px;
    color: #FFFFFF;
    background-color: #874eca;
    margin-top: 30px;
    font-weight: bold;
    transition: all 0.2s ease-in-out;
}

.puntuacion-buttons button:hover{
    background-color: #402462;
}

/* Posición del confetti */
.confetti-canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; 
    z-index: 1; 
}

/* Contenedor isLoading */
.container-cargando{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    background-color: #402462;
    height: 100vh;
    width: 100%;
}

.cargando{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    background-color: #7951aa85;
    padding: 75px;
    border-radius: 25px;
    border: 1px solid #874eca;
}

.cargando h3{
    color: #FFFFFF;
    font-size: 3rem;
    font-weight: bold;
    font-family: 'Atma';
}


/* Estilos del lápiz de la pantalla de carga */
.pencil {
  display: block;
  width: 10em;
  height: 10em;
}

.pencil__body1,
.pencil__body2,
.pencil__body3,
.pencil__eraser,
.pencil__eraser-skew,
.pencil__point,
.pencil__rotate,
.pencil__stroke {
  animation-duration: 3s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.pencil__body1,
.pencil__body2,
.pencil__body3 {
  transform: rotate(-90deg);
}

.pencil__body1 {
  animation-name: pencilBody1;
}

.pencil__body2 {
  animation-name: pencilBody2;
}

.pencil__body3 {
  animation-name: pencilBody3;
}

.pencil__eraser {
  animation-name: pencilEraser;
  transform: rotate(-90deg) translate(49px,0);
}

.pencil__eraser-skew {
  animation-name: pencilEraserSkew;
  animation-timing-function: ease-in-out;
}

.pencil__point {
  animation-name: pencilPoint;
  transform: rotate(-90deg) translate(49px,-30px);
}

.pencil__rotate {
  animation-name: pencilRotate;
}

.pencil__stroke {
  animation-name: pencilStroke;
  transform: translate(100px,100px) rotate(-113deg);
}

/* Animations */
@keyframes pencilBody1 {
  from,
	to {
    stroke-dashoffset: 351.86;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 150.8;
 /* 3/8 of diameter */
    transform: rotate(-225deg);
  }
}

@keyframes pencilBody2 {
  from,
	to {
    stroke-dashoffset: 406.84;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 174.36;
    transform: rotate(-225deg);
  }
}

@keyframes pencilBody3 {
  from,
	to {
    stroke-dashoffset: 296.88;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 127.23;
    transform: rotate(-225deg);
  }
}

@keyframes pencilEraser {
  from,
	to {
    transform: rotate(-45deg) translate(49px,0);
  }

  50% {
    transform: rotate(0deg) translate(49px,0);
  }
}

@keyframes pencilEraserSkew {
  from,
	32.5%,
	67.5%,
	to {
    transform: skewX(0);
  }

  35%,
	65% {
    transform: skewX(-4deg);
  }

  37.5%, 
	62.5% {
    transform: skewX(8deg);
  }

  40%,
	45%,
	50%,
	55%,
	60% {
    transform: skewX(-15deg);
  }

  42.5%,
	47.5%,
	52.5%,
	57.5% {
    transform: skewX(15deg);
  }
}

@keyframes pencilPoint {
  from,
	to {
    transform: rotate(-90deg) translate(49px,-30px);
  }

  50% {
    transform: rotate(-225deg) translate(49px,-30px);
  }
}

@keyframes pencilRotate {
  from {
    transform: translate(100px,100px) rotate(0);
  }

  to {
    transform: translate(100px,100px) rotate(720deg);
  }
}

@keyframes pencilStroke {
  from {
    stroke-dashoffset: 439.82;
    transform: translate(100px,100px) rotate(-113deg);
  }

  50% {
    stroke-dashoffset: 164.93;
    transform: translate(100px,100px) rotate(-113deg);
  }

  75%,
	to {
    stroke-dashoffset: 439.82;
    transform: translate(100px,100px) rotate(112deg);
  }
}.pencil {
  display: block;
  width: 10em;
  height: 10em;
}

.pencil__body1,
.pencil__body2,
.pencil__body3,
.pencil__eraser,
.pencil__eraser-skew,
.pencil__point,
.pencil__rotate,
.pencil__stroke {
  animation-duration: 3s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.pencil__body1,
.pencil__body2,
.pencil__body3 {
  transform: rotate(-90deg);
}

.pencil__body1 {
  animation-name: pencilBody1;
}

.pencil__body2 {
  animation-name: pencilBody2;
}

.pencil__body3 {
  animation-name: pencilBody3;
}

.pencil__eraser {
  animation-name: pencilEraser;
  transform: rotate(-90deg) translate(49px,0);
}

.pencil__eraser-skew {
  animation-name: pencilEraserSkew;
  animation-timing-function: ease-in-out;
}

.pencil__point {
  animation-name: pencilPoint;
  transform: rotate(-90deg) translate(49px,-30px);
}

.pencil__rotate {
  animation-name: pencilRotate;
}

.pencil__stroke {
  animation-name: pencilStroke;
  transform: translate(100px,100px) rotate(-113deg);
}

/* Animations */
@keyframes pencilBody1 {
  from,
	to {
    stroke-dashoffset: 351.86;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 150.8;
 /* 3/8 of diameter */
    transform: rotate(-225deg);
  }
}

@keyframes pencilBody2 {
  from,
	to {
    stroke-dashoffset: 406.84;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 174.36;
    transform: rotate(-225deg);
  }
}

@keyframes pencilBody3 {
  from,
	to {
    stroke-dashoffset: 296.88;
    transform: rotate(-90deg);
  }

  50% {
    stroke-dashoffset: 127.23;
    transform: rotate(-225deg);
  }
}

@keyframes pencilEraser {
  from,
	to {
    transform: rotate(-45deg) translate(49px,0);
  }

  50% {
    transform: rotate(0deg) translate(49px,0);
  }
}

@keyframes pencilEraserSkew {
  from,
	32.5%,
	67.5%,
	to {
    transform: skewX(0);
  }

  35%,
	65% {
    transform: skewX(-4deg);
  }

  37.5%, 
	62.5% {
    transform: skewX(8deg);
  }

  40%,
	45%,
	50%,
	55%,
	60% {
    transform: skewX(-15deg);
  }

  42.5%,
	47.5%,
	52.5%,
	57.5% {
    transform: skewX(15deg);
  }
}

@keyframes pencilPoint {
  from,
	to {
    transform: rotate(-90deg) translate(49px,-30px);
  }

  50% {
    transform: rotate(-225deg) translate(49px,-30px);
  }
}

@keyframes pencilRotate {
  from {
    transform: translate(100px,100px) rotate(0);
  }

  to {
    transform: translate(100px,100px) rotate(720deg);
  }
}

@keyframes pencilStroke {
  from {
    stroke-dashoffset: 439.82;
    transform: translate(100px,100px) rotate(-113deg);
  }

  50% {
    stroke-dashoffset: 164.93;
    transform: translate(100px,100px) rotate(-113deg);
  }

  75%,
	to {
    stroke-dashoffset: 439.82;
    transform: translate(100px,100px) rotate(112deg);
  }
}

</style>
