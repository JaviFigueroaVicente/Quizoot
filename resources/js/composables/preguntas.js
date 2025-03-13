import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usePreguntas() {
    const preguntas = ref([])
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

    const getPreguntas = async () => {
        axios.get('/api/pregunta')
            .then(response => {
                preguntas.value = response.data
                console.log(preguntas.value)
            }).catch(error => {
                console.log(error)
            }) 
    }

    const getPregunta = async (id) => {
        axios.get('/api/pregunta/' + id)
        .then(response => {
            pregunta.value = response.data
            console.log(response.data)
        }).catch(error => {
            console.log(error)
        }) 
    }

    const storePregunta = async () => {
        axios.post('/api/pregunta/', pregunta.value)
        .then(response => {
            swal({
                icon: 'success',
                title: 'Pregunta creada correctamente'
            })
            console.log(response)
        }).catch(error => {
            console.log(error)
        }) 
    }

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
                            router.push({name: 'questions.index'})
                            swal({
                                icon: 'success',
                                title: 'Question deleted successfully'
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

    const updatePregunta = async (pregunta) => {
        console.log(pregunta);
        axios.put('/api/pregunta/' + pregunta.id, pregunta)
            .then(response => {
                router.push({name: 'questions.index'})
                swal({
                    icon: 'success',
                    title: 'Post updated successfully'
                })
                console.log(response)
            })
            .catch(error => {
                console.log(response)
            })
    }

    return {
        preguntas,
        pregunta,
        getPreguntas,
        getPregunta,
        storePregunta,
        updatePregunta,
        deletePregunta
    }
        
}