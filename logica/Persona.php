<?php
class Persona{
    private $id, $nombre, $email, $telefono;
    
    public function getId() {
        return $this->id;
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

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function __construct($id, $nombre, $email, $telefono) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

}
?>