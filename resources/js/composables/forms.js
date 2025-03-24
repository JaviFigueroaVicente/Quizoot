import { get } from 'lodash'
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useForms() {
    const formularios = ref([])
    const formulario = ref({
        name: '',
        description: '',
        thumbnail: '',
        category_id: '',
    }); 
    const selectedPreguntas = ref([])

    const isLoading = ref(false);
    const swal = inject('$swal')

    const getForms = async (categoryId = null) => {
        let url = '/api/formulario';

        if (categoryId) {
            url += `?category_id=${categoryId}`;
        }

        axios.get(url, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
        .then(response => {
            formularios.value = response.data.data;
            console.log(response.data.data);
        })
        .catch(error => {
            console.log(error);
        });
    }
    
    const getUserForms = async () => {
        axios.get('/api/formulario-user')
        .then(response => {
            formularios.value = response.data.data;
            console.log(response.data.data);
        });
    }
    const getForm = async (id) => {
        axios.get('/api/formulario/' + id)
            .then(response => {
                formulario.value = response.data;
                console.log(response.data);
            }).catch(error => {
                console.log(error)
            })
    }

    const getFormPreguntas = async (id) => {
        axios.get('/api/asignar-preguntas/' + id)
            .then(response => {
                isLoading.value = true;
                selectedPreguntas.value = response.data.data;
                console.log(response.data.data);
            }).catch(error => {
                console.log(error)
            })
    }


    const storeForm = async () => {
        axios.post('/api/formulario', formulario.value, {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
        .then(response => {
            swal({
                icon: 'success',
                title: 'Formlario creado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
            console.log(response)
        }).catch(error => {
            console.log(error)
        }) 
    }    

    const asignarPreguntas = async () => {
        const formularioId = formulario.value.id;
        const preguntaIds = [];
        for (let i = 0; i < selectedPreguntas.value.length; i++) {
            preguntaIds.push(selectedPreguntas.value[i].id);
        }
        try {
            const response = axios.post('/api/asignar-preguntas/' + formularioId, {
                pregunta_ids: preguntaIds
            });
            swal({
                icon: 'success',
                title: 'Preguntas asignadas correctamente',
                showConfirmButton: false,
                timer: 1500
            });
            console.log(response);
        } catch (error) {
            console.log(error);
        }
    };

    const deleteForm = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/formulario/' + id)
                        .then((response) => {
                            getForms()
                            swal({
                                icon: 'success',
                                title: 'Form deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            console.log(response)
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                            console.log(response)
                        })
                }
            })
        
    }

    const updateForm = async (formulario) => {
        axios.post('/api/formulario/' + formulario.id, formulario, {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
            .then(() => {
                swal({
                    icon: 'success',
                    title: 'Form updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                console.log(formulario)
            })
            .catch(error => {
                console.log(formulario)
                swal({
                    icon: 'error',
                    title: 'Error al actualizar el formulario',
                    showConfirmButton: true
                });
            })
    }


    return{
        formularios,
        formulario,
        selectedPreguntas,
        isLoading,
        getForms,
        getUserForms,
        getForm,
        getFormPreguntas,
        storeForm,
        asignarPreguntas,
        updateForm,
        deleteForm
    }
}

