import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usePreguntas() {
    const preguntas = ref([])
    const pregunta = ref({
        pregunta: ''
    })
    
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getPreguntas = async (
        page = 1,
        search_id = '',
        search_pregunta = '',
        search_global = '',
        order_column = 'created_at'
    ) => {
        axios.get('/api/preguntas?page=' + page +
            '&search_id=' + search_id +
            '&search_pregunta=' + search_pregunta +
            '&search_global=' + search_global +
            '&order_column=' + order_column)
            .then(response => {
                preguntas.value = response.data
            }).catch(error => {
                console.log(error)
            }) 
    }

    const getPregunta = async () => {
        axios.get('/api/pregunta' + id)
        .then(response => {
            pregunta.value = response.data.data
            console.log(pregunta.value)
        }).catch(error => {
            console.log(error)
        }) 
    }

    const storePregunta = async (pregunta) => {
        axios.post('/api/pregunta', pregunta)
        .then(response => {
            preguntas.value = response.data
            swal({
                icon: 'success',
                title: 'Pregunta creada correctamente'
            })
            console.log(preguntas.value)
        }).catch(error => {
            console.log(error)
        }) 
    }

    return {
        preguntas,
        pregunta,
        getPreguntas,
        getPregunta,
        storePregunta
    }
        
}