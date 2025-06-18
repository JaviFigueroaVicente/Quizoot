<template>
    <div class="main-container">
        <div class="left-container card">
            <div class="border-0 card-body card-main">
                <div class="card-header bg-transparent mt-3 mb-3">
                    <h5 class="float-start titles">PROFILE IMAGE</h5>
                </div>
                <div class="image-container">
                    <!-- <img :src="usuario.avatar || '/images/Nav/PerfilSinFoto.webp'" alt="Profile Image" class="profile-image" /> -->
                    <FileUpload
                        name="picture"
                        @before-upload="onBeforeUpload"
                        @upload="onTemplatedUpload($event)"
                        accept="image/*"
                        :maxFileSize="1500000"
                        @select="onSelectedFiles"
                        pt:content:class="fu-content"
                        pt:buttonbar:class="fu-header"
                        pt:root:class="fu"
                        class="fu"
                        v-model="imagenFile"
                        >

                        <template #header="{ chooseCallback, uploadCallback, clearCallback, files, uploadedFiles }">
                            <div class="flex flex-wrap justify-content-between align-items-center flex-1 gap-2">
                                <div class="flex gap-2">
                                    <Button class="boton" @click="chooseCallback()" icon="pi pi-images" rounded outlined></Button>
                                    <Button class="boton" @click="uploadEvent(uploadCallback, uploadedFiles)" icon="pi pi-cloud-upload" rounded outlined severity="success" :disabled="!files || files.length === 0"></Button>
                                    <Button class="boton" @click="clearCallback()" icon="pi pi-times" rounded outlined severity="danger" :disabled="!files || files.length === 0"></Button>
                                </div>
                                <p class="mt-4 mb-0">Arrastra y suelta la imagen aquí.</p>
                            </div>
                        </template>

                        <template #content="{ files, uploadedFiles, removeUploadedFileCallback, removeFileCallback }">
                            <img v-if=" files.length > 0" v-for="(file, index) of files" :key="file.name + file.type + file.size" role="presentation" :alt="file.name" :src="file.objectURL" class="object-fit-cover profile-image mt-3"/>
                            <div v-else>
                                <img v-if="uploadedFiles.length > 0" :key="uploadedFiles[uploadedFiles.length-1].name + uploadedFiles[uploadedFiles.length-1].type + uploadedFiles[uploadedFiles.length-1].size" role="presentation" :alt="uploadedFiles[uploadedFiles.length-1].name" :src="uploadedFiles[uploadedFiles.length-1].objectURL" class="object-fit-cover w-100 h-100 profile-image" />
                            </div>
                        </template>

                        <template #empty>
                            <img v-if="usuario.avatar" :src=usuario.avatar alt="Avatar" class="object-fit-cover profile-image">
                            <img v-if="!usuario.avatar" src="/images/Nav/PerfilSinFoto.webp" alt="Avatar Default" class="object-fit-cover profile-image">
                        </template>
                    </FileUpload>
                </div>
            </div>
            <button type="submit" @click="onFormSubmitIMG" class="btn-custom w-100 mt-5">
                UPDATE IMAGE
            </button> 
        </div>
        <div class="right-container card">
            <div class="border-0 card-main card-body">
                <div class="card-header bg-transparent mt-3 mb-3">
                    <h5 class="float-start titles">PROFILE DETAILS</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 input-form">
                        <input type="text" v-model="usuario.alias" class="form-control" id="alias">
                        <label for="alias" class="form-label">Alias</label>
                        <small class="text-danger" v-if="errors.alias">{{ errors.alias }}></small>
                    </div>
                    <div class="mb-3 input-form">
                        <input type="text" v-model="usuario.name" class="form-control" id="name">
                        <label for="name" class="form-label">Name</label>
                        <small class="text-danger" v-if="errors.name">{{ errors.name }}></small>
                    </div>
                    <div class="mb-3 input-form">
                        <input type="text" v-model="usuario.surname1" class="form-control" id="surname1">
                        <label for="surname1" class="form-label">First Surname</label>
                    </div>
                    <div class="mb-3 input-form">
                        <input type="text" v-model="usuario.surname2" class="form-control" id="surname2">
                        <label for="surname2" class="form-label">Second Surname</label>
                    </div>
                    <div class="mb-3 input-form">
                        <input type="email" v-model="usuario.email" class="form-control" id="email" readonly>
                        <label for="email" class="form-label">Email</label>
                    </div>
                </div>
            </div>      
            <button type="submit" @click="onFormSubmit" class="btn-custom w-100 mt-5">
                UPDATE PROFILE
            </button> 
        </div>
    </div> 
    <Toast />
</template>
<script setup>
import { onMounted, reactive, watchEffect, ref, inject } from "vue";
// import { useField, defineRule } from "vee-validate";
import { authStore } from '@/store/auth';
import { useRoute, useRouter } from "vue-router";
import * as yup from "yup";
import { es } from "yup-locales";

yup.setLocale(es);
const route = useRoute()
const router = useRouter()
const store = authStore();
const errors = ref({})
const swal = inject('$swal')

