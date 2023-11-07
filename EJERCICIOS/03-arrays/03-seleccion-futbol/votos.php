<?php

declare(strict_types=1);
session_name('seleccionFutbol');
session_start();

require_once('src/functions-structure.php');
require_once('src/functions-login.php');
require_once('src/functions.php');
require_once('data/data.php');
require_login();
// Mostrar head
myHead('Recuento de Votos');
?>


<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    myMenuTrainer()
    ?>
    <div class="container">
        <div class="row my-3">
            <div class="text-center">
                <h1>Recuento de votos</h1>
            </div>
        </div>
        <div class="row my-5">
            <div class="d-flex flex-wrap justify-content-center mb-5">
                <?php

                ?>
            </div>
        </div>
    </div>
    <?php
    myFooter();
    ?>
</body>