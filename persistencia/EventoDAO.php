<?php
class EventoDAO {
    private $pulep, $nombre, $fecha, $hora, $aforo, $proveedor;
    
    public function __construct($pulep=null, $nombre=null, $fecha=null, $hora=null, $aforo=null, $proveedor=null) {
        $this->pulep = $pulep;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->aforo = $aforo;
        $this->proveedor = $proveedor;
    }

    public function consultarTodos(){
        return "SELECT `pulep`, `nombre`, `fecha`, `hora`, `aforo`, `nitProveedor` FROM `evento`";
    }

}
?>