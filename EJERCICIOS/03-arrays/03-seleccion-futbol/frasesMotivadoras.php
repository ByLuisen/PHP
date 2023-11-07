<?php

declare(strict_types=1);
session_name('seleccionFutbol');
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('src/functions-login.php');
require_once('data/data.php');

require_login(); // Función que establece necesario loguearse
myHead('Frases motivadoras');

if (isset($_SESSION['inputsFrase'])) {
    $inputsFrase = $_SESSION['inputsFrase'];
}
if (isset($_SESSION['errorsFrase'])) {
    $errorsFrase = $_SESSION['errorsFrase'];
}
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    myMenuTrainer();
    ?>

    <div class="container">
        <div class="p-4">
            <?php
            listarTxt();
            ?>
            <?php if (isset($errorsFrase['frase'])) : ?>
                <div class="alert alert-danger">
                    <?= $errorsFrase['frase'] ?>
                </div>
            <?php endif ?>
            <form action="src/validationFrase.php" method="post">
                <div class="mt-3">
                    <input type="text" id="frase" name="frase" class="form-control form-control-lg" value="<?php echo $inputsFrase['frase'] ?? '' ?>" placeholder="Añade una frase" />
                    <button class="btn btn-outline-light btn-success btn-lg px-5 mt-3" type="submit">Añadir frase</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    myFooter(); ?>

</body>