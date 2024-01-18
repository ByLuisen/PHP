<?php
session_name('seleccionFutbol');
session_start();
require_once('functions.php');
require_once('functions-validation.php');

/**
 * Array de inputs y errores
 */
$inputs = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**
     * Saniza y valida los imputs
     */
    [$inputs, $errors] = filter($_POST, [
        'frase' => 'string|regex:/^[A-Za-z0-9\s]+$/|required'
    ]);

    /**
     *  Si hay errores redirige a frasesMotivadoras.php
     */
    if ($errors) {
        redirect_with('../frasesMotivadoras.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }
    /**
     * Si la frase no está vacía se añade al archivo: frasesMotivadoras.txt
     */
    if (!empty($inputs['frase'])) {
        $archivo = '../data/frasesMotivadoras.txt'; // Nombre del archivo donde se almacenarán las frases
        $frase = PHP_EOL . $inputs['frase']; // Añade un salto de línea al principio de la frase

        file_put_contents($archivo, $frase, FILE_APPEND | LOCK_EX); // Agrega la frase al archivo
        inicializarVotoFrase();
    }

    redirect_with('../frasesMotivadoras.php', [
        'errors' => $errors
    ]);
}
