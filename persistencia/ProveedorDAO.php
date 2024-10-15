<?php
class ProveedorDAO{
    private $id, $clave, $nombre, $email, $telefono;

    public function __construct($id=null, $clave=null, $nombre=null, $email=null, $telefono=null) {
        $this->id = $id;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function consultarTodos(){
        return "SELECT `nit`, `nombre`, `email`, `telefono` FROM `proveedor`";
    }
}
?>