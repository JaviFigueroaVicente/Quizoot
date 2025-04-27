import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usePreguntas() {
    const preguntas = ref([]);
    const pregunta = ref({
        pregunta: '',
        respuestas: [
            { respuesta: '', correcta: false },
            { respuesta: '', correcta: false },
            { respuesta: '', correcta: false },
            { respuesta: '', correcta: false }
        ]
    });
    
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    // Obtiene todas las preguntas
    const getPreguntas = async () => {
        axios.get('/api/pregunta')
            .then(response => {
                preguntas.value = response.data
                console.log(preguntas.value)
            }).catch(error => {
                console.log(error)
            }) 
    }

    // Obtiene las preguntas de un usuario
    const getUserPreguntas = async () => {
        axios.get('/api/pregunta-user')
            .then(response => {
                preguntas.value = response.data
                console.log(preguntas.value)
                return response.data
            }).catch(error => {
                console.log(error)
            }) 
    }

    // Obtiene una pregunta
    const getPregunta = async (id) => {
        axios.get('/api/pregunta/' + id)
        .then(response => {
            pregunta.value = response.data
            console.log('Pregunta:', pregunta.value);
        }).catch(error => {
            console.log(error)
        }) 
    }

    // Crea una pregunta
    const storePregunta = async () => {
        axios.post('/api/pregunta/', pregunta.value)
        .then(response => {
            getPreguntas()
            swal({
                icon: 'success',
                title: 'Pregunta creada correctamente',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'swal'
                }
            })
            console.log(response)
        }).catch(error => {
            console.log(error)
        }) 
    }

    // Elimina una pregunta
    const deletePregunta = async (id) => {
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
                    axios.delete('/api/pregunta/' + id)
                        .then((response) => {
                            getPreguntas()
                            swal({
                                icon: 'success',
                                title: 'Question deleted successfully',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    popup: 'swal'
                                }
                            })
                            console.log(response)
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong',
                                customClass: {
                                    popup: 'swal'
                                }
                            })
                            console.log(response)
                        })
                }
            })
    }

    // Actualiza una pregunta
    const updatePregunta = async (pregunta) => {
        axios.put('/api/pregunta/' + pregunta.id, pregunta)
            .then(() => {
                swal({
                    icon: 'success',
                    title: 'Pregunta updated successfully',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'swal'
                    }
                })
                console.log(pregunta)
            })
            .catch(error => {
                console.log(pregunta)
            })
    }

    return {
        preguntas,
        pregunta,
        getPreguntas,
        getUserPreguntas,
        getPregunta,
        storePregunta,
        updatePregunta,
        deletePregunta
    }
        
}