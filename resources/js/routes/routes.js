import { before } from "lodash";
import { authStore } from "../store/auth";

const AuthenticatedLayout = () => import('../layouts/Authenticated.vue')
const AuthenticatedUserLayout = () => import('../layouts/AuthenticatedUser.vue')
const AuthenticatedStandardLayout = () => import('../layouts/AuthenticatedStandard.vue')
const GuestLayout = ()  => import('../layouts/Guest.vue');

async function requireLogin(to, from, next) {
    const auth = authStore();
    let isLogin = !!auth.authenticated;

    if (isLogin) {
        next()
    } else {
        next('/login')
    }
}

function hasAdmin(roles) {
    for (let rol of roles) {
        if (rol.name && rol.name.toLowerCase().includes('admin')) {
            return true;
        }
    }
    return false;
}
async function guest(to, from, next) {
    const auth = authStore()

    let isLogin = !!auth.authenticated;

    if (isLogin) {
        next('/')
    } else {
        next()
    }
}

async function requireAdmin(to, from, next) {

    const auth = authStore();
    let isLogin = !!auth.authenticated;
    let user = auth.user;

    if (isLogin) {
        if( hasAdmin(user.roles)){
            next()
        }else{
            next('/app')
        }
    } else {
        next('/login')
    }
}

