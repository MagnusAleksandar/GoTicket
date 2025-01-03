<?php
class Persona{
    protected $id, $clave, $nombre, $email, $telefono;
    
    public function getId() {
        return $this->id;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __construct($id=null, $clave=null, $nombre=null, $email=null, $telefono=null) {
        $this->id = $id;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

}
?>