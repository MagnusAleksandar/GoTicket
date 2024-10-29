<?php
class EventoDAO {
    private $pulep, $nombre, $fecha, $hora, $aforo, $proveedor, $imagen;  // Agregada la propiedad $imagen
    
    public function __construct($pulep=null, $nombre=null, $fecha=null, $hora=null, $aforo=null, $proveedor=null, $imagen=null) {
        $this->pulep = $pulep;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->aforo = $aforo;
        $this->proveedor = $proveedor;
        $this->imagen = $imagen;  // Inicialización de la propiedad $imagen
    }

    // Método para consultar todos los eventos, incluyendo la imagen
    public function consultarTodos(){
        return "SELECT `pulep`, `nombre`, `fecha`, `hora`, `aforo`, `nitProveedor`, `imagen` FROM `evento`";  // Agregada `imagen`
    }

    // Método para agregar un evento, incluyendo la imagen
    public function agregarEvento($pulep, $nombre, $fecha, $hora, $aforo, $proveedor, $imagen){  // Agregados los parámetros
        return "INSERT INTO `evento`(`pulep`, `nombre`, `fecha`, `hora`, `aforo`, `nitProveedor`, `imagen`) 
                VALUES ('$pulep', '$nombre', '$fecha', '$hora', '$aforo', '$proveedor', '$imagen')";  // Agregada `imagen`
    }

    // Método para consultar un evento por PULEP, incluyendo la imagen
    public function consultarPorPulep($pulep){
        return "SELECT `nombre`, `fecha`, `hora`, `aforo`, `nitProveedor`, `imagen` FROM `evento`
        WHERE `pulep` = '$pulep'";  // Agregada `imagen` y corregida la sintaxis de `$pulep`
    }
}
?>
