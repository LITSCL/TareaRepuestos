<?php 
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php'; 
}		
else {
    require_once '../config/parameters.php';
}
?>

<?php
class UsuarioControlador {
	
	public function controlador() {
		require_once '../models/dto/Usuario.php';
		require_once '../models/dao/UsuarioDAO.php';
		
		$errores = array();
		
		if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
			if (isset($_POST["opcion"])) {
				$opcion = $_POST["opcion"];
			}
			else {
				$opcion = $_GET["opcion"];
			}
			switch ($opcion) {
				case "1": //Crear.
				    if (isset($_POST["nombre"]) && isset($_POST["clave"])) {
						$daoUsuario = new UsuarioDAO();
						$u = new Usuario();

						$u->setNombre($_POST["nombre"]);
						$u->setClave($_POST["clave"]);
						
						if (strlen($_POST["nombre"]) != 6) {
						    array_push($errores, "El nombre ingresado debe poseer 6 caracteres");
						}
						if (!($_POST["nombre"] == ctype_lower($_POST["nombre"]))) {
						    array_push($errores, "El nombre ingresado debe estar en minusculas");
						}
						
						if (sizeof($errores) == 0) {
						    if ($daoUsuario->save($u)) {
						        $_SESSION["crear_usuario"] = "Exitoso";
						    } else {
						        $_SESSION["crear_usuario"] = "Fallido";
						    }
						}
						else {
						    $_SESSION["crear_usuario"] = "Fallido";
						    $_SESSION["errores"] = $errores;
						}
						header("Location: " . BASE_URL . "Usuario/CrearUsuario");
					}
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaCrearUsuario() {	
		require_once 'views/crear_usuario.php';
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
	session_start();
	$uc = new UsuarioControlador();
	$uc->controlador();
}
?>