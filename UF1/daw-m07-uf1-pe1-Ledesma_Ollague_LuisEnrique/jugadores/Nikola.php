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
            <img src="../images/jugadores/156430pre7354.jpg
" alt='Nikola Mirotic'>
            <p>Nikola Mirotic</p>
        </div>
    </div>
</div>
</body>