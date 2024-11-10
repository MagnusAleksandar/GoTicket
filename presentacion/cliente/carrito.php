<?php
include("presentacion/encabezado.php");
$cantidad = $_SESSION["cantidad"];
echo "<h1 class='card-header text-center'>Compra tus boletas</h1>";
if(isset($_POST["agregar"])){
    $asistente = new Asistente;
    $boleta = new Boleta;

}
for($i = 1; $i <= $cantidad; $i++){
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Ingresa los datos del asistente <?php echo $i;?></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="?pid=<?php echo base64_encode("presentacion/cliente/carrito.php")?>">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre<?php echo $i;?>" class="form-control" placeholder="Nombre del asistente" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="correo" class="form-control" placeholder="Correo del asistente (opcional)">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="telefono" class="form-control" placeholder="Telefono del asistente (opcional)">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="submit" name="agregar<?php echo $i;?>" class="btn btn-primary">Agregar al carrito</button>
                            </div>
                            <div class="col">
                                <a href="?pid=<?php echo base64_encode("presentacion/cliente/sesionCliente.php")?>" class="btn btn-primary" role="button">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INSERT INTO `boleta`(`idBoleta`, `idAsistente`, `pulep`, `idFactura`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]') -->
<?php
}
?>