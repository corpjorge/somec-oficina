<template>
    <div class="col-lg-12 mx-auto p-3 py-md-5">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#listarOficinas">
                Listar Áreas
            </button>
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#crearOficinas">
                Añadir Áreas
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="listarOficinas" tabindex="-1" aria-labelledby="listarOficinasLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="listarOficinasLabel">Añadir oficina</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="oficina in oficinas">
                                    <th scope="row">{{ oficina.id }}</th>
                                    <td>
                                        <input type="text" class="form-control" v-model="oficina.nombre"
                                               @change="updateOficina(oficina.id, oficina.nombre)">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" v-model="oficina.correo"
                                               @change="updateOficina(oficina.id, oficina.correo)">
                                    </td>
                                    <td v-if="oficina.estado === '1'">
                                        <button class="btn btn-danger" @click="estadoOficina(oficina.id, 2)">
                                            Desactivar
                                        </button>
                                    </td>
                                    <td v-else>
                                        <button class="btn btn-success" @click="estadoOficina(oficina.id, 1)">
                                            Activar
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="crearOficinas" tabindex="-1" aria-labelledby="crearOficinasLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearOficinasLabel">Añadir oficina</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="success.alertaCrearOficina" class="alert alert-success" role="alert">
                            {{ success.alertaCrearOficina }}
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control form-control-sm "
                                       :class="errors.nombre ? 'is-invalid' : '' "
                                       aria-label="oficinas"
                                       aria-describedby="nombre"
                                       id="recipient-name"
                                       v-model="oficina.nombre"
                                       required
                                >
                                <div class="invalid-feedback">{{ errors.nombre ? errors.nombre : '' }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control form-control-sm "
                                       :class="errors.correo ? 'is-invalid' : '' "
                                       aria-label="correo"
                                       aria-describedby="correo"
                                       id="correo"
                                       v-model="oficina.correo"
                                       required
                                >
                                <div class="invalid-feedback">{{ errors.correo ? errors.correo : '' }}</div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" @click="crearOficina">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <header class="d-flex align-items-center mb-2 border-bottom">
            <h3>PQRS</h3>
        </header>
        <div class="row ">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datos:</th>
                        <th scope="col">Área</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Solicitado</th>
                        <th scope="col">Atendido</th>
                        <th scope="col">Cerrado</th>
                        <th scope="col">Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in datos" :key="dato.id">
                        <th scope="row">{{ dato.id }}</th>
                        <td>{{ dato.nombre }}</td>
                        <td>{{ dato.oficinas }}</td>
                        <td>{{ dato.estado ? dato.estado : 'Sin atender' }}</td>
                        <td>{{ dato.created_at }}</td>
                        <td>{{ dato.fecha_atendido }}</td>
                        <td>{{ dato.fecha_cierre }}</td>
                        <td>
                            <router-link :to="{ name: 'Editar', params: { id: dato.id } }">
                                <ion-icon name="create-outline"></ion-icon>
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item" :class="paginacion.prev_page_url ? '' : 'disabled'">
                            <button class="page-link" @click="pagina(paginacion.prev_page_url)" tabindex="-1"
                                    aria-disabled="true">Anterior
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page-3) > 0"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page-3))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page - 3 }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page-2) > 0"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page-2))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page - 2 }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page-1) > 0"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page-1))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page - 1 }}
                            </button>
                        </li>
                        <li class="page-item active">
                            <button class="page-link"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page+1) <= paginacion.last_page"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page+1))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page + 1 }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page+2) < paginacion.last_page"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page+2))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page + 2 }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" v-if="Number(paginacion.current_page+3) < paginacion.last_page"
                                    @click="pagina(paginacion.path+'?page='+Number(paginacion.current_page+3))"
                                    tabindex="-1" aria-disabled="true">{{ paginacion.current_page + 3 }}
                            </button>
                        </li>
                        <li class="page-item" :class="paginacion.next_page_url ? '' : 'disabled'">
                            <button class="page-link" @click="pagina(paginacion.next_page_url)">Siguiente</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Datos',
    data() {
        return {
            datos: null,
            paginacion: {
                prev_page_url: null,
                next_page_url: null
            },
            oficina: {},
            oficinas: {},
            errors: {},
            success: {alertaCrearOficina: false},
            datoUpdate: {},
        }
    },
    mounted() {
        this.obtenerDatos();
        this.obtenerOficinas();
    },
    methods: {
        async obtenerDatos() {
            await axios.get('/admin/pqrs/datos').then(response => {
                this.datos = response.data.data;
                this.paginacion = response.data;
            })
        },
        async pagina(url) {
            await axios.get(url).then(response => {
                this.datos = response.data.data;
                this.paginacion = response.data;
            })
        },
        crearOficina() {
            this.success.alertaCrearOficina = false;

            if (!this.oficina.nombre) {
                return this.errors.nombre = "El nombre no puede estar vacío";
            }

            this.errors.nombre = false;

            if (!this.oficina.correo) {
                return this.errors.correo = "El correo no puede estar vacío";
            }

            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

            if (!re.exec(this.oficina.correo)) {
                return this.errors.correo = "No es un correo valido";
            }

            axios.post('/pqrs-oficinas/crear', this.oficina).then(() => {
                this.obtenerOficinas();
                this.oficina.nombre = '';
                this.oficina.correo = '';
                this.success.alertaCrearOficina = 'Guardado correctamente';
            })
        },
        async obtenerOficinas() {
            await axios.get('/admin/pqrs/oficinas').then(response => {
                this.oficinas = response.data;
            })
        },
        estadoOficina(id, estado) {
            axios.post('/admin/oficina/estado', {id: id, estado: estado}).then(() => {
                this.obtenerOficinas();
            })
        },
        updateOficina(id, nombre, correo) {
            if (nombre) {
                this.datoUpdate = {
                    nombre: nombre
                }
            }

            if (correo) {
                this.datoUpdate = {
                    correo: correo
                }
            }

            axios.put('/admin/oficina/update/' + id, this.datoUpdate).then(() => {
                this.obtenerDatos();
            })
        }

    }
};
</script>
