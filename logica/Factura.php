<?php
class Factura {
    private $idFactura, $idBoleta, $idCliente, $pulep, $fechaGeneracion, $horaGeneracion, $montoTotal;
    
    public function getIdFactura() {
        return $this->idFactura;
    }

    public function getIdBoleta() {
        return $this->idBoleta;
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

    public function setIdFactura($idFactura): void {
        $this->idFactura = $idFactura;
    }

    public function setIdBoleta($idBoleta): void {
        $this->idBoleta = $idBoleta;
    }

    public function setIdCliente($idCliente): void {
        $this->idCliente = $idCliente;
    }

    public function setPulep($pulep): void {
        $this->pulep = $pulep;
    }

    public function setFechaGeneracion($fechaGeneracion): void {
        $this->fechaGeneracion = $fechaGeneracion;
    }

    public function setHoraGeneracion($horaGeneracion): void {
        $this->horaGeneracion = $horaGeneracion;
    }

    public function setMontoTotal($montoTotal): void {
        $this->montoTotal = $montoTotal;
    }

    public function __construct($idFactura, $idBoleta, $idCliente, $pulep, $fechaGeneracion, $horaGeneracion, $montoTotal) {
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