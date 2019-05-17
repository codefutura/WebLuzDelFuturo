<?php
function obtenerEncabezado(){
	$encabezado = <<<ENCABEZADO
	<!DOCTYPE <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Colegio Luz Del Futuro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/Stylopag.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	   
	</head>
	<body>
																	<!--barra horizontar del menu-->
	<header class="contenedor">
	<div>
		<img src="imagenes/logocole.png"> <a href="#"></a> 
			<h1>COLEGIO LUZ DEL FUTURO</h1>
			<h3>Fundado el 18 de Abril del 2019</h3>
		</div>
		<nav>
						<a class="activo" href="indexhol.php">Inicio</a>
					<a href="informaciongeneral.php">Informacion General</a>
					<a href="ofertacurricular.php">Oferta Curricular</a>
					<a href="login.php">Estudiantes</a>
			</nav-->
		</header>

ENCABEZADO;
return $encabezado;
}

function obtenerPieDePagina(){
	$pieDePagina = <<<PIE
	<div class="pieDePagina">
        <p>
            &copy; 20019 Colegio Luz Del Futuro | Nagua, Maria Trinidad Sanchez - Todos los derechos reservados
        </p>
      </div>
PIE;
return $pieDePagina;
}