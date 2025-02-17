<template>
    <div class="card border-0">
        <div class="card-header bg-transparent">
            <h5 class="float-start">Profile</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="alias" class="form-label">Alias</label>
                <input type="text" v-model="usuario.alias" class="form-control" id="alias">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="usuario.name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="surname1" class="form-label">First Surname</label>
                <input type="text" v-model="usuario.surname1" class="form-control" id="surname1">
            </div>
            <div class="mb-3">
                <label for="surname2" class="form-label">Second Surname</label>
                <input type="text" v-model="usuario.surname2" class="form-control" id="surname2">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" v-model="usuario.email" class="form-control" id="email" readonly>
            </div>
            <div class="mb-3">    
                <button type="submit" @click="onFormSubmit" class="btn btn-primary">
                    Update
                </button>        
            </div>
            <Toast />
        </div>
    </div>
</template>
<style scoped>
    .card {
        width: 50%;
        border: 1px solid #d6d6d6 !important;
        margin-top: 10px;
        justify-content: center;
    }
    
</style>
<script setup>
import { onMounted, reactive, watchEffect,ref, inject } from "vue";
// import { useField, defineRule } from "vee-validate";
import { required, min } from "@/validation/rules";
import { authStore } from '@/store/auth';
import { useRoute, useRouter } from "vue-router"; 
import { useToast } from "primevue/usetoast";
import * as yup from "yup";
import { es } from "yup-locales";

yup.setLocale(es);
const route = useRoute()
const router = useRouter()
const store = authStore();
const usuario = ref({});
const errors = ref({})
const swal = inject('$swal')

const schema = yup.object().shape({
    alias: yup.string().required(),
    name: yup.string().required().min(3),
    surname1: yup.string(),
    surname2: yup.string(),
    email: yup.string().required().email(),
});

const updateUser = async () =>{
    axios.put('/api/user/' + store.user.id, usuario.value)
        .then((response) => {
            swal({
                    icon: 'success',
                    title: 'Usuario actualizado',
                    showConfirmButton: false,
                    timer: 1500
                })
            usuario.value = response.data.data;
            router.push('/app/profile');
        })
        .catch(() => {
            Toast.add({
                severity: 'error',
                summary: 'Error',
                detail: 'Error al actualizar el usuario',
                life: 3000,
            });
        })
};

onMounted(() => {
    console.log(route.params.id);

    axios.get('/api/users/' + store.user.id)
        .then((response) => {
            usuario.value = response.data.data;
        })
})

const onFormSubmit = () => {
    schema.validate(usuario.value, { abortEarly: false })
        .then(() => {
            updateUser();
        })
};
// defineRule('required', required);
// defineRule('min', min);

// const { value: alias } = useField('alias');
// const { value: name } = useField('name');
// const { value: surname1 } = useField('surname1');
// const { value: surname2 } = useField('surname2');
// const { value: email } = useField('email');

// const profile = reactive({
//     alias,
//     name,
//     surname1,
//     surname2,
//     email,
// });




// const schema = yup.object().shape({
//     alias: yup.string().required(),
//     name: yup.string().required().min(3),
//     surname1: yup.string(),
//     surname2: yup.string(),
//     email: yup.string().required().email(),
// });

// const updateUser = async () => {
//     const response = await axios.put(`/api/users/${store.user.id}`, profile);

//     console.log("Respuesta del servidor:", response.data); 

//     const updatedUser = response.data;
//     store.setUser(updatedUser);

//     toast.add({
//         severity: 'success',
//         summary: 'Success',
//         detail: 'Profile updated',
//         life: 3000,
//     });
// };

// onMounted(() => {
//     profile.alias = store.user.alias || '';
//     profile.name = store.user.name || '';
//     profile.surname1 = store.user.surname1 || '';
//     profile.surname2 = store.user.surname2 || '';
//     profile.email = store.user.email || '';
// });





// const onFormSubmit = () => {
//     schema.validate(profile, { abortEarly: false })
//         .then(() => {
//             console.log("Datos enviados al servidor:", profile);
//             updateUser();
//         });
// };

// watchEffect(() => {
//     profile.alias = store.user.alias || '';
//     profile.name = store.user.name || '';
//     profile.surname1 = store.user.surname1 || '';
//     profile.surname2 = store.user.surname2 || '';
//     profile.email = store.user.email || '';
// });
</script>