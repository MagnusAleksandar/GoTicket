<?php

$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;
$evento = new Evento;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pulep = $_POST['pulep'];
    $evento->consultarPorPulep($pulep);
}
if ($cantidad > 0){
    $_SESSION['cantidad'] = $cantidad;
    $_SESSION['pulep'] = $pulep;
    header("Location: ?pid=" . base64_encode("presentacion/cliente/carrito.php"));
}else{
    echo "<div class='alert alert-warning' role='alert'>El número de boletas debe ser mayor a 0.</div>";
}
?>

<head>
    <title>Comprar boletas</title>
    <?php 
        include("presentacion/encabezado.php");
    ?>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h4>Comprar boletas</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo $evento->getImagen(); ?>" alt="Imagen de <?php echo $evento->getImagen(); ?>" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <form method="post" action="?pid=<?php echo base64_encode("presentacion/eventos/compraEvento.php")?>">
                                <input type="hidden" name="pulep" value="<?php echo $pulep ?>">
                                <div class="form-group mb-3">
                                    <p class="card-text">
                                        <?php 
                                            echo "Evento: " . $evento->getNombre() . "<br>";
                                            echo "Hora: " . $evento->getHora() . "<br>";
                                            echo "Fecha: " . $evento->getFecha() . "<br>";
                                            echo "Precio: $" .number_format($evento->getPrecio()) . "<br>";
                                        ?>
                                    </p>
                                <div class="row">
                                        <div class="col-8">
                                            <p class="card-text">Cantidad de boletas: </p>
                                        </div>
                                        <div class="col">
                                            <input type="number" name="cantidad" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly">
                                        <div class="col">
                                            <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                                        </div>
                                        <div class="col">
                                            <a href="index.php" class="btn btn-primary" role="button">Volver a página principal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>