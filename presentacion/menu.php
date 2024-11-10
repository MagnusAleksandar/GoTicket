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
                                echo "<li><a class='dropdown-item' href='".str_replace(' ', '', $eventoActual->getNombre()) .".php'>" . $eventoActual->getNombre() . "</a></li>";
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
                    <a class="nav-link custom-btn usuario" href="?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
                        <img src="img/usuario.png" alt="Iniciar Sesión" style="width: 50px;">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>