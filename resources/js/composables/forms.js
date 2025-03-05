import { get } from 'lodash'
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useForms() {
    const formularios = ref([])
    const formulario = ref({
        name: '',
        description: '',
        thumbnail: '',
    }); 

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getForms = async () => {
        axios.get('/api/formulario',{
        headers: {
                "content-type": "multipart/form-data"
        }})
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
            });
    }


    const storeForm = async () => {
        const response = axios.post('/api/formulario', formulario.value, {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        });
        console.log(response); 
    }

    return{
        formularios,
        formulario,
        getForms,
        getForm,
        storeForm
    }
}

