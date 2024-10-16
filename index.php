<?php
session_start();
if(isset($_GET["cerrarSesion"])){
    session_destroy();
}
require ("logica/Evento.php");
require ("logica/Persona.php");
require ("logica/Proveedor.php");

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
    <?php include ("encabezado.php");?>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="img/logo.jpg" width="50" /></a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav me-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Eventos</a>
						<ul class="dropdown-menu">
                            <?php
                            $evento = new Evento();
                            $listaEventos = $evento->consultarTodos();
							if(empty($listaEventos)){
								echo "<li><a class='dropdown-item' href='#'>No hay eventos en este momento</a></li>";
							}else{
								foreach ($listaEventos as $eventoActual) {
									echo "<li><a class='dropdown-item' href='#'>" . $eventoActual->getNombre() . "</a></li>";
								}
							}
                            ?>
						</ul>
					</li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Organizadores</a>
						<ul class="dropdown-menu">
                            <?php
                            $proveedor = new Proveedor();
                            $listaProveedores = $proveedor->consultarTodos();
							if(empty($listaProveedores)){
								echo "<li><a class='dropdown-item' href='#'>No hay proveedores en este momento</a></li>";
							}else{
								foreach ($listaProveedores as $proveedorActual) {

									echo "<li><a class='dropdown-item' href='#'>" . $proveedorActual->getNombre() . "</a></li>";
								}
							}
                            ?>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav">
				<li class="nav-item"><a href="iniciarSesion.php" class="nav-link"
					aria-disabled="true">Iniciar Sesion</a></li>
				</ul>
			</div>
		</div>
	</nav>
</body>