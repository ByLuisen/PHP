<?php
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Inicio de sesión');

myMenu();
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row my-5">
        <div class="d-flex flex-wrap justify-content-center mb-5">
            <img src="../images/jugadores/157188pre7473.jpg
" alt='Mike Tobey'>
            <p>Mike Tobey</p>
        </div>
    </div>
</div>
</body>