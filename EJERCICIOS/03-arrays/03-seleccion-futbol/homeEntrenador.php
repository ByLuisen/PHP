<?php

declare(strict_types=1);
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');

// Mostrar head
myHead('Home entrenadores');
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    myMenuTrainer()
    ?>
</body>