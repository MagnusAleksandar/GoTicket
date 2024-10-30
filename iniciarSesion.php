<?php
session_start();
require ("logica/Persona.php");
require ("logica/Proveedor.php");
$error = false;
if(isset($_POST["autenticar"])){
    $proveedor = new Proveedor(null, md5($_POST["clave"]), null, $_POST["correo"], null);
	if($proveedor -> autenticar()){
		$_SESSION["id"] = $proveedor -> getId();
		header("Location: sesionProveedor.php");     
	}else{
		$error = true;
	}
}
?>
<html>
<head>
	<title>Iniciar Sesión</title>
	<?php include("script.php");?>
	<link rel="stylesheet" href="css/iniciarsesion.css">
</head>
<body>
<?php include("encabezado.php") ?>
<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header text-bg-info">
						<h4>Iniciar Sesion</h4>
					</div>
					<div class="card-body">
						<form method="post" action="iniciarSesion.php" >
							<div class="mb-3">
								<input type="email" name="correo" class="form-control" placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" name="clave" class="form-control" placeholder="Clave" required>
							</div>
							<button type="submit" name="autenticar" class="btn btn-primary">Iniciar Sesion</button>
							<?php if($error){ ?>
                            <div class="alert alert-danger mt-3" role="alert">
                            	Error de correo o clave
							</div>   
							<?php
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>