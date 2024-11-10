<?php
include ("presentacion/encabezado.php");
$cliente = new Cliente;
?>
<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <button class='btn btn-secondary dropdown-toggle'
            data-bs-toggle='dropdown' aria-expanded='false'>
            <?php echo $cliente -> getNombre()?>
        </button>
        <ul class="dropdown-menu">
            <li><a class='dropdown-item' href="?cerrarSesion=true">Cerrar Sesion</a></li>
        </ul>
    </li>
</ul>