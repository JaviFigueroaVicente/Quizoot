<template>
<h1>{{ formularioRespondido.score }}</h1>
</template>

<script setup>
import { onMounted } from 'vue';
import useFormulariosRespondidos from '@/composables/formularios_respondidos';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();
const { getFormularioRespondido, formularioRespondido } = useFormulariosRespondidos(); 

onMounted(() => {
    getFormularioRespondido(route.params.id);
})
</script>

<style scoped></style>