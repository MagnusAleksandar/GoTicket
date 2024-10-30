<?php
require("logica/Evento.php");
$evento = new Evento;
$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;
if(isset($_GET["pulep"]))
    $evento->consultarPorPulep($_GET["pulep"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar boletas</title>
    <?php 
        include("script.php");
        include("encabezado.php");
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
                        <?php if ($cantidad > 0) { ?>
                            <div id="additionalFormsContainer">
                                <h5>
                                    <?php echo $_POST["nombre"]; ?>
                                </h5>
                                <div class="row">
                                    <div class="col">
                                        <img src="<?php echo $_POST["imagen"]; ?>" alt="Imagen de <?php echo $_POST["nombre"]; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col">
                                        <?php for ($i = 1; $i <= $cantidad; $i++) { ?>
                                            <form method="post" action="compraEvento.php">
                                                <div class="form-group mb-3">
                                                    <div class="row justify-content-evenly">
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del asistente" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" inputmode="numeric" name="telefono" class="form-control" placeholder="Teléfono">
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="col">
                                <img <?php echo "src='" . $evento->getImagen() . "'";?> alt="Imagen de "<?php echo $evento->getNombre()?> class="img-thumbnail">
                            </div>
                            <div class="col">
                                <form method="post" action="compraEvento.php">
                                    <input type="hidden" name="nombre" value="<?php echo $evento->getNombre(); ?>">
                                    <input type="hidden" name="imagen" value="<?php echo $evento->getImagen(); ?>">
                                    <div class="form-group mb-3">
                                        <p class="card-text">
                                            <?php 
                                                echo "<br>Evento: " . $evento->getNombre() . "<br>";
                                                echo "Hora: " . $evento->getHora() . "<br>";
                                                echo "Fecha: " . $evento->getFecha() . "<br>";
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
                                            <div class="col-1"></div>
                                            <div class="col-4">
                                                <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                                            </div>
                                            <div class="col-7">
                                                <a href="index.php" class="btn btn-primary" role="button">Volver a página principal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>