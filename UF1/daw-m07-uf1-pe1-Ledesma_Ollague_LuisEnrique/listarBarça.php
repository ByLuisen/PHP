<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Plantilla para listar los jugadores de cada equipo
 */
session_name('LLigaBasquet');
session_start();
// Establecer la cookie estil
setcookie('estil', 'BARÇA', time() + (86400 * 30), "/"); // Cookie válida por 30 días
require_once('src/functions-structure.php');
require_once('src/functions.php');
myHead('BARÇA');

$estil = isset($_COOKIE['estil']) && $_COOKIE['estil'] === 'BARÇA' ? $_COOKIE['estil'] : 'BARÇA';
$colorFondo = '';
$tamanoLetra = '';

// Establecer el estilo de la página en función del valor de la cookie
switch ($estil) {
    case 'BARÇA':
        $colorFondo = 'blue';
        $tamanoLetra = '20px';
        break;
    case 'MADRID':
        $colorFondo = 'white';
        $tamanoLetra = '30px';
        break;
    case 'VALÈNCIA':
        $colorFondo = 'orange';
        $tamanoLetra = '40px';
        break;
}
?>

<body style="background-color:<?php echo $colorFondo ?>; font-size: <?php echo $tamanoLetra ?>">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: blue; height: 80px">
            <div class="container">
                <ul class="navbar-nav f-flex justify-content-between text-white w-100 mx-5">
                    <li class="nav-item d-flex align-items-end">
                        <a href="index.php" class="text-decoration-none text-white">
                            <p class="lh-1">CLUBES</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-end">
                        <a class="text-decoration-none text-white">
                            <p class="lh-1">LIGA ENDESA</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-end">
                        <a class="text-decoration-none text-white">
                            <p class="lh-1">ACB</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-end">
                        <a class="text-decoration-none text-white">
                            <p class="lh-1">COPA DEL REY</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-end">
                        <a class="text-decoration-none text-white">
                            <p class="lh-1">SUPERCOPA</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-end">
                        <a class="text-decoration-none text-white">
                            <p class="lh-1">ENDESA</p>
                        </a>
                    </li>
                    <!-- Si la cookie estil es igual a 'BARÇA' aparecera la opción 'COMPRAR ENTRADAS' en el menú -->
                    <?php if ($estil == 'BARÇA') : ?>
                        <li class="nav-item d-flex align-items-end">
                            <a href="comprarEntradas.php" class="text-decoration-none text-white">
                                <p class="lh-1">COMPRAR ENTRADAS</p>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <?php
    //Función que muestra las visitas que tienes en la página 
    contadorVisitas();
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="d-flex flex-wrap justify-content-center mb-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope='col'>JUGADORES</th>
                        </tr>
                        <tr>
                            <th scope='col'>JUGADOR</th>
                            <th scope='col'>POSICIÓN</th>
                            <th scope='col'>NACIONALIDAD</th>
                            <th scope='col'>LICENCIA</th>
                            <th scope='col'>ALTURA</th>
                            <th scope='col'>EDAD</th>
                            <th scope='col'>TEMP.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Se llama a la función obtenerJugadores() que te devuelve un array de Jugadores
                        foreach (obtenerJugadores() as $jugador) {
                            // Si el club del jugador es igual al contenido 
                            if ($jugador->getClub() == 'BARÇA') {
                                // Se creara una página con la foto y el nombre del jugador a partir de una plantilla
                                file_put_contents("jugadores/" . $jugador->getNombre() . ".php", strtr(file_get_contents('templates/jugadorFoto.php'), ['{{nombre}}' => "{$jugador->getNombre()}", '{{foto}}' => "{$jugador->getFoto()}"]));

                                // Y se introducirán sus datos en una fila de la tabla
                                echo "<tr>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getNombre()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getPosicion()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getNacionalidad()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getLicencia()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getAltura()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getEdad()}</a></td>";
                                echo "<td><a href='jugadores/" . $jugador->getNombre() . ".php'>{$jugador->getTemp()}</a></td>";
                                echo "</tr>";
                            };
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>