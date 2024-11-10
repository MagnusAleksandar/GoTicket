<?php
if(isset($_POST["agregar"])){
    $evento = new Evento();
    if($evento -> agregarEvento($_POST["pulep"], $_POST["nombreEv"], $_POST["fechaEv"], $_POST["horaEv"], $_POST["aforo"], $_SESSION["id"], null))
        echo "<div class='alert alert-success' role='alert'>Evento agregado correctamente.</div>";
    else
        echo "<div class='alert alert-danger' role='alert'>Ya existe un evento con este código pulep</div>";
}
?>

<html>
<head>
    <title>Nuevo Evento</title>
    <link rel="stylesheet" href="css/agregarevento.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
        <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Añadir evento a inventorio</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="?pid=<?php echo base64_encode("presentacion/eventos/agregarEvento.php")?>" >
                            <div class="form-group mb-3">
                                <input type="text" inputmode="numeric" name="pulep" class="form-control" placeholder="Código del evento" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="nombreEv" class="form-control" placeholder="Nombre del evento" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" name="fechaEv" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="time" name="horaEv" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" inputmode="numeric" name="aforo" class="form-control" placeholder="Precio" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" inputmode="numeric" name="aforo" class="form-control" placeholder="Aforo" required>
                            </div>
                            <div class="row">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                                </div>
                                <div class="col-8">
                                    <a href="?pid=<?php echo base64_encode("presentacion/proveedor/sesionProveedor.php")?>" class="btn btn-primary" role="button">Volver a página principal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>