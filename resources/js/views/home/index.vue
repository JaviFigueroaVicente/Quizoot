<template>
    <main>
        <section class="section-principal">
            <div class="section-principal-top">
                <h1>BIENVENIDO A <strong>QUIZOOT</strong></h1>
                <p>Únete a millones de jugadores en la plataforma de <br>aprendizaje más divertida</p>
                <button class="button-aprende">¡APRENDE AHORA!</button>
            </div>
        </section>
        <section>

        </section>
    </main>    
</template>
<style scoped>
    section{
        text-align: center;
       
    }

    .section-principal{
        background-image: url("./images/Home/Fondo_Home.webp");
    }
    
    .section-principal-top{
        padding-top: 5em;
        margin-left: 20%;
        margin-right: 20%;
        background-color: #ffffff;
        height: 450px;
        -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
        mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
    }
    h1{
        font-size: 3.75rem;
        font-weight: bold;
        margin-bottom: 0.5em;
        letter-spacing: 5%;
        line-height: 75px;
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
    }

    .button-aprende:hover{
        background-color: #402462 !important;
    }
</style>