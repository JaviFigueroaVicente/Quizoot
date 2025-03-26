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
                        <img src="/images/icons/crear_form.svg" alt="">
                        <h4>Crear Formulario</h4>                    
                    </div>
                </router-link>
            </div>
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-preguntas.create' }">
                        <div>
                            <img src="/images/icons/crear_form.svg" alt="">
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
                            <img src="/images/icons/form.png" alt="">
                            <h4>Mis Formularios</h4>
                        </div>
                    </router-link>
                </div>
            </div>
            <div class="col">
                <div>
                    <router-link :to="{ name: 'mis-preguntas.index'}">
                        <div>
                            <img src="/images/icons/question.png" alt="">
                            <h4>Mis Preguntas</h4>
                        </div>
                    </router-link>
                </div>
            </div>
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

</script>

<style scoped>
.container{
    margin-top: 5em;
}
.col{
    background-color: #ffffff;
    margin: 20px;
    border: 1px solid #d6d6d6;
    border-radius: 10px;
    height: 10em;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: all 0.3s ease ;
}   
.col:hover{
    background-color: #d6d6d6;
    border-color: #000000;
    cursor: pointer;
    transform: scale(1.05);

}
img{
    width: 40px;
    height: 40px;
}
</style>