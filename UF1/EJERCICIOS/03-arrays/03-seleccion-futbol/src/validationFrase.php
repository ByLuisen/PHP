<?php
session_name('seleccionFutbol');
session_start();
require_once('functions.php');
require_once('functions-validation.php');

/**
 * Array de inputs y errores
 */
$inputFrase = [];
$errorsFrase = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**
     * Saniza y valida los imputs
     */
    [$inputFrase, $errorsFrase] = filter($_POST, [
        'frase' => 'string|regex:/^[A-Za-z0-9\s]+$/'
    ]);

    /**
     *  Si hay errores redirige a frasesMotivadoras.php
     */
    if ($errorsFrase) {
        redirect_with('../frasesMotivadoras.php', [
            'errorsFrase' => $errorsFrase,
            'inputFrase' => $inputFrase
        ]);
    }
    /**
     * Si la frase no está vacía se añade al archivo: frasesMotivadoras.txt
     */
    if (!empty($inputFrase['frase'])) {
        $archivo = '../data/frasesMotivadoras.txt'; // Nombre del archivo donde se almacenarán las frases
        $frase = $inputFrase['frase'] . PHP_EOL; // Añade un salto de línea al final de la frase

        file_put_contents($archivo, $frase, FILE_APPEND | LOCK_EX); // Agrega la frase al archivo
        inicializarVotoFrase();
    }

    redirect_with('../frasesMotivadoras.php', [
        'errorsFrase' => $errorsFrase
    ]);
}
