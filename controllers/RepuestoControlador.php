<?php
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php';
}
else {
	require_once '../config/parameters.php';
}
?>

<?php
class RepuestoControlador {
	
	public function controlador() {
		require_once '../models/dto/Repuesto.php';
		require_once '../models/dao/RepuestoDAO.php';
		
		if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
			if (isset($_POST["opcion"])) {
				$opcion = $_POST["opcion"];
			}
			else {
				$opcion = $_GET["opcion"];
			}
			switch ($opcion) {
				case "1": //Crear.
					if (isset($_POST["marca"]) && isset($_POST["modelo"]) && isset($_POST["year"]) && isset($_POST["numeroParte"]) && isset($_POST["codigo"]) && isset($_POST["descripcion"]) && isset($_POST["precio"])) {
					    $daoRepuesto = new RepuestoDAO();
						$r = new Repuesto();
						
						$r->setMarca($_POST["marca"]);
						$r->setModelo($_POST["modelo"]);
						$r->setYear($_POST["year"]);
						$r->setNumeroParte($_POST["numeroParte"]);
						$r->setCodigo($_POST["codigo"]);
						$r->setDescripcion($_POST["descripcion"]);
						$r->setPrecio($_POST["precio"]);
						
						if ($daoRepuesto->save($r)) {
							$_SESSION["crear_repuesto"] = "Exitoso";
						} else {
							$_SESSION["crear_repuesto"] = "Fallido";
						}
						header("Location: " . BASE_URL . "Repuesto/CrearRepuesto");
					}
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaCrearRepuesto() {
		require_once 'views/crear_repuesto.php'; 	
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
	session_start();
	$rc = new RepuestoControlador();
	$rc->controlador();
}
?>