<?php
// Inicia la sesision
session_name('seleccionFutbol');
session_start();

require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $voto = filter_input(INPUT_POST, 'botones', FILTER_SANITIZE_STRING);

    $filename = '../data/recuentoVotos.csv';
    $votos = file($filename, FILE_IGNORE_NEW_LINES); // Lee el archivo de recuento de votos

    if ($voto >= 0 && $voto <= count($votos) - 1) {
        $votos[$voto] = intval($votos[$voto]) + 1; // Incrementa el voto para la línea seleccionada
        file_put_contents($filename, implode("\n", $votos)); // Guarda los votos en el archivo
        
    }
    redirect_to('../votarFraseMotivadora.php');
}
