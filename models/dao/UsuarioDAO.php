<?php
if (file_exists('config/database.php')) {
	require_once 'config/database.php'; //Se usa para incluirse en el controlador frontal (Cuando se renderiza una vista).
}
else {
	require_once '../config/database.php'; //Se usa para incluirse en el método "controlador" de los controladores del modelo.
}
?>

<?php
class UsuarioDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar(); //Cuando se crea una instancia de la capa DAO, el programa se conecta a la base de datos.
	}
	
	public function save(Usuario $u) {	
		$rut = $u->getRut();
		$nombre = $u->getNombre();
		
		$query = $this->db->query("INSERT INTO usuario VALUES('{$rut}', '{$nombre}')");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>