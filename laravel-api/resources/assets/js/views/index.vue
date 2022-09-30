<template>
	<div>
		<custom-navbar />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 contenedor">
				<img class="perro-logo" src="images/perro_logo.png">
				<h3><strong>Bienvenido a Perritos! un sistema para clasificar perros de todas las razas tamaños y colores.</strong></h3>
			</div>
		</div>
	</div>
</template>
<script>
import CustomNavbar from '../components/CustomNavbar.vue'

export default {
	name: 'index',
	components: {
		'custom-navbar': CustomNavbar
	}
}
</script>
<style type="text/css">
.contenedor {
	margin-top: 5%;
	text-align: center;
}

.perro-logo {
	display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
  margin-top: 8%;
}
</style>