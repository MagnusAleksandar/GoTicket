<?php
include("persistencia/FacturaDAO.php");

class Factura {
    private $idFactura, $idCliente, $fechaGeneracion, $horaGeneracion, $montoTotal;
            //`idFactura`, `idCliente`, `fecha_generacion`, `hora_generacion`, `monto_total`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    public function getIdFactura() {
        return $this->idFactura;
    }

    public function getIdCliente() {
        return $this->idCliente;
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

    public function setFechaGeneracion($fechaGeneracion) {
        $this->fechaGeneracion = $fechaGeneracion;
    }

    public function setHoraGeneracion($horaGeneracion) {
        $this->horaGeneracion = $horaGeneracion;
    }

    public function setMontoTotal($montoTotal) {
        $this->montoTotal = $montoTotal;
    }

    public function __construct($idFactura=null, $idCliente=null, $fechaGeneracion=null, $horaGeneracion=null, $montoTotal=null) {
        $this->idFactura = $idFactura;
        $this->idCliente = $idCliente;
        $this->fechaGeneracion = $fechaGeneracion;
        $this->horaGeneracion = $horaGeneracion;
        $this->montoTotal = $montoTotal;
    }

    public function nuevaFactura($idFactura, $idCliente, $fechaGeneracion, $horaGeneracion, $montoTotal){
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $facturaDAO = new FacturaDAO();
        $conexion->ejecutarConsulta($facturaDAO->consultarPorId($idFactura));
        if(!$registro = $conexion->siguienteRegistro()){
            $conexion->ejecutarConsulta($facturaDAO->nuevaFactura($idFactura, $idCliente, $fechaGeneracion, $horaGeneracion, $montoTotal)); // Asegúrate de incluir la imagen
            $conexion->ejecutarConsulta($facturaDAO->consultarPorId($idFactura));
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