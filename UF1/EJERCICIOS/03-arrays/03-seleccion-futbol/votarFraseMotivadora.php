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
                <h1>Votar frase motivadora</h1>
            </div>
        </div>
        <div class="row my-5">
            <div>
                <form action="src/votarFrase.php" method="post">
                    <ul>
                        <?php
                        $contador = 0;
                        foreach (votacionDinamica('frasesMotivadoras.txt') as $frase) : ?>
                            <li class="d-flex mb-2 align-items-center justify-content-center">
                                <p style="width: 30px;"><?php echo $contador + 1 . "-" ?></p>
                                <p class="w-75 me-5"><?php echo $frase ?></p>
                                <button type="submit" name="botones" value="<?php echo $contador ?>" class="btn" style="background-color: #ADFF2F;">Votar</button>
                            </li>
                        <?php
                            $contador++;
                        endforeach
                        ?>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <?php
    myFooter();
    ?>
</body>