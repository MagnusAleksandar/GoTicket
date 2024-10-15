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
            $proveedor = new Proveedo($registro[0], $registro[1], $registro[2], $registro[3]);
            array_push($listaProveedores, $proveedor);
        }
        $conexion -> cerrarConexion();
        return $listaProveedores; 
    }

}
?>