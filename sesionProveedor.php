<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location: iniciarSesion.php");
}
$id = $_SESSION["id"];
require ("logica/Persona.php");
require ("logica/Proveedor.php");
$proveedor = new Proveedor($id);
$proveedor -> consultarPorId();
?>
<html>
<head>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php include ("encabezado.php");?>

	<nav class="navbar navbar-expand-lg custom-navbar">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="img/logosinfondo.png" width="50" /></a>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav me-auto">
					<li class="nav-item dropdown">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Eventos
							</button>
							<ul class="dropdown-menu">
								<li><a class='dropdown-item' href='agregarEvento.php'>Nuevo Evento</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<button class='btn btn-secondary dropdown-toggle' type='button'
							data-bs-toggle='dropdown' aria-expanded='false'>
							<?php echo $proveedor -> getNombre()?>
						</button></a>
						<ul class="dropdown-menu">
                            <li><a class='dropdown-item' href='index.php?cerrarSesion=true'>Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>			
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h4>Sesion Proveedor</h4>
					</div>
					<div class="card-body">
						<p>Bienvenido</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>