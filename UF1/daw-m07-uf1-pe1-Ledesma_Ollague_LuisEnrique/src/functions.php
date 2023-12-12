<?php

/**
 * Luis Enrique Ledesma Ollague
 * Este fichero contiene las funcinonalidades que se llamaran al index
 */

/**
 * Realiza la lectura de un archivo de texto que contiene frases motivadoras y devuelve
 * esas frases en un array.
 *
 * El archivo de texto debe contener una frase por línea. Cada línea se lee y almacena
 * en un array, que se devuelve al final de la función.
 *
 * @return array|false Un array que contiene las frases motivadoras leídas del archivo,
 *                     o false si no se puede abrir el archivo.
 */
function obtenerDataEnArray($filename)
{
    $filename = "data/{$filename}";
    $lines = [];

    $f = fopen($filename, 'r');

    if (!$f) {
        return;
    }

    while (!feof($f)) {
        $lines[] = fgets($f);
    }

    fclose($f);
    return $lines;
}

function readCSV($filename)
{
    $filename = "data/{$filename}.csv";
    $data = [];

    // open the file
    $f = fopen($filename, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
    }

    // close the file
    fclose($f);
    return $data;
}

/**
 * Genera un archivo HTML de índice a partir de un array de nombres de jugadores.
 *
 * Esta función toma un array de nombres de jugadores como parámetro y utiliza una plantilla HTML
 * para crear un archivo index.html que contiene enlaces a las páginas individuales de cada jugador.
 * La plantilla HTML utiliza la etiqueta <ul> para crear una lista no ordenada de enlaces <li> a cada
 * jugador. El contenido de la plantilla se almacena en el archivo index.html.
 *
 * @param array $nombres Un array de nombres de jugadores.
 * @return void
 */
function generarJugadoresClubPHP(): void
{
    file_put_contents("listarValencia.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'VALÈNCIA', '{{contenido}}' => 'VALENCIA BASKET CLUB']));
    file_put_contents("listarRealMadrid.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'MADRID', '{{contenido}}' => 'REAL MADRID']));
    file_put_contents("listarBarça.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'BARÇA', '{{contenido}}' => 'BARÇA']));
}

function contadorVisitas()
{
    if (!isset($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 0;
    } else {
        $_SESSION['visitas']++;
    }
    echo $_SESSION['visitas'];
}

/**
 * Función que recibe dos arrays
 */
function selected($needle, $haystack)
{
    if ($haystack) {
        return in_array($needle, $haystack) ? 'selected' : '';
    }

    return '';
}

/**
 * Función que recibe dos arrays y devuelve "checked" si $needle está en $haystack, de lo contrario, devuelve una cadena vacía.
 *
 * @param mixed $needle   El valor que se busca en el arreglo.
 * @param array $haystack El arreglo en el que se busca $needle.
 *
 * @return string   "checked" si $needle está en $haystack, de lo contrario, una cadena vacía.
 */
function checked($needle, $haystack)
{
    if ($haystack) {
        return in_array($needle, $haystack) ? 'checked' : '';
    }

    return '';
}
