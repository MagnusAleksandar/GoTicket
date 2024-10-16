<?php

require_once ("./persistencia/Conexion.php");
require ("./persistencia/ProveedorDAO.php");

class Proveedor extends Persona {

    public function __construct($id=null, $clave=null, $nombre=null, $email=null, $telefono=null) {
        parent::__construct($id, $clave, $nombre, $email, $telefono);
    }
    
    public function consultarTodos(){
        $listaProveedores = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $proveedorDAO = new ProveedorDAO();
        $conexion -> ejecutarConsulta($proveedorDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $proveedor = new Proveedor($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($listaProveedores, $proveedor);
        }
        $conexion -> cerrarConexion();
        return $listaProveedores; 
    }

    public function consultarPorId(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $proveedorDAO = new ProveedorDAO($this -> id);
        $conexion -> ejecutarConsulta($proveedorDAO -> consultarPorId());
        $registro = $conexion -> siguienteRegistro();
        $this -> nombre = $registro[0];
        $this -> email = $registro[1];
        $this -> telefono = $registro[2];
        $conexion -> cerrarConexion();
    }

    public function autenticar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $proveedorDAO = new ProveedorDAO(null,  $this -> clave, null, $this -> email, null);
        $conexion -> ejecutarConsulta($proveedorDAO -> autenticar());
        if($conexion -> numeroFilas() == 0){
            $conexion -> cerrarConexion();
            return false;
        }else{
            $registro = $conexion -> siguienteRegistro();
            $this -> id = $registro[0];
            $conexion -> cerrarConexion();
            return true;
        }
    }

}
?>