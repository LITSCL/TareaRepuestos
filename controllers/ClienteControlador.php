<?php
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php';
}
else {
	require_once '../config/parameters.php';
}
?>

<?php
class ClienteControlador {
	
	public function controlador() {
		require_once '../models/dto/Cliente.php';
		require_once '../models/dao/ClienteDAO.php';
		
		if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
			if (isset($_POST["opcion"])) {
				$opcion = $_POST["opcion"];
			}
			else {
				$opcion = $_GET["opcion"];
			}
			switch ($opcion) {
				case "1": //Crear.
					if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["identificacion"]) && isset($_POST["sexo"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["correo"])) {
						$daoCliente = new ClienteDAO();
						$c = new Cliente();
						
						$c->setNombre($_POST["nombre"]);
						$c->setApellido($_POST["apellido"]);
						$c->setIdentificacion($_POST["identificacion"]);
						$c->setSexo($_POST["sexo"]);
						$c->setDireccion($_POST["direccion"]);
						$c->setTelefono($_POST["telefono"]);
						$c->setCorreo($_POST["correo"]);
						
						if ($daoCliente->save($c)) {
							$_SESSION["crear_cliente"] = "Exitoso";
						} else {
							$_SESSION["crear_cliente"] = "Fallido";
						}
						header("Location: " . BASE_URL . "Cliente/CrearCliente");
					}
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaCrearCliente() {
		require_once 'views/crear_cliente.php'; 	
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
	session_start();
	$cc = new ClienteControlador();
	$cc->controlador();
}
?>