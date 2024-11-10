<?php
require ("./persistencia/ClienteDAO.php");

class Cliente extends Persona {
    public function autenticar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDAO = new ClienteDAO(null,  $this -> clave, null, $this -> email, null);
        $conexion -> ejecutarConsulta($clienteDAO -> autenticar());
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