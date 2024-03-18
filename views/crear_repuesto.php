<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php require_once 'views/includes/head_styles.php'; ?>
	<?php require_once 'views/includes/head_scripts.php'; ?>
</head>
<body>
	<?php require_once 'views/includes/header.php'; ?>
	<h1>Estas en Crear Repuesto</h1>
	<form action="<?=BASE_URL?>controllers/RepuestoControlador.php" method="POST">
		<table border="5px">
			<tr>
				<td>Marca</td>
				<td><input type="text" name="marca" required/></td>
			</tr>
			<tr>
				<td>Modelo</td>
				<td><input type="text" name="modelo" required/></td>
			</tr>
			<tr>
				<td>Año</td>
				<td><input type="number" name="year" required/></td>
			</tr>
			<tr>
				<td>Numero Parte</td>
				<td><input type="number" name="numeroParte" required/></td>
			</tr>
			<tr>
				<td>Codigo</td>
				<td><input type="number" name="codigo" required/></td>
			</tr>
			<tr>
				<td>Descripcion</td>
				<td><input type="number" name="descripcion" required/></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input type="number" name="precio" required/></td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="1">Crear</button>
	</form>
	<?php 
	if (isset($_SESSION["crear_repuesto"]) && $_SESSION["crear_repuesto"] == "Exitoso"): 
	?>
		<strong class="alerta-verde">Repuesto creado correctamente</strong>
	<?php 
	elseif (isset($_SESSION["crear_repuesto"]) && $_SESSION["crear_repuesto"] == "Fallido"):
	?>
		<strong class="alerta-roja">Error al crear el repuesto</strong>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("crear_repuesto"); ?>
</body>
</html>

