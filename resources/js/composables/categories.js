import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useCategories() {
    const categories = ref([])
    const categoryList = ref([])
    const category = ref({
        name: ''
    })

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')


    const getCategories = async (
        page = 1,
        search_id = '',
        search_title = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'asc'
    ) => {
        axios.get('/api/categories?page=' + page +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                categories.value = response.data;
            })
    }

    const getCategory = (id) => {
        axios.get(`/api/categories/${id}`)
            .then(response => {
                if (response.data.data) {
                    category.value = response.data.data;
                    console.log("Categoría cargada:", category.value);
                } else {
                    console.warn("La categoría no se encontró.");
                    swal({
                        icon: 'warning',
                        title: 'Categoría no encontrada',
                        text: 'No se pudo cargar la categoría.',
                        customClass: {
                            popup: 'swal'
                        }
                    });
                }
            })
            .catch(error => {
                console.error("Error al obtener la categoría:", error);
    
                if (error.response?.status === 404) {
                    swal({
                        icon: 'error',
                        title: 'Error 404',
                        text: 'La categoría solicitada no existe.',
                        customClass: {
                            popup: 'swal'
                        }
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo obtener la categoría.',
                        customClass: {
                            popup: 'swal'
                        }
                    });
                }
            });
    };

    const storeCategory = async (category) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/categories', category)
            .then(response => {
                router.push({name: 'categories.index'})
                swal({
                    icon: 'success',
                    title: 'Category saved successfully',
                    customClass: {
                        popup: 'swal'
                    }
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const updateCategory = async (category) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/categories/' + category.id, category)
            .then(response => {
                router.push({name: 'categories.index'})
                swal({
                    icon: 'success',
                    title: 'Category updated successfully',
                    customClass: {
                        popup: 'swal'
                    }
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const deleteCategory = async (id) => {
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
                    axios.delete('/api/categories/' + id)
                        .then(response => {
                            getCategories()
                            swal({
                                icon: 'success',
                                title: 'Category deleted successfully',
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

    const getCategoryList = async () => {
        isLoading.value = true
        axios.get('/api/category-list')
            .then(response => {
                categoryList.value = response.data.data;
            }).finally(() => 
                isLoading.value = false
            )
    }

    return {
        categoryList,
        categories,
        category,
        getCategories,
        getCategoryList,
        getCategory,
        storeCategory,
        updateCategory,
        deleteCategory,
        validationErrors,
        isLoading
    }
}
