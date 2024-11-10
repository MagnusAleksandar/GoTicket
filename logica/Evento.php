<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/EventoDAO.php");

class Evento {
    private $pulep, $nombre, $fecha, $hora, $precio, $aforo, $proveedor, $imagen; // Nuevo atributo para la imagen
    
    // Getters
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

    public function getPrecio() {
        return $this->precio;
    }

    public function getAforo() {
        return $this->aforo;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getImagen() {
        return $this->imagen;
    }

    // Setters
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

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setAforo($aforo) {
        $this->aforo = $aforo;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function setImagen($imagen) { // Setter para la imagen
        $this->imagen = $imagen;
    }

    // Constructor
    public function __construct($pulep=null, $nombre=null, $fecha=null, $hora=null, $precio=null, $aforo=null, $proveedor=null, $imagen=null) {
        $this->pulep = $pulep;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->precio = $precio;
        $this->aforo = $aforo;
        $this->proveedor = $proveedor;
        $this->imagen = $imagen; 
    }

    // Método para consultar todos los eventos
    public function consultarTodos(){
        $listaEventos = array();
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $eventoDAO = new EventoDAO();
        $conexion->ejecutarConsulta($eventoDAO->consultarTodos());
        while($registro = $conexion->siguienteRegistro()){
            $evento = new Evento($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6], $registro[7]); // Asumiendo que la imagen está en la posición 5
            array_push($listaEventos, $evento);
        }
        $conexion->cerrarConexion();
        return $listaEventos; 
    }

    public function consultarPorPulep($pulep){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $eventoDAO = new EventoDAO();
        $conexion -> ejecutarConsulta($eventoDAO -> consultarPorPulep($pulep));
        $registro = $conexion -> siguienteRegistro();
        $this -> nombre = $registro[0];
        $this -> fecha = $registro[1];
        $this -> hora = $registro[2];
        $this -> precio = $registro[3];
        $this -> aforo = $registro[4];
        $this -> proveedor = $registro[5];
        $this -> imagen = $registro[6];
        $conexion -> cerrarConexion();
    }

    // Método para agregar un evento
    public function agregarEvento($pulep, $nombre, $fecha, $hora, $aforo, $precio, $proveedor, $imagen){
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $eventoDAO = new EventoDAO();
        $conexion->ejecutarConsulta($eventoDAO->consultarPorPulep($pulep));
        if(!$registro = $conexion->siguienteRegistro()){
            $conexion->ejecutarConsulta($eventoDAO->agregarEvento($pulep, $nombre, $fecha, $hora, $aforo, $precio, $proveedor, $imagen)); // Asegúrate de incluir la imagen
            $conexion->ejecutarConsulta($eventoDAO->consultarPorPulep($pulep));
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
?>