export default [
    {
        path: '/',
        // redirect: { name: 'login' },
        component: GuestLayout,
        children: [
            {
                name: 'forms',
                path: 'forms',
                children : [
                    {
                        name: 'forms.index',
                        path: '',
                        component: () => import('../views/forms/index.vue'),
                        meta: { breadCrumb: 'Forms' }
                    },
                    {
                        name: 'forms.details',
                        path: 'details/:id',
                        component: () => import('../views/forms/details.vue'),
                        meta: { breadCrumb: 'Form Details' }
                    }

                ],
            },
            {
                name: 'rankings',
                path: 'rankings',
                children : [
                    {
                        name: 'rankings.index',
                        path: '',
                        component: () => import('../views/rankings/index.vue'),
                        meta: { breadCrumb: 'Rankings' }
                    },
                    {
                        name: 'rankings.details',
                        path: 'details/:id',
                        component: () => import('../views/rankings/details.vue'),
                        meta: { breadCrumb: 'Form Details' }
                    }

                ],
            },
            {
                path: '/',
                name: 'home',
                component: () => import('../views/home/index.vue'),
            },
            {
                path: 'login',
                name: 'auth.login',
                component: () => import('../views/login/Login.vue'),
                beforeEnter: guest,
            },
            {
                path: 'register',
                name: 'auth.register',
                component: () => import('../views/register/index.vue'),
                beforeEnter: guest,
            },
            {
                path: 'forgot-password',
                name: 'auth.forgot-password',
                component: () => import('../views/auth/passwords/Email.vue'),
                beforeEnter: guest,
            },
            {
                path: 'reset-password/:token',
                name: 'auth.reset-password',
                component: () => import('../views/auth/passwords/Reset.vue'),
                beforeEnter: guest,
            },
        ]
    },

    {
        path: '/',
        component: AuthenticatedUserLayout,
        beforeEnter: requireLogin,
        children:[
        {
            name: 'profile',
            path: 'profile',
            children : [
                {
                    name: 'profile.index',
                    path: '',
                    component: () => import('../views/profile/index.vue'),
                    meta: { breadCrumb: 'Profile' }
                },
                {
                    name: 'profile.edit',
                    path: 'edit',
                    component: () => import('../views/profile/Edit.vue'),
                    meta: { breadCrumb: 'Edit profile' }
                },
                {
                    name: 'profile.mis-formularios',
                    path: 'mis-formularios',
                    children : [
                        {
                            name: 'mis-formularios.index',
                            path: '',
                            component: () => import('../views/forms/MisFormularios.vue'),
                            meta: { breadCrumb: 'Mis Formularios' },
                        },
                        {
                            name: 'mis-formularios.edit',
                            path: 'edit/:id',
                            component: () => import('../views/forms/Edit.vue'),
                            meta: { breadCrumb: 'Edit Form' }
                        },
                        {
                            name: 'mis-formularios.create',
                            path: 'create',
                            component: () => import('../views/forms/Create.vue'),
                            meta: { breadCrumb: 'Create Form' }
                        },
                        {
                            name: 'mis-formularios.asignar-preguntas',
                            path: ':id/asignar-preguntas',
                            component: () => import('../views/forms/AsignarPreguntas.vue'),
                            meta: { breadCrumb: 'Asignar Preguntas' },
                        },
                        {
                            name: 'mis-formularios.mis-respondidos',
                            path: 'mis-respondidos',
                            component: () => import('../views/forms/MisRespondidos.vue'),
                            meta: { breadCrumb: 'Mis Formularios Respondidos' },
                        },                        
                    ],
                },
                {
                    name: 'profile.mis-preguntas',
                    path: 'mis-preguntas',
                    children : [
                        {
                            name: 'mis-preguntas.index',
                            path: '',
                            component: () => import('../views/preguntas/MisPreguntas.vue'),
                            meta: { breadCrumb: 'Mis Preguntas' }
                        },
                        {
                            name: 'mis-preguntas.create',
                            path: 'create',
                            component: () => import('../views/preguntas/Create.vue'),
                            meta: { breadCrumb: 'Create Pregunta' }
                        },
                        {
                            name: 'mis-preguntas.edit',
                            path: 'edit/:id',
                            component: () => import('../views/preguntas/Edit.vue'),
                            meta: { breadCrumb: 'Edit Pregunta' }
                            
                        }
                    ],
                }
            ],
        },
    ],
    },
    {
        path: '/',
        component: AuthenticatedStandardLayout,
        beforeEnter: requireLogin,
        children:[
            {
                name: 'formIndividual',
                path: '/contestarFormulario/:id',
                component: () => import('../views/forms/form_individual/index.vue'),
                meta: { breadCrumb: 'Form Individual' }
            }
        ],
    },

    {
        path: '/admin',
        component: AuthenticatedLayout,
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireAdmin,
        meta: { breadCrumb: 'Dashboard' },
        children: [
            {
                name: 'admin.index',
                path: '',
                component: () => import('../views/admin/index.vue'),
                meta: { breadCrumb: 'Admin' }
            },
            {
                name: 'categories',
                path: 'categories',
                meta: { breadCrumb: 'Categories'},
                children: [
                    {
                        name: 'categories.index',
                        path: '',
                        component: () => import('../views/admin/categories/Index.vue'),
                        meta: { breadCrumb: 'View category' }
                    },
                    {
                        name: 'categories.create',
                        path: 'create',
                        component: () => import('../views/admin/categories/Create.vue'),
                        meta: {
                            breadCrumb: 'Add new category' ,
                            linked: false,
                        }
                    },
                    {
                        name: 'categories.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/categories/Edit.vue'),
                        meta: {
                            breadCrumb: 'Edit category',
                            // linked: false,
                        }
                    }
                ]
            },
            {
                name: 'permissions',
                path: 'permissions',
                meta: { breadCrumb: 'Permisos'},
                children: [
                    {
                        name: 'permissions.index',
                        path: '',
                        component: () => import('../views/admin/permissions/Index.vue'),
                        meta: { breadCrumb: 'Permissions' }
                    },
                    {
                        name: 'permissions.create',
                        path: 'create',
                        component: () => import('../views/admin/permissions/Create.vue'),
                        meta: {
                            breadCrumb: 'Create Permission',
                            linked: false,
                        }
                    },
                    {
                        name: 'permissions.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/permissions/Edit.vue'),
                        meta: {
                            breadCrumb: 'Permission Edit',
                            linked: false,
                        }
                    }
                ]
            },
            {
                name: 'users',
                path: 'users',
                meta: { breadCrumb: 'Usuarios'},
                children: [
                    {
                        name: 'users.index',
                        path: '',
                        component: () => import('../views/admin/users/Index.vue'),
                        meta: { breadCrumb: 'Usuarios' }
                    },
                    {
                        name: 'users.create',
                        path: 'create',
                        component: () => import('../views/admin/users/Create.vue'),
                        meta: {
                            breadCrumb: 'Crear Usuario',
                            linked: false
                        }
                    },
                    {
                        name: 'users.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/users/Edit.vue'),
                        meta: {
                            breadCrumb: 'Editar Usuario',
                            linked: false
                        }
                    }
                ]
            },
            {
                name: 'formularios',
                path: 'formularios',
                meta: { breadCrumb: 'Formularios'},
                children: [
                    {
                        name: 'formularios.index',
                        path: '',
                        component: () => import('../views/admin/formularios/index.vue'),
                        meta: { breadCrumb: 'Formularios' }
                    },
                    {
                        name: 'formularios.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/formularios/Edit.vue'),
                        meta: { breadCrumb: 'Edit Formularios' }
                    },
                    {
                        name: 'formularios.create',
                        path: 'create',
                        component: () => import('../views/admin/formularios/Create.vue'),
                        meta: { breadCrumb: 'Create Formularios' }
                    },
                    {
                        name: 'formularios.asignar-preguntas',
                        path: 'asignar-preguntas/:id',
                        component: () => import('../views/admin/formularios/AsignarPreguntas.vue'),
                        meta: { breadCrumb: 'Asignar Preguntas' }
                    }
                ]
            },
            {
                name: 'questions',
                path: 'questions',
                meta: { breadCrumb: 'Preguntas'},
                children: [
                    {
                        name: 'questions.index',
                        path: '',
                        component: () => import('../views/admin/preguntas/index.vue'),
                        meta: { breadCrumb: 'Preguntas' }
                    },
                    {
                        name: 'questions.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/preguntas/Edit.vue'),
                        meta: { breadCrumb: 'Edit Preguntas' }
                    },
                    {
                        name: 'questions.create',
                        path: 'create',
                        component: () => import('../views/admin/preguntas/Create.vue'),
                        meta: { breadCrumb: 'Create Preguntas' }
                    }
                ]
            },
            {
                name: 'formulariosRespondidos',
                path: 'formulariosRespondidos',
                meta: { breadCrumb: 'Formularios Respondidos'},
                children: [
                    {
                        name: 'formulariosRespondidos.index',
                        path: ':id',
                        component: () => import('../views/admin/formulariosRespondidos/index.vue'),
                        meta: { breadCrumb: 'Formularios Respondidos' }
                    },
                    {
                        name: 'formulariosRespondidos.edit',
                        path: 'edit/:id/:formularioId',
                        component: () => import('../views/admin/formulariosRespondidos/Edit.vue'),
                        meta: { breadCrumb: 'Edit Formularios Respondidos' }
                    },
                    {
                        name: 'formulariosRespondidos.indexByForm',
                        path: 'indexByForm/:id',
                        component: () => import('../views/admin/formulariosRespondidos/indexByForm.vue'),
                        meta: { breadCrumb: 'Show Formularios Respondidos' }
                    }
                ]
            },

            //TODO Organizar rutas
            {
                name: 'roles.index',
                path: 'roles',
                component: () => import('../views/admin/roles/Index.vue'),
                meta: { breadCrumb: 'Roles' }
            },
            {
                name: 'roles.create',
                path: 'roles/create',
                component: () => import('../views/admin/roles/Create.vue'),
                meta: { breadCrumb: 'Create Role' }
            },
            {
                name: 'roles.edit',
                path: 'roles/edit/:id',
                component: () => import('../views/admin/roles/Edit.vue'),
                meta: { breadCrumb: 'Role Edit' }
            },

        ]
    },
    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    }
]
