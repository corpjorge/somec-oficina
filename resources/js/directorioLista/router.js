import { createRouter, createWebHashHistory  } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'root',
        component: () => import('./Lista'),
    },
    {
        path: '/ver/:especialidad',
        name: 'Ver',
        component: () => import('./Detalle'),
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
