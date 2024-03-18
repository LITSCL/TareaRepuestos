<?php
if (file_exists('config/database.php')) {
	require_once 'config/database.php';
}
else {
	require_once '../config/database.php';
}
?>

<?php
class ClienteDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar();
	}
	
	public function save(Cliente $c) {
		$nombre = $c->getNombre();
		$apellido = $c->getApellido();
		$identificacion = $c->getIdentificacion();
		$sexo = $c->getSexo();
		$direccion = $c->getDireccion();
		$telefono = $c->getTelefono();
		$correo = $c->getCorreo();
		
		$query = $this->db->query("INSERT INTO cliente VALUES(null, '{$nombre}', '{$apellido}', '{$identificacion}', '{$sexo}', '{$direccion}', '{$telefono}', '{$correo}')");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>