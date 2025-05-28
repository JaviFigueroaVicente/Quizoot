<template>
  <div :class="backgroundClass">
    <Navbar class="navbar" />
    <div class="container card mb-2 mt-3 bread"  v-if="mostrarBreadcrumb">
        <Breadcrumb :home="home" :model="crumbs">
            <template #item="{ item, props }">
                <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
                    <a :href="href" v-bind="props.action" class="btn btn-link"   @click="navigate">
                        <span :class="[item.icon, 'text-color']" />
                        <span class="text-primary font-semibold">{{ item.label }}</span>
                    </a>
                </router-link>
                <a v-else :href="item.url" :target="item.target" v-bind="props.action">
                    <span class="text-color">{{ item.label }}</span>
                </a>
            </template>
        </Breadcrumb>
    </div>
    <router-view />
    <Footer v-if="mostrarFooter" />
  </div>
</template>

<script setup>
import { computed, ref } from 'vue'
import { useRoute } from 'vue-router'
import Navbar from './Nav.vue'
import Footer from './AppFooter.vue'
import Breadcrumb from 'primevue/breadcrumb'

const route = useRoute()

// Rutas que NO deben tener fondo
const rutasSinFondo = ['/', '/login', '/register', '/contestarFormulario/:id']

// Determina si mostrar el footer
const mostrarFooter = computed(() => {
    return route.path !== '/login' && route.path !== '/register' && route.path !== '/contestarFormulario/:id'
})

const mostrarBreadcrumb = computed(() => {
    return route.path !== '/login' && route.path !== '/register' && route.path !== '/contestarFormulario/:id' && route.path !== '/'
})

// Determina qué clase aplicar
const backgroundClass = computed(() => {
  return rutasSinFondo.includes(route.path) ? '' : 'fondo'
})


const home = ref({
    icon: 'pi pi-home',
    route: '/'
});

const crumbs = computed(() => {
    let pathArray = route.path.split("/")
    pathArray.shift()

    let breadcrumbs = pathArray.reduce((breadcrumbArray, path, idx) => {

        breadcrumbArray.push({
            route: breadcrumbArray[idx - 1]
                ? "" + breadcrumbArray[idx - 1].route + "/" + path
                : "/" + path,
            label: route.matched[idx]?.meta.breadCrumb || path,
            disabled: idx + 1 === pathArray.length || route.matched[idx]?.meta.linked === false,
        });

        return breadcrumbArray;
    }, [])
    return breadcrumbs;
});


const items = ref([
    {
        separator: true
    },
    {
        label: 'Documents',
        items: [
            {
                label: 'Tareas',
                icon: 'pi pi-plus',
                // shortcut: '⌘+N',
                command: () => {
                    router.push({ name: 'app.tasks' })
                }
            },
            {
                label: 'Search',
                icon: 'pi pi-search',
                // shortcut: '⌘+S'
            }
        ]
    },
]);

</script>

<style scoped>
.fondo {
  background-color: #402462d7 !important;
}

.navbar {
  position: sticky;
  top: 0;
  z-index: 1000;
}
</style>