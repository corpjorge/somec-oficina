<template>
   <div class="col-lg-10 mx-auto p-3 py-md-5">
	<p class="fs-5 col-md-12">
		<router-link style="text-decoration: none;" class="col-sm-3" :to="{ name: 'root' }">
			<ion-icon name="arrow-back-circle-outline"></ion-icon>
		</router-link>
		{{$route.params.especialidad}}</p>

	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<template  v-for="directorio in directorios" :key="directorio.id" >
					<hr/>
					<h4>{{directorio.nombre}}</h4>
					<p>{{directorio.profesion}}</p>
					<small><b>Contacto: </b>{{directorio.telefono}}</small>
				</template>
			</div>
		</div>
	</div>
</div>
</template>

<script>
const axios = require('axios');

export default {
    name: 'Detalle',
	data() {
        return {
            directorios: {},
        }
    },
	created() {
		this.obtenerDatos()
	},
	methods: {
		async obtenerDatos(){ await axios.get('/directorios/'+this.$route.params.especialidad).then(response => { this.directorios = response.data;}) }
	}
};
</script>
