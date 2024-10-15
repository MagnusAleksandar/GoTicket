<?php
class Factura {
    private $idFactura, $idCliente, $pulep, $fechaGeneracion, $horaGeneracion, $montoTotal;
    
    public function getIdFactura() {
        return $this->idFactura;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getPulep() {
        return $this->pulep;
    }

    public function getFechaGeneracion() {
        return $this->fechaGeneracion;
    }

    public function getHoraGeneracion() {
        return $this->horaGeneracion;
    }

    public function getMontoTotal() {
        return $this->montoTotal;
    }

    public function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setPulep($pulep) {
        $this->pulep = $pulep;
    }

    public function setFechaGeneracion($fechaGeneracion) {
        $this->fechaGeneracion = $fechaGeneracion;
    }

    public function setHoraGeneracion($horaGeneracion) {
        $this->horaGeneracion = $horaGeneracion;
    }

    public function setMontoTotal($montoTotal) {
        $this->montoTotal = $montoTotal;
    }

    public function __construct($idFactura=null, $idBoleta=null, $idCliente=null, $pulep=null, $fechaGeneracion=null, $horaGeneracion=null, $montoTotal=null) {
        $this->idFactura = $idFactura;
        $this->idBoleta = $idBoleta;
        $this->idCliente = $idCliente;
        $this->pulep = $pulep;
        $this->fechaGeneracion = $fechaGeneracion;
        $this->horaGeneracion = $horaGeneracion;
        $this->montoTotal = $montoTotal;
    }

}
?>