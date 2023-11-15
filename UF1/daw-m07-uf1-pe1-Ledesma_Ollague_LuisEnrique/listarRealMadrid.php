<?php
session_name('LLigaBasquet');
session_start();
setcookie('estil', 'white', time() + (86400 * 30), "/"); // Cookie válida por 30 días
require_once('src/functions-structure.php');
require_once('src/functions.php');
myHead('Inicio de sesión');

myMenu();
contadorVisitas();
?>

<body style="background-color:<?php echo $_COOKIE["estil"] ?>;">
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
                        // Obtener frases y votos utilizando votacionDinamica
                        $jugadores = (obtenerDataEnArray('lligaACB - lligaACB.csv'));
                        // Iterar sobre las frases y votos
                        for ($i = 1; $i < count($jugadores); $i++) {
                            $fila = explode(',', $jugadores[$i]);
                            if ($fila[2] == 'REAL MADRID') {
                                file_put_contents("jugadores/" . explode(' ',$fila[0])[0] . ".php", strtr(file_get_contents('templates/jugadorFoto.php'), ['{{nombre}}' => "$fila[0]" , '{{foto}}' => "$fila[10]"]));

                                    echo "<tr>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[0]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[3]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[4]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[5]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[6]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[8]}</a></td>";
                                        echo "<td><a href='jugadores/".explode(' ',$fila[0])[0].".php'>{$fila[9]}</a></td>";
                                    echo "</tr>";
                                ?>
                                
                                <?php
                            };
                        }
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
</body>