<?php
$id = $_SESSION["id"];
$proveedor = new Proveedor($id);
$proveedor -> consultarPorId();
include ("presentacion/encabezado.php");
include ("presentacion/proveedor/menuAdmin.php");
?>
<head>
	<link
	rel="stylesheet">
	<title>GoTicket Proveedor</title>
	<link rel="stylesheet" href="css/index.css">
</head>
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