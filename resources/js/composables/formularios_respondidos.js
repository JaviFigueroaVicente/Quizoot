import { ref } from 'vue'

export default function useFormulariosRespondidos() {

    const formularioRespondido = ref({
        formulario_id: '',
        score: ''
    });

    const storeFormulariosRespondidos = async (formularioId, score) => {
        formularioRespondido.value.formulario_id = formularioId
        formularioRespondido.value.score = score
        console.log(formularioRespondido.value)
        axios.post('/api/formulario-respondido', formularioRespondido.value)
        .then(response => {
            console.log(response)
        }).catch(error => {
            console.log(error)
        }) 
    }

    const getFormularioRespondido = async (id) => {
        axios.get('/api/formulario-respondido/' + id)
        .then(response => {
            formularioRespondido.value = response.data
            console.log(response.data)
        }).catch(error => {
            console.log(error)
        }) 
    }

    return{
        formularioRespondido,
        storeFormulariosRespondidos,
        getFormularioRespondido
    }
}

