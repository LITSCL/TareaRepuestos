<?php
class Repuesto {
    private $id;
	private $marca;
	private $modelo;
	private $year;
	private $numeroParte;
	private $codigo;
	private $descripcion;
	private $precio;
	
	public function getId() {
	    return $this->id;
	}
	
    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getYear() {
        return $this->year;
    }

    public function getNumeroParte() {
        return $this->numeroParte;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setNumeroParte($numeroParte) {
        $this->numeroParte = $numeroParte;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>