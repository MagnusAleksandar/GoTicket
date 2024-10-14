<?php
class Evento {
    private $pulep, $nombre, $fecha, $hora, $aforo, $nitProveedor;
    
    public function getPulep() {
        return $this->pulep;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getAforo() {
        return $this->aforo;
    }

    public function getNitProveedor() {
        return $this->nitProveedor;
    }

    public function setPulep($pulep): void {
        $this->pulep = $pulep;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setHora($hora): void {
        $this->hora = $hora;
    }

    public function setAforo($aforo): void {
        $this->aforo = $aforo;
    }

    public function setNitProveedor($nitProveedor): void {
        $this->nitProveedor = $nitProveedor;
    }

    public function __construct($pulep, $nombre, $fecha, $hora, $aforo, $nitProveedor) {
        $this->pulep = $pulep;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->aforo = $aforo;
        $this->nitProveedor = $nitProveedor;
    }

}
?>