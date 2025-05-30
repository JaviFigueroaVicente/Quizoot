import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'


export default function useProfile() {
    const profile = ref({
        alias: '',
        name: '',
        surname1: '',
        surname2: '',
        email: '',
    })

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    // Obtiene el perfil del usuario
    const getProfile = async () => {
        profile.value = auth.user.value;
    }

    // Actualiza el perfil
    const updateProfile = async (profile) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/profile', profile)
            .then(({data}) => {
                if (data.success) {
                    auth.user.value=data.data
                    swal({
                        icon: 'success',
                        title: 'Profile updated successfully',
                        customClass: {
                            popup: 'swal'
                        }
                    })
                }
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    return {
        profile,
        getProfile,
        updateProfile,
        validationErrors,
        isLoading
    }
}
