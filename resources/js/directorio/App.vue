<template>
    <div class="col-lg-10 mx-auto p-3 py-md-5">
        <header class="d-flex align-items-center mb-2 border-bottom">
            <h3>Directorio Profesional</h3>
        </header>
        <div v-if="enviando" class="fs-5 col-md-12 alert alert-success" role="alert">
            Su solicitud ha sido enviada.
        </div>

        <div class="row ">
            <div class="col-md-12">
                <form v-if="!enviando" class="needs-validation" autocomplete="off" novalidate
                      @submit.prevent="crearDirectorio">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-1 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm"
                                   :class="errors.nombre ? 'is-invalid' : '' " id="nombre" aria-describedby="nombre"
                                   v-model="directorio.nombre"
                                   @change="validarNombre"
                            >
                            <div class="invalid-feedback">{{ errors.nombre ? errors.nombre[0] : '' }}</div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-1 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-sm"
                                   :class="errors.telefono ? 'is-invalid' : '' " id="telefono" aria-describedby="telefono"
                                   v-model="directorio.telefono"
                                   @change="validarTelefono"
                            >
                            <div class="invalid-feedback">{{ errors.telefono ? errors.telefono[0] : '' }}</div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="profesion" class="col-sm-1 col-form-label">Profesión:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm"
                                   :class="errors.profesion ? 'is-invalid' : '' " id="profesion" aria-describedby="profesion"
                                   v-model="directorio.profesion">
                            <div class="invalid-feedback">{{ errors.profesion ? errors.profesion[0] : '' }}</div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="especialidad" class="col-sm-1 col-form-label">Especialidad:</label>
                        <div class="col-sm-10">
                            <select class="form-select form-select-sm" :class="errors.especialidad ? 'is-invalid' : '' "
                                    aria-label="especialidad" v-model="directorio.especialidad" id="especialidad">
                                <option v-for="especialidad in especialidades" :key="especialidad.id" :value="especialidad.nombre">{{ especialidad.nombre }}
                                </option>
                            </select>
                            <div class="invalid-feedback">{{ errors.especialidad ? errors.especialidad[0] : '' }}</div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit" :disabled='isDisabled'>Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    name: 'App',
    data() {
        return {
            directorio: {},
            errors: {},
            enviando: null,
            especialidades: {},
            isDisabled: true
        }
    },
    created() {
        this.getEspecialidades()
    },
    methods: {
        async crearDirectorio() {
            await axios.post('/directorio', this.directorio).then(() => {
                this.enviando = true;
            }).catch(error => {
                this.errors = error.response.data.errors;
            })
        },
        async getEspecialidades() {
            await axios.get('/especialidades').then(response => {
                this.especialidades = response.data;
            })
        },
        validarNombre() {
            let regex = /(\d+)/g;
            if (this.directorio.nombre.match(regex)) {
                this.errors = {nombre: {0: 'El nombre no puede tener números'}}
                return this.isDisabled = true;
            }
            this.errors = {nombre: false}
            return this.isDisabled = false;
        },
        validarTelefono() {

            if (isNaN(this.directorio.telefono)) {
                this.errors = {telefono: {0: 'El Celular solo puede ser numérico'}}
                return this.isDisabled = true
            }

            if (this.directorio.telefono.length < 7 ) {
                console.log(this.directorio.telefono.length);
                this.errors = {telefono: {0: 'Numero incorrecto'}}
                return this.isDisabled = true
            }

            if (this.directorio.telefono.length > 10 ) {
                this.errors = {telefono: {0: 'Numero incorrecto'}}
                return this.isDisabled = true
            }

            this.errors = {telefono: false}
            return this.isDisabled = false;
        },

    }
};
</script>
