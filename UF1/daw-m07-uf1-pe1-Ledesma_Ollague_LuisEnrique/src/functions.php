<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Fichero general de funciones
 */

require_once "clases/Club.php";
require_once "clases/Jugador.php";

/**
 * Realiza la lectura de un archivo de texto que contiene nombres de equipos de baloncesto y devuelve esos nombres 
 * en un array de objetos Club.
 *
 * El archivo de texto debe contener un equipo por línea. Cada línea se lee y almacena
 * en un array de objetos Club, que se devuelve al final de la función.
 *
 * @return Club[]|false Un array de objetos Club,
 *                      o false si no se puede abrir el archivo.
 */
function obtenerClubs(): array|false
{
    $filename = "data/clubs.txt";
    $clubs = [];

    $f = fopen($filename, 'r');

    if (!$f) {
        return false;
    }

    while (!feof($f)) {
        // Se instancia un objeto Club y se guarda en la variable $club
        $club = new Club(fgets($f));
        // Se almacena el objeto en el array $clubs[]
        $clubs[] = $club;
    }

    fclose($f);
    return $clubs;
}

/**
 * Realiza la laectura de un archivo CSV que contiene los datos de jugadores de baloncesto y devuelve
 * un array de objetos Jugador con los datos de cada jugador.
 * 
 * El archivo CSV contiene los datos de un jugador por línea. Cada línea se lee y almacena 
 * en una array de objetos Jugador, que se devuelve al final de la función.
 * 
 * @return Jugador[]|string Un array de objetos Jugador, 
 *                          o un mensaje de error si no se pudo abrir el archivo.
 */
function obtenerJugadores(): array|string
{
    $filename = "data/lligaACB - lligaACB.csv";
    $jugadores = [];

    // open the file
    $f = fopen($filename, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // Leemos la primera línea para descartarla 
    fgetcsv($f);

    // read each line in CSV file at a time
    while (($row = fgetcsv($f)) !== false) {
        // Por cada línea creamos un objeto Jugador con todos sus datos como parámetro.
        $jugador = new Jugador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
        // Y luego la añadimos al array de objetos Jugador $jugadores[].
        $jugadores[] = $jugador;
    }

    // close the file
    fclose($f);
    return $jugadores;
}

/**
 * Genera un archivo PHP a partir de una plantilla.
 *
 * Esta función genera una archivo PHP donde se listarán en cada archivo jugadores de un club en especifico.
 * Primero se introducira el nombre que tendrá el archivo PHP y posteriormente se llamará a la función strtr 
 * donde en ella se usará la plantilla (templates/generator.php) para estructurar la lista de jugadores de un club. 
 * La palabra clave {{estil}} se usa para la cookie 'estil' y {{contenido}} se utiliza para seleccionar los jugadores
 * del club especificado.
 */
function generarJugadoresClubPHP(): void
{
    file_put_contents("listarValencia.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'VALÈNCIA', '{{contenido}}' => 'VALENCIA BASKET CLUB']));
    file_put_contents("listarRealMadrid.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'MADRID', '{{contenido}}' => 'REAL MADRID']));
    file_put_contents("listarBarça.php", strtr(file_get_contents('templates/generator.php'), ['{{estil}}' => 'BARÇA', '{{contenido}}' => 'BARÇA']));
}

/**
 * Muestar el número de visitas que tienes.
 * 
 */
function contadorVisitas(): void
{
    // Si la variable session 'visitas' no esta establecida se creará con valor 0.
    if (!isset($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 0;
    // Si esta establecida se aumentará una visita más.
    } else {
        $_SESSION['visitas']++;
    }
    // Al final se mostrará el valor de la variable session 'visitas'.
    echo $_SESSION['visitas'];
}

/**
 * Función que recibe dos arrays y devuelve "selected" si $needle está en $haystack, de lo contrario, devuelve una cadena vacía.
 *
 * @param mixed $needle   El valor que se busca en el arreglo.
 * @param array $haystack El arreglo en el que se busca $needle.
 *
 * @return string   "selected" si $needle está en $haystack, de lo contrario, una cadena vacía.
 */
function selected($needle, $haystack): string
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
function checked($needle, $haystack): string
{
    if ($haystack) {
        return in_array($needle, $haystack) ? 'checked' : '';
    }

    return '';
}

/**
 * Función que recibe un string y redirige la página al string recibido.
 * 
 * @param string $url String donde se redireccionara.
 */
function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

/**
 * Función que recibe un string y un array. Convertirá cada valor del array en una variable session
 * y al final redireccionara la página al string pasado por parámetro.
 * 
 * @param string $url   String donde se redireccionara la página.
 * @param array  $items Array con el cual se convertirá cada valor en una variable session.
 */
function redirect_with(string $url, array $items): void
{
    // Se recorre el array 
    foreach ($items as $key => $value) {
        // Creando una variable session como nombre la $key del array y como valor el $value del array.
        $_SESSION[$key] = $value;
    }
    // Y al final se redirecciona a la $url.
    redirect_to($url);
}

/**
 * Función que elimina unas variables session en específico.
 */
function eliminarVariablesSession(): void
{
    unset($_SESSION['inputs']);
    unset($_SESSION['errors']);
    unset($_SESSION['selected_partido']);
    unset($_SESSION['selected_zona']);
    unset($_SESSION['selected_entradas']);
}
