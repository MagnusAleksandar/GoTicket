<?php
require ("./persistencia/AsistenteDAO.php");

class Asistente extends Persona {
    public function agregarAsistente(){
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $asistenteDAO = new AsistenteDAO();
        $conexion->ejecutarConsulta($asistenteDAO->consultarPorId($id));
        if(!$registro = $conexion->siguienteRegistro()){
            $conexion->ejecutarConsulta($asistenteDAO->agregarAsistente($id, null, $nombre, $email, $telefono));
            $conexion->ejecutarConsulta($asistenteDAO->consultarPorId($id));
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
