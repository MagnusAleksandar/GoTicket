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
        return "SELECT `nit`, `clave`, `nombre`, `email`, `telefono` FROM `proveedor`";
    }

    public function autenticar(){
        return "SELECT `nit` FROM `proveedor` WHERE email = '" . $this -> email . "' and clave = '" . $this -> clave . "'";
    }

    public function consultarPorId(){
        return "SELECT `nombre`, `email`, `telefono` FROM `proveedor` WHERE nit = '" . $this -> id . "'";
    }
}
?>