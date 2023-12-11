<?php

/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para listar los jugadores de cada equipo
 */
session_name('LLigaBasquet');
session_start();
setcookie('estil', 'VALÈNCIA', time() + (86400 * 30), "/"); // Cookie válida por 30 días
require_once('src/functions-structure.php');
require_once('src/functions.php');
myHead('VALENCIA BASKET CLUB');

$estil = isset($_COOKIE['estil']) && $_COOKIE['estil'] === 'VALÈNCIA' ? $_COOKIE['estil'] : 'VALÈNCIA';
$colorFondo = '';
$tamanoLetra = '';

// Establecer el estilo en función del valor de la cookie
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

myMenu();
contadorVisitas();
?>

<body style="background-color:<?php echo $colorFondo ?>; font-size: <?php echo $tamanoLetra ?>">
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
                        // Obtener los jugadores
                        $jugadores = (readCSV('lligaACB - lligaACB'));

                        for ($i = 1; $i < count($jugadores); $i++) {
                            if ($jugadores[$i][2] == 'VALENCIA BASKET CLUB') {
                                file_put_contents("jugadores/" . $jugadores[$i][0] . ".php", strtr(file_get_contents('templates/jugadorFoto.php'), ['{{nombre}}' => "{$jugadores[$i][0]}", '{{foto}}' => "{$jugadores[$i][9]}"]));

                                echo "<tr>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][0]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][3]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][4]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][5]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][6]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][7]}</a></td>";
                                echo "<td><a href='jugadores/" . $jugadores[$i][0] . ".php'>{$jugadores[$i][8]}</a></td>";
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