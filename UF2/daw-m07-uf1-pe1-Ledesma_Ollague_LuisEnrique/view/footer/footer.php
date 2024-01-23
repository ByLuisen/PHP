<?php
/**
 * Footer que se le añade algunas paginas
 * @author Luis Enrique
 */
date_default_timezone_set('Europe/Madrid');
$fechaHora = "La fecha es: " . date("d-m-Y") . " y la hora es " . date("h:i:s");
?>
<footer class="bg-secondary-subtle py-3 mt-auto">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="mb-3 mb-md-0 text-muted">&copy; Proven 2023</span>
                </div>
                <div class="text-end text-muted">
                    <?php
                    echo $fechaHora
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>