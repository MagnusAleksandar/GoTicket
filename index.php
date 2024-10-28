<?php
session_start();
if(isset($_GET["cerrarSesion"])){
    session_destroy();
}
require ("logica/Evento.php");
require ("logica/Persona.php");
require ("logica/Proveedor.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTicket</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <?php include("encabezado.php"); ?>
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <button class="navbar-toggler custom-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                Eventos
                            </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    $evento = new Evento();
                                    $eventos = $evento->consultarTodos();
                                    foreach ($eventos as $eventoActual) {
                                        echo "<li><a class='dropdown-item' href='#'>" . $eventoActual->getNombre() . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Proveedores
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    // Suponiendo que tienes una clase Proveedor similar a Evento
                                    $proveedor = new Proveedor();
                                    $proveedores = $proveedor->consultarTodos();
                                    foreach ($proveedores as $proveedorActual) {
                                        echo "<li><a class='dropdown-item' href='#'>" . $proveedorActual->getNombre() . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                        <li class="nav-item">
                            <a class="nav-link custom-btn usuario" href="iniciarSesion.php">
                                <img src="img/usuario.png" alt="Iniciar Sesión" style="width: 50px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <div class="card border-red">
                    <div class="card-header">
                        <h4>Eventos</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $i = 0;
                        $evento = new Evento();
                        $eventos = $evento->consultarTodos();
                        foreach ($eventos as $eventoActual) {
                            if ($i % 4 == 0) echo "<div class='row mb-3'>";
                            echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                            echo "<div class='card' style='height: 100%;'>";
                            echo "<img src='" . $eventoActual->getImagen() . "' class='card-img-top' alt='Imagen de " . $eventoActual->getNombre() . "' style='height: 70%; object-fit: cover;'/>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . $eventoActual->getNombre() . "</h5>";
                            echo "<p class='card-text'>Fecha: <strong>" . $eventoActual->getFecha() . "</strong></p>";
                            echo "<p class='card-text'>Hora: <strong>" . $eventoActual->getHora() . "</strong></p>";
                            echo "<p class='card-text'>Aforo: <strong>" . $eventoActual->getAforo() . "</strong></p>";
                            echo "<p class='card-text'>Proveedor: <strong>" . $eventoActual->getProveedor() . "</strong></p>";
                            echo "<a href='#' class='btn btn-comprar'>Comprar Boleta</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            if ($i % 4 == 3) echo "</div>";
                            $i++;
                        }
                        if ($i % 4 != 0) echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>