<template>
    <section v-if="!mostrarScore" class="container">
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
    <section v-else class="container">
        <div class="video-fondo-div">
            <video class="video-fondo" src="/images/Home/fondo3.mp4" autoplay="true" muted="true" loop="true"></video>        
        </div>
        <div class="container-puntuacion-final">    
            <canvas v-if="scoreAnterior !== null && score > scoreAnterior" id="confetti" class="confetti-canvas"></canvas>          
            <div v-if="scoreAnterior !== null && score > scoreAnterior">  
                <img class="nuevo-record" src="/images/Icons/Corona.webp" alt="">
                <h2>¡NUEVO RÉCORD!</h2>
            </div>
            <div v-else>

            </div>
            <div> 
                <p>Tu puntuación es de: {{ score }} pts</p>
            </div>
            <div class="puntuacion-buttons">
                <router-link :to="{ name: 'rankings.details', params: { id: route.params.id }}">
                    <button>VER RANKING</button>
                </router-link>
                <router-link to="/forms">
                    <button>VER FORMULARIOS</button>
                </router-link>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, computed, onUnmounted, inject, nextTick } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import useForms from '@/composables/forms';
import useFormulariosRespondidos from '@/composables/formularios_respondidos';
import { authStore } from '@/store/auth';
import confetti from 'canvas-confetti';

const store = authStore();
const router = useRouter();
const route = useRoute();
const { getForm, selectedPreguntas, getPreguntasSinRespuesta, verificarRespuesta } = useForms();
const { storeFormulariosRespondidos, formularioRespondido, getScoreAnterior, updateFormularioRespondido, scoreAnterior } = useFormulariosRespondidos();
const currentQuestionIndex = ref(0);
const score = ref(0);
let tiempoRestante = ref(0)
const swal = inject('$swal')
const tiempo = ref(0);
const interval = ref();
const mostrarScore = ref(false);
const preguntasTotales = computed(() => selectedPreguntas.value.length);

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

const mostrarMensaje = (result) => {
    tiempo.value = 0;
    tiempoRestante.value = 100; 
    if (result) {     
        swal({
            icon: 'success',
            title: 'Has acertado!',
            showConfirmButton: false,
            timer: 3000,
            allowOutsideClick: false 
        }).then(() => {
            siguientePregunta();
        })

    } else {
        swal({
            icon: 'error',
            title: 'Has fallado...',
            showConfirmButton: false,
            timer: 3000,
            allowOutsideClick: false 
        }).then(() => {
            siguientePregunta();
        })

    }
};

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

const endProgress = () => {
    clearInterval(interval.value);
    interval.value = null;
}

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
        reverseButtons: true
    })
    .then(result => {
        if(result.isConfirmed){
            router.push({ name: 'forms.details', params: { id: route.params.id } });
        }else{
            startProgress();
        }
    })
}

onMounted(() => {
    // console.log(route.params.id);
    getForm(route.params.id);
    getPreguntasSinRespuesta(route.params.id).then(() => {
        currentQuestionIndex.value = 0;
        tiempo.value = 0
        tiempoRestante.value = 100;
        startProgress();
    });
   getScoreAnterior(store.user.id, route.params.id);
});

onUnmounted(() => {
    endProgress();
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

.p-progressbar{
    border: 1px solid #874eca;
    --p-progressbar-value-background: #874eca;
    --p-progressbar-label-color: #874eca;
    background-color: #4f2f77;
}

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

.buttons-section{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
}


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


.confetti-canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; 
    z-index: 1; 
}

</style>
