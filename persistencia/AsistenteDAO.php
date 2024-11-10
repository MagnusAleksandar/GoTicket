<?php
class AsistenteDAO {
    private $id, $clave, $nombre, $email, $telefono;
    
    public function __construct($id=null, $clave=null, $nombre=null, $email=null, $telefono=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function consultarTodos(){
        return "SELECT `idAsistente`, `nombre`, `email`, `telefono` FROM `asistente`";
    }

    public function agregarAsistente($id, $clave, $nombre, $email, $telefono){  
        return "INSERT INTO `asistente`(`idAsistente`, `clave`, `nombre`, `email`, `telefono`) 
                VALUES ('$id', '', '$nombre', '$email', '$telefono')";  
    }

    public function consultarPorId($id){
        return "SELECT `idAsistente`, `nombre`, `email`, `telefono` FROM `asistente`
        WHERE `idAsistente` = '$id'"; 
    }
}
?>
