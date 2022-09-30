<template>
	<div>
		<custom-navbar />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 contenedor">

				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">Formulario de creacion de perro</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="row">

				  		<div class="col-md-6 custom-input">
								<label for="basic-url">Nombre del perrito:</label>
							  <input v-model="nombre" type="text" class="form-control">
				  		</div>

				  		<div class="col-md-6 custom-input">
								<label for="basic-url">Raza:</label>
							  <input v-model="raza" type="text" class="form-control">
				  		</div>

				  		<div class="col-md-6 custom-input">
								<label for="basic-url">Tamaño:</label>
							  <input v-model="size" type="text" class="form-control">
				  		</div>

				  		<div class="col-md-6 custom-input">
								<label for="basic-url">Color de pelo:</label>
							  <input v-model="color" type="text" class="form-control">
				  		</div>

				  		<div class="col-md-12 custom-input">
							  <label for="basic-url">Foto:</label>
							  <input type="file" @change="onFileChange" class="form-control" aria-describedby="inputGroupFileAddon01">

							  <div id="preview">
							    <img v-if="url" :src="url" />
							  </div>
            	</div>

						</div>
				  </div>
				  <div class="panel-footer align-items-end mt-auto">
            <button type="button" class="btn btn-primary" @click="save()">Crear Perrito</button>
				  </div>
				</div>

				<div v-if="error" class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  Completa todos los campos para guardar!
				</div>

			</div>
		</div>
	</div>
</template>
<script>
import CustomNavbar from '../components/CustomNavbar.vue'
import axios from 'axios'

export default {
	name: 'create',
	components: {
		'custom-navbar': CustomNavbar
	},
	data() {
    return {
      url: null,
      file: null,
      nombre: '',
      raza: '',
      size: '',
      color: '',
      error: false
    }
  },
  methods: {
    onFileChange(e) {
      const data = e.target.files[0];
      this.file = data
      this.url = URL.createObjectURL(data);
    },
    save(){
    	if(this.isEmpty(this.nombre) || this.isEmpty(this.raza) || this.isEmpty(this.size) || this.isEmpty(this.color) || this.file == null){

    		this.error = true

    		setTimeout(() => { 
    			this.error = false
    		}, 4000);

    	} else {

    		const formData = new FormData();

    		formData.set('nombre', this.nombre);
    		formData.set('raza', this.raza);
    		formData.set('size', this.size);
    		formData.set('color', this.color);
    		formData.set('foto', this.file);

    		const config = {
            headers: {
                "content-type": "multipart/form-data"
            }
        };

        axios.post("/api/create", formData, config)
        .then(response => {
            this.$router.push({ name: 'search', params: { created: true } })
        })
        .catch(error => {
            console.log(error);
        });
    	}
    },
    isEmpty(str) {
		    return (!str || str.length === 0 );
		}
  }
}
</script>
<style type="text/css">
.contenedor {
	margin-top: 5%;
	text-align: center;
}

.custom-input {
	margin-top: 2%;
}

#preview {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 2%;
}

#preview img {
  max-width: 50%;
  max-height: 400px;
}
</style>