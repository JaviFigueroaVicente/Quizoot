<template>
    <div class="container text-center">
        <div class="row row-cols-3">
            <div class="col">
                <router-link :to="{ name: 'profile.edit' }">
                    <div>
                        <img src="/images/icons/edit.svg" alt="">
                        <h4>Editar Perfil</h4>                    
                    </div>
                </router-link>
            </div>
            <div class="col">
                <router-link :to="{ name: 'mis-formularios.create' }">
                    <div>
                        <img src="/images/icons/add.svg" alt="">
                        <h4>Crear Formulario</h4>                    
                    </div>
                </router-link>
            </div>
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-preguntas.create' }">
                        <div>
                            <img src="/images/icons/add.svg" alt="">
                            <h4>Crear Pregunta</h4>                    
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="row row-cols-3">
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-formularios.index' }">
                        <div>
                            <img src="/images/icons/description.svg" alt="">
                            <h4>Mis Formularios</h4>
                        </div>
                    </router-link>
                </div>
            </div>
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-preguntas.index'}">
                        <div>
                            <img src="/images/icons/question.svg" alt="">
                            <h4>Mis Preguntas</h4>
                        </div>
                    </router-link>
                </div>
            </div>
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-formularios.mis-respondidos'}">
                        <div>
                            <img src="/images/icons/respondidos.svg" alt="">
                            <h4>Formularios Respondidos</h4>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="row row-cols-3">
            <div class="col">
                <router-link to="/logout" @click="logout">
                    <div>
                        <img src="/images/icons/logout.svg" alt="">
                        <h4>Cerrar sesión</h4>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script setup>
import useAuth from "@/composables/auth";
const { logout } = useAuth();

const store = useAuth();

</script>

<style scoped>
.container{
    margin-top: 2em;
}

h4{
    color: #ffffff;
}

.col{
    background-color: #b26fff;
    margin: 20px;
    border-radius: 10px;
    height: 10em;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: all 0.3s ease ;   
    box-shadow: 0px 8px 0px 0px rgba(136, 78, 202, 0.5);
}   
.col:hover{
    cursor: pointer;
    transform: translateY(5px);
    box-shadow: 0px 4px 0px 0px rgba(136, 78, 202, 0.5);
    background-color: #874ECA;
}
img{
    width: 40px;
    height: 40px;
}
</style>