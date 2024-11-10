<?php
require ("./persistencia/BoletaDAO.php");

class Boleta {
    private $idBoleta, $idAsistente, $pulep, $idFactura, $qr;
    
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

    public function getPulep() {
        return $this->pulep;
    }

    public function getQr() {
        return $this->qr;
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

    public function setPulep($pulep) {
        $this->pulep = $pulep;
    }

    public function setQr($qr) {
        $this->qr = $qr;
    }

    // Constructor
    public function __construct($idBoleta=null, $idAsistente=null, $pulep=null, $idFactura=null, $qr=null) {
        $this->idBoleta = $idBoleta;
        $this->idAsistente = $idAsistente;
        $this->pulep = $pulep;
        $this->idFactura = $idFactura;
        $this->qr = $qr;
    }

    public function comprarBoleta($idBoleta, $idAsistente, $idFactura, $pulep){
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $boletaDAO = new BoletaDAO();
        $conexion->ejecutarConsulta($boletaDAO->consultarPorId($idBoleta));
        if(!$registro = $conexion->siguienteRegistro()){
            echo $boletaDAO->comprarBoleta($idBoleta, $idAsistente, $idFactura, $pulep);
            $conexion->ejecutarConsulta($boletaDAO->comprarBoleta($idBoleta, $idAsistente, $idFactura, $pulep));
            $conexion->ejecutarConsulta($boletaDAO->consultarPorId($idBoleta));
            if($registro = $conexion->siguienteRegistro()){
                $conexion->cerrarConexion();
                return true;
            }
        }else{
            $conexion->cerrarConexion();
            return false;
        }
    }
}

