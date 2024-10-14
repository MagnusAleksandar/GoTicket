<?php
class Boleta {
    private $idBoleta, $idAsistente, $idFactura, $precio;
    
    // Getters y Setters
    public function getIdBoleta() {
        return $this->idBoleta;
    }

    public function getIdAsistente() {
        return $this->idAsistente;
    }

    public function getIdFactura() {
        return $this->idFactura;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setIdBoleta($idBoleta) {
        $this->idBoleta = $idBoleta;
    }

    public function setIdAsistente($idAsistente) {
        $this->idAsistente = $idAsistente;
    }

    public function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }


    public function setPrecio($precio){
        $this->precio = $precio;
    }

    // Constructor
    public function __construct($idBoleta, $idAsistente, $idFactura, $precio) {
        $this->idBoleta = $idBoleta;
        $this->idAsistente = $idAsistente;
        $this->idFactura = $idFactura;
        $this->precio = $precio;
    }
}

