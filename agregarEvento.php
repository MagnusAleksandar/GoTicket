<?php
session_start();

require_once ("logica/Evento.php");

if(isset($_POST["agregar"])){
    $evento = new Evento();
    if(!empty($_POST["pulep"]) && !empty($_POST["nombreEv"]) && !empty($_POST["fechaEv"]) && !empty($_POST["horaEv"]) && !empty($_POST["aforo"])){
        if($evento -> agregarEvento($_POST["pulep"], $_POST["nombreEv"], $_POST["fechaEv"], $_POST["horaEv"], $_POST["aforo"], $_SESSION["id"]))
            echo "<div class='alert alert-success' role='alert'>Evento agregado correctamente.</div>";
        else
        echo "<div class='alert alert-danger' role='alert'>Ya existe un evento con este código pulep</div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>Debe completar el formulario</div>";
    }
}
?>

<html>
<head>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
        <div class="col-4"></div>
            <div class="col-4">
                <div class="card border-primary">
                    <div class="card-header text-bg-info">
                        <h4>Añadir evento a inventorio</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="agregarEvento.php" >
                            <div class="form-group mb-3">
                                <input type="text" inputmode="numeric" name="pulep" class="form-control" placeholder="Código del evento">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="nombreEv" class="form-control" placeholder="Nombre del evento">
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" name="fechaEv" class="form-control"/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="time" name="horaEv" class="form-control"/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" inputmode="numeric" name="aforo" class="form-control" placeholder="Aforo"/>
                            </div>
                            <div class="row">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                                </div>
                                <div class="col-8">
                                    <a href="sesionProveedor.php" class="btn btn-primary" role="button">Volver a página principal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>