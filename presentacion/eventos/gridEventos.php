
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
                ?>
                        <?php foreach ($eventos as $eventoActual): 
                            if ($i % 4 == 0) {
                                echo "<div class='row mb-3'>";
                            } ?>
                            
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <form action="?pid=<?php echo base64_encode("presentacion/eventos/compraEvento.php"); ?>" method="POST">
                                    <input type="hidden" name="pulep" value="<?php echo $eventoActual->getPulep(); ?>">
                                    <div class="card h-100">
                                        <?php if ($eventoActual->getImagen() != null): ?>
                                            <img src="<?= $eventoActual->getImagen(); ?>" class="card-img-top" alt="Imagen de <?= $eventoActual->getNombre(); ?>" style="height: 70%; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="text-center"><img src="https://icons.iconarchive.com/icons/custom-icon-design/mono-general-1/256/faq-icon.png" width="70%"></div>
                                        <?php endif; ?>

                                        <div class="card-body">
                                            <h5 class="card-title"><?=$eventoActual->getNombre(); ?></h5>
                                            <p class="card-text">Fecha: <strong><?= $eventoActual->getFecha(); ?></strong></p>
                                            <p class="card-text">Hora: <strong><?= $eventoActual->getHora(); ?></strong></p>
                                            <p class="card-text">Precio: <strong>$<?= number_format($eventoActual->getPrecio()); ?></strong></p>
                                            <p class="card-text">Aforo: <strong><?= $eventoActual->getAforo(); ?></strong></p>
                                        </div>
                                        
                                        <input type="hidden" name="pulep" value="<?= $eventoActual->getPulep(); ?>">
                                        <button type="submit" name="buy" class="btn btn-primary">Comprar boletas</button>
                                    </div>
                                </form>
                            </div>
                            
                            <?php 
                            if ($i % 4 == 3) {
                                echo "</div>";
                            }
                            $i++;
                        endforeach; 
                        if ($i % 4 != 0) {
                            echo "</div>";
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>