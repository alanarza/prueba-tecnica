<template>
	<div>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <router-link to="/"><a class="navbar-brand"><strong>Perritos</strong></a></router-link>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      </ul>
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li>
		        	<router-link to="/create">
		        		<a class="nav-link d-inline-block">Crear perro</a>
		        	</router-link>
		        </li>
		        <li>
		        	<router-link to="/search">
		        		<a class="nav-link d-inline-block">Buscar perro</a>
		        	</router-link>
		        </li>
		      </ul>
		    </div>
			</div>
		</nav>
	</div>
</template>
<style type="text/css">
.nav-link {
	cursor: pointer;
	text-decoration: none !important;
}
</style>