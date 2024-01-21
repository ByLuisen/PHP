<div class="container">
    <div class="row my-3">
        <div class="text-center">
            <h1>BIENVENIDO A LA SELECCIÓN DE MONTEPINAR</h1>
        </div>
    </div>
    <div class="row my-5">
        <div class="d-flex flex-wrap justify-content-center mb-5">
            <?php
            foreach ($content as $jugador) {
                echo "<div class='mx-2 my-2'>";
                echo "<h2 class='text-center'>{$jugador->getNombre()}</h2>";
                echo "<img src='" . PATH_IMG . "{$jugador->getNombre()}.png' alt='imagen {$jugador->getNombre()}' height='200px' width='200px'>";
                echo "<p class='m-0'><b>País</b> {$jugador->getPais()}</p>";
                echo "<p class='m-0'><b>Dorsal</b> {$jugador->getDorsal()}</p>";
                echo "<p class='m-0'><b>Nacimiento</b> {$jugador->getNacimiento()}</p>";
                echo "<p class='m-0'><b>Edad</b> {$jugador->getEdad()}</p>";
                echo "<p class='m-0'><b>Posición</b> {$jugador->getPosicion()}</p>";
                echo "<p class='m-0'><b>Goles</b> {$jugador->getGoles()}</p>";
                echo "<p class='m-0'><b>Partidos Jugados</b> {$jugador->getPartidos()}</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>