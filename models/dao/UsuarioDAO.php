<?php
if (file_exists('config/database.php')) {
	require_once 'config/database.php';
}
else {
	require_once '../config/database.php';
}
?>

<?php
class UsuarioDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar();
	}
	
	public function save(Usuario $u) {	
		$nombre = $u->getNombre();
		$clave = $u->getClave();
		
		$query = $this->db->query("INSERT INTO usuario VALUES(null, '{$nombre}', '{$clave}')");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>