
<template>
    <router-link to="/app/profile" >
        <button class="relative overflow-hidden w-full p-link flex align-items-center p-2 pl-0 text-color hover:surface-200 border-noround">

        <Avatar :image="authStore().user?.avatar" class="mr-3" shape="circle" />
        <span class="inline-flex flex-column">
                <span class="font-bold">{{ authStore().user?.name }}</span>
                <span>
                    <span v-for="rol in authStore().user?.roles" class="text-sm mr-2">{{rol.name}}</span>
                </span>
        </span>
        </button>
    </router-link>

    <ul class="layout-menu">
        <template v-for="(item, i) in model" :key="item">
            <app-menu-item v-if="!item.separator" :item="item" :index="i"></app-menu-item>
            <li v-if="item.separator" class="menu-separator"></li>
        </template>
    </ul>
</template>

<script setup>
import { ref } from 'vue';
import AppMenuItem from './AppMenuItem.vue';
import {useAbility} from '@casl/vue'
import { authStore } from "../store/auth";
import { icon } from '@fortawesome/fontawesome-svg-core';

const {can} = useAbility();
const auth = authStore();
//const user = computed(() => auth.user.value)
//console.log(auth.user);
const model = ref([
    {
        label: 'Home',
        permision: 'all',
        items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/admin', permision: 'all'}]
    },
    {
        label: 'Usuarios',
        items: [
            { label: 'Users', icon: 'pi pi-fw pi-id-card', to: '/admin/users', permision: 'user-list' },
            { label: 'Roles', icon: 'pi pi-fw pi-check-square', to: '/admin/roles', permision:'role-list' },
            { label: 'Permisos', icon: 'pi pi-fw pi-bookmark', to: '/admin/permissions', permision:'permission-list' }
        ]
    },
    {
       label: 'Formularios',
       items: [
            { label: 'Formularios', icon: 'pi pi-fw pi-id-card', to: '/admin/formularios', permision: 'all' },
            { label: 'Preguntas', icon: 'pi pi-fw pi-id-card', to: '/admin/questions', permision: 'all' },
            { label: 'Categorias', icon: 'pi pi-fw pi-id-card', to: '/admin/categories', permision: 'all' },
        ]
    }
]);
</script>


<style lang="scss" scoped></style>