const schema = yup.object().shape({
    alias: yup.string().required("Alias es un campo requerido"),
    name: yup.string().required("Name es un campo requerido").min(3, "Name debe tener al menos 3 caracteres"),
    surname1: yup.string(),
    surname2: yup.string(),
    email: yup.string().required("Email es un campo requerido").email("Email no valido"),
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
    axios.put('/api/user/' + store.user.id, usuario.value)
    .then((response) => {
        swal({
            icon: 'success',
            title: 'Usuario actualizado',
            showConfirmButton: false,
            timer: 1500
        });
        usuario.value = response.data.data;
        router.push('/profile');
    })
    .catch(() => {
        swal({
            icon: 'error',
            title: 'Error al actualizar el usuario',
            showConfirmButton: false,
            timer: 1500
        })
    });
};

// Función para actualizar solo la imagen
const updateImage = async () => {
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
    try {
        schema.validateSync(usuario.value, { abortEarly: false });
        updateUser();
    } catch (err) {
        if (err instanceof yup.ValidationError) {
            errors.value = {};
            err.inner.forEach(error => {
                errors.value[error.path] = error.message;
            });
        } else {
            console.error(err);
        }
    }
};

// Validación y envío del formulario de imagen
const onFormSubmitIMG = () => {
    console.log(imagenFile.value);
    if (imagenFile.value) {
        updateImage();
        // window.location.reload();
        router.push({ name: 'profile.index' });
    } else {
        swal({
            icon: 'error',
            title: 'Error al actualizar la imagen',
            showConfirmButton: false,
            timer: 1500
        })
    }
};

onMounted(() => {
    console.log(route.params.id);

    axios.get('/api/users/' + store.user.id)
        .then((response) => {
            usuario.value = response.data.data;
        })
})

const totalSize = ref(0);
const totalSizePercent = ref(0);

const onBeforeUpload = (event) => {
    // console.log('onBeforeUpload')
    event.formData.append('id', user.id)
};

const uploadEvent = async (callback, uploadedFiles) => {
    console.log('uploadEvent');
    totalSizePercent.value = totalSize.value / 10;
    await callback();
};

const onSelectedFiles = (event) => {
     if (event.files.length === 0) {
        imagenFile.value = null;
        return;
    }

    // Tomamos solo el primer archivo
    const selectedFile = event.files[0];
    imagenFile.value = selectedFile;

    // Calcular tamaño total
    totalSize.value = selectedFile.size;
    totalSizePercent.value = (selectedFile.size / 1500000) * 100;

    console.log('Archivo asignado a imagenFile:', imagenFile.value);
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


<style scoped>   
    .label{
        color: #ffffff;
    }
    .input-form {
        position: relative;
    }
    .form-control {
        border: solid 1.5px #9e9e9e !important;
        background: #e8e8e850;
        padding: 1rem;
        font-size: 1rem;
        color: #f5f5f5;
        transition: border 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .form-label {
        position: absolute;
        left: 15px;
        color: #e8e8e8;
        pointer-events: none;
        transform: translateY(-2.5rem);
        transition: 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .form-control:focus, .form-control:not(:placeholder-shown) {
        outline: none;
        border: 1.5px solid #874eca;
        box-shadow: none;
    }

    .form-control:focus ~ label, .form-control:not(:placeholder-shown) ~ label {
        transform: translateY(-280%) scale(0.8) !important;
        background-color: transparent;
        padding: 0 .2em;
        color: #ffffff;
        box-shadow: none;
    }

    button{
        padding: 10px 30px;
        box-shadow: 0px 6px 0px 0px rgba(0, 0, 0, 0.3);
        transition: all 0.2s ease-in-out;
    }

    button:hover{
        box-shadow: 0px 3px 0px 0px rgba(0, 0, 0, 0.3);
        transform: translateY(4px);
    }

    h5{
        color: #ffffff !important;
    }

    p{
        color: #ffffff !important;
    }

    .titles {
        color: #874eca;
        font-weight: bold;
        font-size: 1.5rem;
    }
    .card {
        width: 50%;
        margin-top: 10px;
        background-color: transparent;
        border: none;
        justify-content: center;
    }

    .card-body{        
        background-color: #874eca;
        border-radius: 10px;
        padding: 20px !important;
    }

    .card-main{
        box-shadow: 2px 5px 0px 0px rgba(0, 0, 0, 0.4);
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
        margin-bottom: 20px;
        border: 2px solid #ccc;
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

    .fu-content {
        padding: 0px !important;
        border: 0px !important;
        border-radius: 6px;
    }

    .fu-header {
        border: 0px !important;
        border-radius: 6px;
    }

    .fu {
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        border-radius: 6px;
        background-color: transparent;
        border: none;
        padding-top: 30px;
    }

    .boton{
        background: #e8e8e8 !important;
    }

    @media (max-width: 768px) {
        .main-container {
            flex-direction: column;
            gap: 10px;
        }

        .left-container,
        .right-container {
            flex: none;
            width: 100%;
        }

        .right-container {
            width: 100%;
        }

        .profile-image {
            width: 120px;
            height: 120px;
        }
    }

            
</style>

