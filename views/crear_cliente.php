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
	<h1>Estas en Crear Cliente</h1>
	<form action="<?=BASE_URL?>controllers/ClienteControlador.php" method="POST">
		<table border="5px">
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" required/></td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td><input type="text" name="apellido" required/></td>
			</tr>
			<tr>
				<td>Identificacion</td>
				<td><input type="text" name="identificacion" required/></td>
			</tr>
			<tr>
				<td>Sexo</td>
				<td><input type="text" name="sexo" required/></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="text" name="direccion" required/></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telefono" required/></td>
			</tr>
			<tr>
				<td>Correo</td>
				<td><input type="text" name="correo" required/></td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="1">Crear</button>
	</form>
	<?php 
	if (isset($_SESSION["crear_cliente"]) && $_SESSION["crear_cliente"] == "Exitoso"): 
	?>
		<strong class="alerta-verde">Cliente creado correctamente</strong>
	<?php 
	elseif (isset($_SESSION["crear_cliente"]) && $_SESSION["crear_cliente"] == "Fallido"):
	?>
		<strong class="alerta-roja">Error al crear el cliente</strong>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("crear_cliente"); ?>
</body>
</html>