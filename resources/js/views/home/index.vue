<template>
    <main>
        <section class="section-principal">
            <video src="/images/Home/Home_Fondo.mp4" autoplay="true" muted="true" loop="true"></video>
            <div class="section-principal-top">
                <h1>BIENVENIDO A <strong>QUIZOOT</strong></h1>
                <p>Únete a millones de jugadores en la plataforma de <br>aprendizaje más divertida</p>
                <button class="button-aprende">¡APRENDE AHORA!</button>
            </div>
        </section>
        <section class="section-cards">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <img src="images/Home/play.webp" class="card-img-top play" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Jugar <img src="images/icons/play.svg" class="icon" alt=""></h5>
                            <p class="card-text">Selecciona un formulario de una infinidad de categorías y mídete con el resto de jugadores.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="images/Home/pencil.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Crear <img src="images/icons/pencil.svg" class="icon" alt=""></h5>
                            <p class="card-text">Crea tu propio formulario personalizado y pon a prueba a los conocimientos de la comunidad.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="images/Home/trophy.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ranking <img src="images/icons/trophy.svg" class="icon" alt=""></h5>
                            <p class="card-text">Comparate con el resto de jugadores en un ranking global, o escoge un formulario para descubrir tu mejor puntuación.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="images/Home/form.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Random <img src="images/icons/dice.svg" class="icon" alt=""></h5>
                            <p class="card-text">Nosotros escogemos por ti! Prueba cuánto sabes de una categoría aleatoria.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-comenzar">
            <div class="card mb-8">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="images/Home/cohete.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">¿LISTO PARA COMENZAR?</h5>
                            <p class="card-text">Preparado para llegar al top 1 del ranking?</p>
                            <button class="button-aprende">CONTESTAR FORMULARIO</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</template>
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
    
    video{
        position: absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
        max-width: 100%;
        width: auto;
        height: auto;
        z-index: -1000;
        overflow: hidden;
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
    .button-aprende{
        margin-top: 1em;
        height: 75px;
        width: 50%;
        font-size: 1.56rem;
        font-weight: bold;
        border-radius: 50px;
        background-color: #874ECA;
        color: #ffffff;
        border: none;
        transition: all 0.2s ease;
        min-height: 75px;
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
    /* SECTION COMENZAR */
    
    .section-comenzar{
        margin-top: 10%;
        background-color: #402462;
        display: flex;
        justify-content: center;
        padding-bottom: 10%;
    }

    .section-comenzar .card{
        margin-top: 10%;
        opacity: 0.75;
        border-radius: 15px;   
        padding: 0;    
        width: 70%;
        height: 60%;
    }

    .section-comenzar .row{
        width: 70%;
    }

    .section-comenzar img{
        height: 100%;
    }

    
</style>