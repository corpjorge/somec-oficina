<template>
<div class="col-lg-10 mx-auto p-3 py-md-5">
  <p class="fs-5 col-md-12">Elija la especialidad a consultar</p>
  <hr class="col-3 col-md-2 mb-5" />
  <div class="row ">
    <div class="col-md-12">
		<div class="row">
            <template  v-for="especialidad in especialidades" :key="especialidad.id" >
                <router-link style="text-decoration: none;"  class="col-sm-3" :to="{ name: 'Ver', params: { especialidad: especialidad.nombre } }">
                    <div class="text-center shadow p-3 mb-5 bg-body rounded" :id="'especialidad'+especialidad.id" @mouseover="hoverOver(especialidad.id)" @mouseleave="hoverLeave(especialidad.id)">
                        <h5 class="card-title">{{especialidad.nombre}}</h5>
                    </div>
                </router-link>
            </template>
        </div>
    </div>
  </div>
</div>
</template>

<script>
const axios = require('axios');

export default {
    name: 'Lista',
    data() {
        return {
		  especialidades: {},
          shadow: 'shadow'
        }
    },
	created() {
		this.getEspecialidad()
	},
    methods: {
        async getEspecialidad(){ await axios.get('/especialidades').then( response => { this.especialidades = response.data; }) },
        hoverOver(id) {
            var element = document.getElementById("especialidad"+id);
            element.classList.remove("shadow");
            element.classList.add("shadow-lg");
        },
        hoverLeave(id) {
            var element = document.getElementById("especialidad"+id);
            element.classList.remove("shadow-lg");
            element.classList.add("shadow");
        }
    }

};
</script>
