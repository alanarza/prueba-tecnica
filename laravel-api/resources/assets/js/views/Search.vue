<template>
	<div>
		<custom-navbar />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 contenedor">
				
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">Busqueda y listado de perros</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="row">
				  		<div class="col-md-12">
				  			<label for="basic-url">Buscar perro: (Por: nombre, raza, color, tamaño)</label>
				  			<div class="input-group">
							  	<input v-model="params" type="text" class="form-control">
							  	<span class="input-group-btn">
						        <button @click="search()" class="btn btn-default" type="button">Buscar</button>
						      </span>
							  </div>
				  		</div>

				  		<div class="col-md-12" style="margin-top: 15px;">
				  			<ul class="list-group">
								  <li v-for="perro in perros" class="list-group-item">
								  	<div class="row">
								  		<div class="col-md-2">
								  			<img :src="'/images/perros/'+perro.foto" /> 
								  		</div>
								  		<div class="col-md-2">
								  			<h4 class="list-group-item-heading">Nombre:</h4>
    										<p class="list-group-item-text">{{perro.nombre}}</p>
    									</div>
											<div class="col-md-2">
								  			<h4 class="list-group-item-heading">Raza:</h4>
    										<p class="list-group-item-text">{{perro.raza}}</p>
    									</div>
    									<div class="col-md-2">
								  			<h4 class="list-group-item-heading">Tamaño:</h4>
    										<p class="list-group-item-text">{{perro.size}}</p>
    									</div>
    									<div class="col-md-2">
								  			<h4 class="list-group-item-heading">Color:</h4>
    										<p class="list-group-item-text">{{perro.color}}</p>
    									</div>
								  	</div>
								  </li>
								</ul>
				  		</div>	
				  	</div>
				  </div>
				</div>

				<div v-if="createdDog" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  Perrito creado con exito!
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import CustomNavbar from '../components/CustomNavbar.vue'
import axios from 'axios'

export default {
	name: 'search',
	components: {
		'custom-navbar': CustomNavbar
	},
	props: {
	  created: {
	    type: Boolean, // String, Number, Boolean, Function, Object, Array
	    required: false,
	    default: false
	  }
	},
	data() {
    return {
      createdDog: false,
      params: '',
      perros: []
    }
  },
  mounted() {

  	console.log(this.created)

  	if(this.created == true){
  		this.createdDog = true

  		setTimeout(() => { 
  			this.createdDog = false
  		}, 4000);
  	}
  },
  methods: {
  	search() {

  		const formData = new FormData();

    		formData.set('busqueda', this.params);

    		const config = {
            headers: {
                "content-type": "multipart/form-data"
            }
        };

        axios.post("/api/search", formData, config)
        .then(response => {
            console.log(response.data)
            this.perros = response.data.data
        })
        .catch(error => {
            console.log(error);
        });
  	}
  }
}
</script>
<style type="text/css">
.contenedor {
	margin-top: 5%;
	text-align: center;
}

img {
  max-width: 50%;
  max-height: 75px;
}
</style>