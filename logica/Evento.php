<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/EventoDAO.php");

class Evento {
    private $pulep, $nombre, $fecha, $hora, $aforo, $proveedor;
    
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

    public function getProveedor() {
        return $this->proveedor;
    }

    public function setPulep($pulep) {
        $this->pulep = $pulep;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setAforo($aforo) {
        $this->aforo = $aforo;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function __construct($pulep=null, $nombre=null, $fecha=null, $hora=null, $aforo=null, $proveedor=null) {
        $this->pulep = $pulep;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->aforo = $aforo;
        $this->proveedor = $proveedor;
    }

    public function consultarTodos(){
        $listaEventos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $eventoDAO = new EventoDAO();
        $conexion -> ejecutarConsulta($eventoDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $evento = new Evento($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($listaEventos, $evento);
        }
        $conexion -> cerrarConexion();
        return $listaEventos; 
    }

}
?>