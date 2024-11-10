<?php
$error = false;
if(isset($_POST["autenticar"])){
	if(str_contains($_POST["correo"], "@paramo.com")){
		$proveedor = new Proveedor(null, md5($_POST["clave"]), null, $_POST["correo"], null);
		if($proveedor -> autenticar()){
			$_SESSION["id"] = $proveedor -> getId();
			header("Location: ?pid=" . base64_encode("presentacion/proveedor/sesionProveedor.php"));     
		}
	}else{
		$cliente = new Cliente(null, md5($_POST["clave"]), null, $_POST["correo"], null);
		if($cliente -> autenticar()){
			$_SESSION["id"] = $cliente -> getId();
			$cantidad = isset($_SESSION['cantidad']) ? $_SESSION['cantidad'] : 0;
    		$pulep = isset($_SESSION['pulep']) ? $_SESSION['pulep'] : '';
			if(isset($_SESSION["pulep"]) && isset($_SESSION["cantidad"])){
				header("Location: ?pid=" . base64_encode("presentacion/cliente/carrito.php"));
			}
			else{
				header("Location: ?pid=" . base64_encode("presentacion/cliente/sesionCliente.php"));
			}
			// unset($_SESSION['cantidad']);
    		// unset($_SESSION['pulep']);
		}else{
			$error = true;
		}
	}
}
?>
<html>
<head>
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="css/iniciarsesion.css">
</head>
<body>
<?php include("presentacion/encabezado.php") ?>
<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header text-bg-info">
						<h4>Iniciar Sesion</h4>
					</div>
					<div class="card-body">
						<form method="post" action="?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
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