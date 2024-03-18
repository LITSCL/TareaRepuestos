<?php 
if (file_exists('config/database.php')) {
	require_once 'config/database.php';
}		
else {
	require_once '../config/database.php';
}
?>

<?php
class RepuestoDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar();
	}
	
	public function save(Repuesto $r) {
	    $marca = $r->getMarca();
	    $modelo = $r->getModelo();
	    $year = $r->getYear();
	    $numeroParte = $r->getNumeroParte();
	    $codigo = $r->getCodigo();
	    $descripcion = $r->getDescripcion();
	    $precio = $r->getPrecio();
		
		$query = $this->db->query("INSERT INTO repuesto VALUES(null, '{$marca}', '{$modelo}', {$year}, '{$numeroParte}', '{$codigo}', '{$descripcion}', {$precio})");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>