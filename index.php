<?php
session_start();
if(isset($_GET["cerrarSesion"])){
    session_destroy();
}
require ("logica/Evento.php");
require ("logica/Persona.php");
require ("logica/Proveedor.php");
require ("logica/Asistente.php");
require ("logica/Boleta.php");
require ("logica/Cliente.php");
require ("logica/Factura.php");

$paginasSinSesion = array(
    "presentacion/iniciarSesion.php",
    "presentacion/cliente/registrarCliente.php",
    "presentacion/eventos/compraEvento.php",
);

$paginasConSesion = array(
    "presentacion/proveedor/sesionProveedor.php",
    "presentacion/eventos/agregarEvento.php",
    "presentacion/cliente/sesionCliente.php",
    "presentacion/cliente/carrito.php",
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GoTicket</title>
    <?php include("presentacion/script.php");?>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php
        if(!isset($_GET["pid"])){
            include("presentacion/encabezado.php");
            include("presentacion/menu.php");
            include("presentacion/eventos/gridEventos.php");
        }else{
            $pid = base64_decode($_GET["pid"]);
            if (in_array($pid, $paginasSinSesion)) {
                include($pid);
            }else if(in_array($pid, $paginasConSesion)){
                if(isset($_SESSION["id"])){
                    include ($pid);
                }else{
                    include ("presentacion/iniciarSesion.php");
                }
            }else{
                echo "<h1>Error 404</h1>";        
            }
        }
    ?>
    
    
</body>

</html>