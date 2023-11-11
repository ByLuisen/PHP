<?php

//Función que devuelve un int de un número aleatorio entre el 1 al 6
function obtenerNumeroAleatorio(): int
{
    return mt_rand(1, 6);
}
//Función que devuelve un string con la ruta de una imagen dependiendo del número pasado por parámetro
function obtenerImagenDado(int $num_aleatorio): string
{
    $ruta = "img/" . $num_aleatorio . ".png";
    return $ruta;
}

//Función que genera dados con números aleatorios en un array, pasada la longitud por parámetro
function obtenerDadosAleatorios(int $nDados): array
{
    $dados = [];
    for ($i = 0; $i < $nDados; $i++) {
        array_push($dados, obtenerNumeroAleatorio());
    }
    return $dados;
}

//Iniciar o reanudar la sesión
session_start();

//Iniciar variables de sesión
iniciarVariablesSesion();

//Función que incia todas las variables sesion si no están creadas
function iniciarVariablesSesion()
{
    // Verificar si existe la variable de sesión para almacenar las tiradas del juego
    if (!isset($_SESSION['tiradasJuego'])) {
        $_SESSION['tiradasJuego'] = -1;
    }
    // Verificar si existe la variable de sesión para almacenar la puntuación del jugador 1
    if (!isset($_SESSION['puntosJugador1'])) {
        $_SESSION['puntosJugador1'] = 0;
    }
    // Verificar si existe la variable de sesión para almacenar la puntuación del jugador 2
    if (!isset($_SESSION['puntosJugador2'])) {
        $_SESSION['puntosJugador2'] = 0;
    }
    // Verificar si existe la variable de sesión para almacenar la puntuación del jugador 3
    if (!isset($_SESSION['puntosJugador3'])) {
        $_SESSION['puntosJugador3'] = 0;
    }
}

//Función que reinicia las variables sesion
function reiniciarVariablesSesion()
{
    $_SESSION['tiradasJuego'] = -1;
    $_SESSION['puntosJugador1'] = 0;
    $_SESSION['puntosJugador2'] = 0;
    $_SESSION['puntosJugador3'] = 0;
}
//Función que devuelve un int con el número de tiradas
function contadorDeTiradas(int $tiradasMaximas): int
{
    // Reiniciar el contador de tiradas si las tiradas és igual a las tiradasMaximas
    if ($_SESSION['tiradasJuego'] == $tiradasMaximas) {
        reiniciarVariablesSesion();
    }
    //Incrementar el contador de tiradas
    $_SESSION['tiradasJuego']++;

    return $_SESSION['tiradasJuego'];
}

//Función que suma la puntuación y devuelve un string del ganador de cada ronda
function sumarPuntuacion(array $puntos): string
{
    $mensaje = "";
    if ($_SESSION['tiradasJuego'] != 0) {
        $maxPuntos = max($puntos);
        $ganadores = array_keys($puntos, $maxPuntos);
        $ganadoresNombres = array_map(function ($ganador) {
            $_SESSION['puntosJugador' . ($ganador + 1)]++;
            return "JUGADOR " . ($ganador + 1);
        }, $ganadores);
        $mensaje = decidirGanador($ganadoresNombres, $puntos);
    }
    return $mensaje;
}

//Función que decide el ganador
function decidirGanador(array $ganadoresNombres, array $puntos): string
{
    //Si el número de ganadores es igual a uno significa que solo hay un ganador
    if (count($ganadoresNombres) == 1) {
        $mensaje = 'HA GANADO EL ' . implode(", ", $ganadoresNombres);
    } 
    //Si el número de ganadores es igual a el número de puntuaciones que hay significa que han empatado todos
    elseif (count($ganadoresNombres) == count($puntos)) {
        $mensaje = 'EMPATE';
    } 
    //Si no es ninguno de los casos anteriores significa que hubo algún empate
    else {
        $ultimoGanador = array_pop($ganadoresNombres);
        $mensaje = 'EMPATE ENTRE ' . implode(", ", $ganadoresNombres) . " y " . $ultimoGanador;
    }
    return $mensaje;
}

//Función que devuelve un string diciendo el ganador del juego 
function decidirGanadorJuego(): string
{
    $mensaje = "FIN DEL JUEGO. ";
    $puntosJugadores = [$_SESSION["puntosJugador1"], $_SESSION["puntosJugador2"], $_SESSION["puntosJugador3"]];
    $maxPuntos = max($puntosJugadores);
    $ganadores = array_keys($puntosJugadores, $maxPuntos);
    $ganadoresNombres = array_map(function ($ganador) {
        return "JUGADOR " . ($ganador + 1);
    }, $ganadores);
    $mensaje .= decidirGanador($ganadoresNombres, $puntosJugadores);
    return $mensaje;
}
