<?php
class BoletaDAO {
    private $idBoleta, $idAsistente, $pulep, $idFactura, $qr;

    public function __construct($idBoleta=null, $idAsistente=null, $pulep=null, $idFactura=null, $qr=null) {
        $this->idBoleta = $idBoleta;
        $this->idAsistente = $idAsistente;
        $this->pulep = $pulep;
        $this->idFactura = $idFactura;
        $this->qr = $qr;
    }

    public function consultarTodos(){
        return "SELECT `idBoleta`, `idAsistente`, `pulep`, `idFactura` FROM `boleta`";
    }

    public function comprarBoleta($idBoleta, $idAsistente, $idFactura, $pulep){  
        return "INSERT INTO `boleta`(`idBoleta`, `idAsistente`, `pulep`, `idFactura`) 
                VALUES ('$idBoleta', '$idAsistente', '$pulep', '$idFactura')";  
    }

    public function consultarPorId($id){
        return "SELECT `idBoleta`, `idAsistente`, `pulep`, `idFactura` FROM `boleta`
        WHERE `idBoleta` = '$id'"; 
    }
}
?>