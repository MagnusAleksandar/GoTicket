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
                            <li><a class='dropdown-item' href="?pid=<?php echo base64_encode("presentacion/eventos/agregarEvento.php")?>">Nuevo Evento</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class='btn btn-secondary dropdown-toggle'
                        data-bs-toggle='dropdown' aria-expanded='false'>
                        <?php echo $proveedor -> getNombre()?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class='dropdown-item' href="?cerrarSesion=true">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>			
        </div>
    </div>
</nav>