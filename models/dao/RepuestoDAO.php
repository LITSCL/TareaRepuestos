<?php 
if (file_exists('config/database.php')) {
	require_once 'config/database.php'; //Se usa para incluirse en el controlador frontal (Cuando se renderiza una vista).
}		
else {
	require_once '../config/database.php'; //Se usa para incluirse en el método "controlador" de los controladores del modelo.
}
?>

<?php
class RepuestoDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar(); //Cuando se crea una instancia de la capa DAO, el programa se conecta a la base de datos.
	}
	
	public function save(Repuesto $r) {
	    $marca = $r->getMarca();
	    $modelo = $r->getModelo();
	    $year = $r->getYear();
	    $numeroParte = $r->getNumeroParte();
	    $codigo = $r->getCodigo();
	    $descripcion = $r->getDescripcion();
	    $precio = $r->getPrecio();
		
		$query = $this->db->query("INSERT INTO repuesto VALUES('null', '{$marca}', {$modelo}, $year, {$numeroParte}, {$codigo}, {$descripcion}, $precio)");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>