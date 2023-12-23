<?php

/**
 * Luis Enrique Ledesma Ollague
 * indice donde se presentan os clubes
 */
session_name('LLigaBasquet');
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
myHead('Clubes');

myMenu();
contadorVisitas();
?>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center">
                <h1 class='text-primary'>CLUBES</h1>
                <div class="d-flex">
                    <?php
                    foreach (obtenerClubs() as $club) : ?>
                        <a href="listar<?php echo trim($club->getNombre()) ?>.php">
                            <div class="mb-2 text-center justify-content-center">
                                <img src="images/logos_clubs/<?php echo $club->getNombre() ?>.png" alt="<?php echo $club->getNombre() ?>" width="100px">
                                <p><?php echo $club->getNombre() ?></p>
                            </div>
                        </a>
                    <?php endforeach;
                    generarJugadoresClubPHP(); ?>
                </div>
            </div>
        </div>
    </section>
</body>