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
                            router.push({name: 'formularios.index'})
                            swal({
                                icon: 'success',
                                title: 'Post deleted successfully'
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
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/formulario/' + formulario.id, formulario)
            .then(response => {
                //router.push({name: 'formularios.index'})

                swal({
                    icon: 'success',
                    title: 'Form updated successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }


    return{
        formularios,
        formulario,
        getForms,
        getForm,
        storeForm,
        deleteForm
    }
}

