<?php
class FacturaDAO{
    private $idFactura, $idCliente, $fechaGeneracion, $horaGeneracion, $montoTotal;

    public function __construct($idFactura=null, $idCliente=null, $fechaGeneracion=null, $horaGeneracion=null, $montoTotal=null) {
        $this->idFactura = $idFactura;
        $this->idCliente = $idCliente;
        $this->fechaGeneracion = $fechaGeneracion;
        $this->horaGeneracion = $horaGeneracion;
        $this->montoTotal = $montoTotal;
    }

    public function nuevaFactura($idFactura, $idCliente, $fechaGeneracion, $horaGeneracion, $montoTotal){
        return "INSERT INTO `factura`(`idFactura`, `idCliente`, `fecha_generacion`, `hora_generacion`, `monto_total`) 
                VALUES ('$idFactura', '$idCliente', '$fechaGeneracion', '$horaGeneracion', '$montoTotal')";
    }

    public function consultarPorId($id){
        return "SELECT `idFactura`, `idCliente`, `fecha_generacion`, `hora_generacion`, `monto_total` FROM `factura` 
        WHERE `idFactura` = $id";
    }
}
?>