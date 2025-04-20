import { get } from 'lodash';
import { ref, inject } from 'vue'

export default function useFormulariosRespondidos() {
    const formulariosRespondidos = ref([]);
    const formularioRespondido = ref({
        user_id: '',
        formulario_id: '',
        score: 0
    });

    const swal = inject('$swal')
    const scoreAnterior = ref(0);

    const getFormulariosRespondidos = async () => {
        axios.get('/api/formularios-respondidos')
        .then (response => {
            formulariosRespondidos.value = response.data.data
            // console.log(response.data.data)
        }).catch(error => {
            console.log(error)
        })
    }    


    const getFormulariosRespondidosUserLogged = async () => {
        axios.get('/api/formularios-respondidos-user-logged')
        .then (response => {
            formulariosRespondidos.value = response.data.data
            // console.log(response.data.data)
        }).catch(error => {
            console.log(error)
        })
    }

    const getFormulariosRespondidosUser = async (id) => {
        axios.get('/api/formularios-respondidos/' + id)
        .then (response => {
            formulariosRespondidos.value = response.data.data;
            // console.log(formulariosRespondidos.value);
        }).catch(error => {
            console.log(error)
        })
    }

    const getFormulariosRespondidosFormulario = async (id) => {
        axios.get('/api/formularios-respondidos-formulario/' + id)
        .then (response => {
            formulariosRespondidos.value = response.data.data;
            // console.log(formulariosRespondidos.value);
        }).catch(error => {
            console.log(error)
        })
    }

    const storeFormulariosRespondidos = async (formularioId, score) => {
        formularioRespondido.value.formulario_id = formularioId
        formularioRespondido.value.score = score
        axios.post('/api/formulario-respondido', formularioRespondido.value)
        .then(response => {
            formularioRespondido.value = response.data
            // console.log(response)
        }).catch(error => {
            console.log(error)
        }) 
    }


    const getFormularioRespondido = async (userId, idFormulario) => {
        try{
            axios.get('/api/formulario-respondido/' + userId + '/' + idFormulario)
            .then(response => {
                formularioRespondido.value = response.data.data
                scoreAnterior.value = formularioRespondido.value.score
            }).catch(error => {
                console.log(error)
            }) 
        } catch (error) {
            console.log(error)
        }
        
    }

    const getScoreAnterior = (userId, idFormulario) => {
        try{
            axios.get('/api/formulario-respondido/' + userId + '/' + idFormulario)
            .then(response => {
                // console.log(response.data.data.score);
                scoreAnterior.value = response.data.data.score
            }).catch(error => {
                console.log(error)
            }) 
        } catch (error) {
            console.log(error)
        }
    }

    const updateFormularioRespondido = async (formulario) => {
        axios.post('/api/formulario-respondido/' + formulario.user_id + '/' + formulario.formulario_id, formulario)
        .then(() => {
            // console.log(formulario)
        }).catch(error => {
            console.log(error)
            console.log(formulario)
        })  
    }

    const deleteFormularioRespondido = async (userId, formulario_id) => {
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
                axios.delete(`/api/formulario-respondido/${userId}/${formulario_id}`)
                    .then((response) => {
                        swal({
                            icon: 'success',
                            title: 'Formulario Respondido deleted successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        getFormulariosRespondidosUser(userId)
                        // console.log(response)
                    })
                    .catch(error => {
                        swal({
                            icon: 'error',
                            title: 'Something went wrong'
                        })
                        console.log(error)
                    })
            }
        })
    }

    return{
        formulariosRespondidos,
        formularioRespondido,
        scoreAnterior,
        getScoreAnterior,
        getFormulariosRespondidosUserLogged,
        getFormulariosRespondidos,
        getFormulariosRespondidosUser,
        getFormulariosRespondidosFormulario,
        storeFormulariosRespondidos,
        getFormularioRespondido,
        updateFormularioRespondido,
        deleteFormularioRespondido
    }
}

