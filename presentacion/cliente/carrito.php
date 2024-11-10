<?php
include("presentacion/encabezado.php");
$cantidad = $_SESSION["cantidad"];
$pulep = $_SESSION["pulep"];
$flag = true;
$numFactura = (int)$_SESSION['pulep'] + 1000;
$factura = new Factura;
date_default_timezone_set('America/Bogota');
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');
$total = (int)$_SESSION["precio"]*$cantidad;
$factura -> nuevaFactura($numFactura, $_SESSION["id"], $currentDate, $currentTime, (int)$_SESSION["precio"]*$cantidad);
echo "<h1 class='card-header text-center'>Compra tus boletas</h1>";
if(isset($_POST["agregar"])){
    $asistente = new Asistente;
    $boleta = new Boleta;
    for ($j = 1; $j <= $cantidad; $j++) {
        if (isset($_POST["nombre$j"])) {
            $nombre = $_POST["nombre$j"];
            if (isset($_POST["correo$j"]))
                $correo = $_POST["correo$j"];
            if (isset($_POST["telefono$j"]))
                $tel = $_POST["correo$j"];
            if(!$asistente -> agregarAsistente($j, $nombre, $correo, $tel) && !$boleta -> comprarBoleta($j, $j, $numFactura, $pulep)){
                $flag = false;
                break;
            }
        }
    }
    if(!$flag)
        echo "<div class='alert alert-danger' role='alert'>Hubo un problema con la compra.</div>";
    else
        echo "<div class='alert alert-success' role='alert'>Boletas compradas. Total a pagar: $" . $total . "</div>";
}

?>
<div class="container mt-4">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <form method="post" action="?pid=<?php echo base64_encode("presentacion/cliente/carrito.php")?>">
                    <div class="card-header">
                        <h4>Ingresa los datos de los asistentes</h4>
                    </div>
                    <div>
                        <div class="card-body">
                            <?php 
                            echo "<p>" . $numFactura . "</p>";
                            for($i = 1; $i <= $cantidad; $i++){?>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <input type="text" name="nombre<?php echo $i;?>" class="form-control" placeholder="Nombre del asistente #<?php echo $i;?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="correo<?php echo $i;?>" class="form-control" placeholder="Correo del asistente (opcional)">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="telefono<?php echo $i;?>" class="form-control" placeholder="Telefono del asistente (opcional)">
                                </div>
                            </div>
                            <div class="row"><p><br></p></div>
                            <?php
                            }
                            ?>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <button type="submit" name="agregar" class="btn btn-primary">Agregar al carrito</button>
                                </div>
                                <div class="col">
                                    <a href="?pid=<?php echo base64_encode("presentacion/cliente/sesionCliente.php")?>" class="btn btn-primary" role="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- INSERT INTO `boleta`(`idBoleta`, `idAsistente`, `pulep`, `idFactura`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]') -->