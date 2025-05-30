import { get } from 'lodash'
import { ref, inject} from 'vue'

export default function useForms() {
    const formularios = ref([])
    const formulario = ref({
        name: '',
        description: '',
        thumbnail: '',
        category_id: [],
    }); 
    const ranking = ref([])
    const selectedPreguntas = ref([])
    const swal = inject('$swal')
    const isLoading = ref(false)

    // Obtiene todos los formularios
    const getForms = async (categoryId = null) => {
        isLoading.value = true
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
            // console.log(response.data.data);
        })
        .catch(error => {
            console.log(error);
        }).finally(() => {
            isLoading.value = false
        });
    }
    
    // Obtiene los formularios del usuario
    const getUserForms = async () => {
        axios.get('/api/formulario-user')
        .then(response => {
            formularios.value = response.data.data;
            // console.log(response.data.data);
        });
    }

    // Obtiene un formulario por id
    const getForm = async (id) => {
        isLoading.value = true;
        axios.get('/api/formulario/' + id)
            .then(response => {
                formulario.value = response.data;
                // console.log(response.data);
            }).catch(error => {
                console.log(error)
            }).finally(() => {
                isLoading.value = false
            })
    }

    // Obtiene las preguntas de un formulario
    const getFormPreguntas = async (id) => {
        axios.get('/api/asignar-preguntas/' + id)
            .then(response => {
                selectedPreguntas.value = response.data.data;
                // console.log(response.data.data);
            }).catch(error => {
                console.log(error)
            })
    }

    // Obtiene las preguntas sin respuesta
    const getPreguntasSinRespuesta = async (id) => {
        isLoading.value = true;
        axios.get('/api/preguntas-form/' + id)
            .then(response => {
                selectedPreguntas.value = response.data.data;
                // console.log(response.data.data);
            }).catch(error => {
                console.log(error)
            }).finally(() => {
                isLoading.value = false
            })
    }

    // Obtiene el ranking de un formulario
    const getRankingFormulario = async (id) => {
        isLoading.value = true;
        axios.get('/api/ranking/' + id)
            .then(response => {
                ranking.value = response.data.data;
                // console.log(response.data.data);
            }).catch(error => {
                console.log(error)
            }).finally(() => {
                isLoading.value = false
            })
    }

    // Verifica la respuesta de una pregunta
    const verificarRespuesta = async (pregunta, respuesta) => {
        const preguntaId = pregunta.id;
        const response = await axios.post('/api/verificar-respuesta', {
            pregunta_id: preguntaId,
            respuesta: respuesta
        });

        if (response.data.es_correcta) {
            return true; 
        } else {
            return false; 
        }
    };

    // Crea un formulario
    const storeForm = async () => {
        try {
            const response = await axios.post('/api/formulario', formulario.value, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            });

            const formularioId = response.data.data.id;
            await asignarCategorias(formularioId);
            
            swal({
                icon: 'success',
                title: 'Formulario creado correctamente',
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal'
                } 
            });
        } catch (error) {
            console.error('Error al crear el formulario:', error);
            swal({
                icon: 'error',
                title: 'Error al crear el formulario',
                showConfirmButton: true,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal'
                }
            });
        }
    };
    
    // Asigna categorias a un formulario
    const asignarCategorias = async (formularioId) => {
        try {
            const response = await axios.post('/api/asignar-categorias/' + formularioId, {
                category_ids: formulario.value.category_id,
            });
    
            swal({
                icon: 'success',
                title: 'Categorías asignadas correctamente',
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal'
                } 
            });
    
            console.log(response);
        } catch (error) {
            console.error(error);
            swal({
                icon: 'error',
                title: 'Error al asignar categorías',
                showConfirmButton: true,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal'
                } 
            });
        }
    };

    // Asigna preguntas a un formulario
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
                timer: 1500,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal'
                }
            });
            console.log(response);
        } catch (error) {
            console.log(error);
        }
    };

    // Elimina un formulario
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
            reverseButtons: true,
            allowOutsideClick: false 
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
                                timer: 1500,
                                allowOutsideClick: false,
                                customClass: {
                                    popup: 'swal'
                                }
                            })
                            // console.log(response)
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong',
                                customClass: {
                                    popup: 'swal'
                                }
                            })
                            // console.log(response)
                        })
                }
            })
        
    }

    // Actualiza un formulario
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
                    timer: 1500,
                    allowOutsideClick: false,
                    customClass: {
                        popup: 'swal'
                    } 
                })
                // console.log(formulario)
            })
            .catch(error => {
                console.log(formulario)
                swal({
                    icon: 'error',
                    title: 'Error al actualizar el formulario',
                    showConfirmButton: true,
                    allowOutsideClick: false,
                    customClass: {
                        popup: 'swal'
                    }                 
                });
            })
    }


// Obtiene las categorias de un formulario
    const getFormCategories = async (id) => {
        try {
            const response = await axios.get(`/api/formularios/${id}/categorias`);
            
            return response.data.data.map(item => item.id);
        } catch (error) {
            console.error("Error al obtener categorías del formulario:", error);
            return [];
        }
    };
    

    return{
        formularios,
        formulario,
        selectedPreguntas,
        ranking,
        isLoading,
        getForms,
        getUserForms,
        getForm,
        getFormPreguntas,
        getPreguntasSinRespuesta,
        getRankingFormulario,
        verificarRespuesta,
        storeForm,
        asignarPreguntas,
        updateForm,
        deleteForm,
        asignarCategorias,
        getFormCategories
    }
}

