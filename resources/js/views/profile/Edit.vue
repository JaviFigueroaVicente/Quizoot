<template>
    <div class="main-container">
        <div class="card border-0 left-container">
            <div class="card-header bg-transparent">
                <h5 class="float-start">Profile Image</h5>
            </div>
            <div class="image-container">
                <img :src="usuario.avatar || '/images/Nav/PerfilSinFoto.webp'" alt="Profile Image" class="profile-image" />
                <DropZone v-model="imagenFile" />
            </div>
            <button type="submit" @click="onFormSubmitIMG" class="btn btn-primary w-100 mt-5">
                Update Image
            </button> 
        </div>
        <div class="card border-0 rigth-container">
            <div class="card-header bg-transparent">
                <h5 class="float-start">Profile Details</h5>
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
                <button type="submit" @click="onFormSubmit" class="btn btn-primary w-100 mt-5">
                    Update Profile
                </button> 
            </div>
        </div>        
    </div> 
    <Toast />
</template>

<style scoped>
    .card {
        width: 50%;
        border: 1px solid #d6d6d6 !important;
        margin-top: 10px;
        justify-content: center;
    }

    .image{
        margin: 15px;
    }

    .image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
        border: 2px solid #ccc; /* Borde opcional */
    }

    .main-container {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: flex-start;
    }

    .left-container {
        flex: 1;
    }

    .right-container {
        flex: 2;
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
import DropZone from "@/components/DropZone.vue";

yup.setLocale(es);
const route = useRoute()
const router = useRouter()
const store = authStore();
const errors = ref({})
const swal = inject('$swal')

const schema = yup.object().shape({
    alias: yup.string().required(),
    name: yup.string().required().min(3),
    surname1: yup.string(),
    surname2: yup.string(),
    email: yup.string().required().email(),
});

const usuario = ref({
    alias: '',
    name: '',
    surname1: '',
    surname2: '',
    email: '',
});

// Variable para el archivo de imagen
const imagenFile = ref(null);

const updateUser = async () => {
    axios.post('/api/user/' + store.user.id, usuario.value)
    .then((response) => {
        swal({
            icon: 'success',
            title: 'Usuario actualizado',
            showConfirmButton: false,
            timer: 1500
        });
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
    });
};

// Función para actualizar solo la imagen
const updateImage = async () => {
    if (!imagenFile.value) {
        toast.add({
            severity: 'error',
            summary: 'Error',
            detail: 'Debe seleccionar una imagen',
            life: 3000,
        });
        return;
    }

    // Crear FormData para enviar el archivo
    const formData = new FormData();
    formData.append('users', imagenFile.value);
    
    // Crear un objeto URL para la vista previa inmediata
    const previewUrl = URL.createObjectURL(imagenFile.value);
    // Actualizar la vista de la imagen inmediatamente
    usuario.value.avatar = previewUrl;
    
    axios.post('/api/user/updateimg/' + store.user.id, formData)
    .then((response) => {
        swal({
            icon: 'success',
            title: 'Imagen actualizada',
            showConfirmButton: false,
            timer: 1500
        });
        // Actualizar el store con la nueva imagen desde la respuesta del servidor
        if (response.data && response.data.media && response.data.media.length > 0) {
            const serverImageUrl = response.data.media[0].original_url;
            usuario.value.avatar = serverImageUrl;
            
            if (store.user) {
                store.user.thumbnail = serverImageUrl;
                store.user.avatar = serverImageUrl;
            }
        }
    })
    .catch((error) => {
        console.error('Error al actualizar la imagen:', error);
        toast.add({
            severity: 'error',
            summary: 'Error',
            detail: 'Error al actualizar la imagen',
            life: 3000,
        });
        
        // En caso de error, revertir al avatar anterior
        axios.get('/api/users/' + store.user.id)
            .then((response) => {
                if (response.data && response.data.data) {
                    usuario.value.avatar = response.data.data.avatar;
                }
            });
    });
};

const onFormSubmit = () => {
    schema.validate(usuario.value, { abortEarly: false })
        .then(() => {
            updateUser();
        })
};

// Validación y envío del formulario de imagen
const onFormSubmitIMG = () => {
    if (imagenFile.value) {
        updateImage();
        // window.location.reload();
        router.push({ name: 'profile.index' });
    } else {
        toast.add({
            severity: 'error',
            summary: 'Error',
            detail: 'Debe seleccionar una imagen',
            life: 3000,
        });
    }
};

onMounted(() => {
    console.log(route.params.id);

    axios.get('/api/users/' + store.user.id)
        .then((response) => {
            usuario.value = response.data.data;
        })
})


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

//     console.log("Respuestas del servidor:", response.data);

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
