<?php

/**
 * Muestra la información de una selección de jugadores en formato HTML.
 *
 * Esta función toma un array asociativo que representa una selección de jugadores, donde cada clave es el nombre
 * de un jugador y el valor es otro array asociativo con información adicional sobre el jugador. La función itera sobre
 * este array y genera contenido HTML que muestra el nombre del jugador, una imagen asociada, y la información adicional
 * del jugador, incluyendo su fecha de nacimiento y edad calculada utilizando la función `calcularEdad`.
 *
 * @param array $array Un array asociativo que representa una selección de jugadores.
 * @return void
 */
function mostrarSeleccion(array $array): void
{
    foreach ($array as $key => $value) {
        echo "<div class='mx-2 my-2'>";
        echo "<h2 class='text-center'>{$key}</h2>";
        echo "<img src='img/{$key}.png' alt='imagen {$key}' height='200px' width='200px'>";
        foreach ($value as $key => $value) {
            echo "<p class='m-0'><b>{$key}</b> {$value}</p>";
            if ($key == 'Nacimiento') {
                echo "<p class='m-0'>(" . calcularEdad($value) . " años)</p>";
            }
        }
        echo "</div>";
    }
}

/**
 * Calcula la edad a partir de una fecha de nacimiento.
 *
 * Esta función toma una fecha de nacimiento en el formato 'd/m/Y', la convierte en un objeto DateTime,
 * obtiene la fecha actual, calcula la diferencia en años y devuelve la edad obtenida.
 *
 * @param string $fecha_nacimiento La fecha de nacimiento en formato 'd/m/Y'.
 * @return int La edad calculada.
 */
function calcularEdad($fecha_nacimiento): int
{
    // Convertir la fecha de nacimiento a un objeto DateTime
    $fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $fecha_nacimiento);

    // Obtener la fecha actual
    $fecha_actual = new DateTime();

    // Calcular la diferencia en años
    $diferencia = $fecha_actual->diff($fecha_nacimiento);
    $edad = $diferencia->y;
    //Devolver la edad obtenida
    return $edad;
}

/** Función que genera una plantilla para una carta y la devuelve
 * @param  bool  $pre        False por defecto para generar una plantilla sin 
 *                           etiquetas <pre>, true para generarla con etiquetas <pre>
 * @return string            Devuelve un herecode de la plantilla seleccionada
 */
function generarPlantillaCarta(bool $pre = false): string
{
    $plantillaCarta = "";
    if ($pre) {
        $plantillaCarta = <<<TEMPLATE
        <pre>Dear {{name}},</pre>
        <pre>Congratulations! You has been selected to be part of the Spanish national football team.</pre>
        <pre>I wish you the best!</pre>
        TEMPLATE;
    } else {
        $plantillaCarta = <<<TEMPLATE
        Dear {{name}},
        Congratulations! You has been selected to be part of the Spanish national football team.
        I wish you the best!
        TEMPLATE;
    }

    return $plantillaCarta;
}

/**
 * Función que genera cartas y lo devuelve en un array associativo
 *
 * @param  string $plantillaCarta  Plantilla que se utilizara para crear las cartas
 * @param  array  $nombres         Array de nombres para usarse en las plantillas
 * @return array                   Devuelve array associativo de nombre como $key y 
 *                                 carta como $value
 */
function generarCartas(string $plantillaCarta, array $nombres): array
{
    //Array para almacenar los nombres y las cartas
    $cartas = [];
    //Recorremos el array de los nombres
    foreach ($nombres as $nombre) {
        /* Añadimos al array $cartas el nombre como $key y la plantilla con el 
        {{name}} substituido por $nombre como $value  */
        $cartas[$nombre] = strtr($plantillaCarta, ['{{name}}' => $nombre]);
    }
    //Devolvemos el array con todos los nombres y las cartas añadidas
    return $cartas;
}

/** Función para generar los archivos en una ruta específica mediante un array pasado 
 * por parámetro que contiene el nombre y la carta del jugador 
 * @param  array $cartas          Array associativo que contiene como key el nombre y como value la carta del jugador
 * @return int|false              Devuelve un int si todo ha salido bien, o false si hubo un fallo
 */
function generarFicheros(array $cartas): bool
{
    foreach ($cartas as $nombre => $carta) {
        // Esciribmos la ruta y el nombre que tendrá el archivo
        $ruta = 'ficheros/' . $nombre . ".txt";

        // Crear el directorio si no existe
        if (!file_exists('ficheros')) {
            mkdir('ficheros', 0777, true);
        }
        //Añadimos la carta del jugador en la ruta establecida
        $flag = file_put_contents($ruta, $carta);
    }
    return $flag;
}

/**
 * Función que almacena en un string el contenido de una carta.
 *
 * @param array $cartas Un array asociativo donde las claves son los nombres de los jugadores y los valores son el contenido de sus cartas.
 * @return string Devuelve un string que contiene el contenido de todas las cartas concatenadas.
 */
function obtenerContenidoCartas(array $cartas): string
{
    $contenido = "";
    //Recorremos el array de las cartas
    foreach ($cartas as $nombre => $carta) {
        //Almacenamos el contenido de cada carta concatenandolo en la variable $contenido
        $contenido .= $carta . "<hr>";
    }
    return $contenido;
}

/**
 * Genera un archivo HTML de vista principal a partir de un array de cartas de jugador.
 *
 * Esta función toma un array de cartas de jugadores como parámetro y crea un archivo HTML de vista principal
 * llamado 'index.view.html'. Se establece un título en el contenido del HTML, se concatenan las cartas obtenidas
 * a través de la función `obtenerContenidoCartas`, y se utiliza una plantilla HTML para generar el contenido final.
 * El archivo HTML se crea utilizando el contenido modificado de la plantilla.
 *
 * @param array $cartas Un array asociativo donde las claves son los nombres de los jugadores y los valores son el contenido de sus cartas.
 * @return void
 */
function generarVistaHTML(array $cartas): void
{
    //Establecemos la ruta/nombre del archivo
    $nombre_archivo = 'index.view.html';
    //Determinamos el titulo de este HTML
    $contenidoCartas = "<h1 class='text-center mb-4'>EJERCICIO 3</h1>";
    //Concatenamos el contenido de las cartas obtenidas en la función
    $contenidoCartas .= obtenerContenidoCartas($cartas);
    //Obtenemos una plantilla HTML y le substituimos el contenido por nuestro contenido
    $contenido = strtr(file_get_contents('templates/indexTemplate.view.html'), ['{{contenido}}' => $contenidoCartas]);
    //Creamos el archivo HTML con el contenido cambiado de la plantilla
    file_put_contents($nombre_archivo, $contenido);
}

/**
 * Genera archivos HTML individuales para cada carta de jugador a partir de un array de cartas.
 *
 * Esta función toma un array de cartas de jugadores como parámetro y crea archivos HTML individuales
 * para cada carta en el directorio 'players'. Si el directorio no existe, lo crea. Luego, recorre el array
 * de cartas, establece la ruta y el nombre del archivo para cada carta, y crea el archivo utilizando una plantilla
 * HTML. La plantilla HTML utiliza la etiqueta {{contenido}} para incluir el contenido específico de cada carta.
 *
 * @param array $cartas Un array asociativo donde las claves son los nombres de los jugadores y los valores son el contenido de sus cartas.
 * @return void
 */

function generarHTMLS(array $cartas): void
{
    // Crear el directorio si no existe
    if (!file_exists('players')) {
        mkdir('players', 0777, true);
    }
    //Recorer el array de cartas
    foreach ($cartas as $nombre => $carta) {
        //Establecer la ruta y el nombre del archivo
        $ruta = 'players/' . $nombre . ".html";
        //Crear el archivo usando una plantilla substituyendo el contenido por la carta
        file_put_contents($ruta, strtr(file_get_contents('templates/letterTemplate.view.html'), ['{{contenido}}' => $carta]));
    }
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
function generarIndexHTML(array $nombres): void
{
    //Plantilla de etiqueta li 
    $plantilla_li = <<<TEMPLATE
    <li>
        <a href="players/{{name}}.html">{{name}}</a>
    </li>
    TEMPLATE;
    //Titulo del indice guardado en la variable $contenido
    $contenido = "<h2 class='p-0'>Cartas de jugadores</h2>";
    //Concatenar la etiqueta de apertura <ul> 
    $contenido .= '<ul class="navbar-nav">';
    //Recorrer el array de nombres
    foreach ($nombres as $nombre) {
        //Concatenar en la variable $contenido la plantilla li substituyendo el {{name}} por $nombre
        $contenido .= strtr($plantilla_li, ['{{name}}' => $nombre]);
    }
    //Concatenar la etiqueta de cierre </ul> 
    $contenido .= '</ul>';
    //Generamos el archivo index.html usando una plantilla indexTemplate.view.html subtituyendo el contenido por el nuestro 
    file_put_contents("index.html", strtr(file_get_contents('templates/indexTemplate.view.html'), ['{{contenido}}' => $contenido]));
}



/**
 * Lee un archivo CSV y muestra sus contenidos en el formato: 
 * "n- valor1, valor2, ..., valorN" donde "n" es el número de fila.
 *
 * Esta función toma el nombre de un archivo CSV como parámetro, lo abre en modo lectura,
 * lee cada fila del archivo utilizando la función fgetcsv, y muestra cada valor en la fila
 * seguido de una coma y un espacio. El número de fila se imprime antes de los valores.
 *
 * @param string $nombre_archivo El nombre del archivo CSV que se va a listar.
 * @return void
 */
function listarCsv(string $nombre_archivo)
{
    $contador = 0;

    // Intenta abrir el archivo en modo lectura
    if (($gestor = fopen($nombre_archivo, 'r')) !== false) {
        while (($fila = fgetcsv($gestor)) !== false) {
            $contador++;
            echo $contador . "- ";

            // Itera sobre cada valor en la fila
            foreach ($fila as $valor) {
                echo $valor . ", "; // Imprime cada valor seguido de una coma y espacio
            }
            echo "<br>"; // Salto de línea para separar las filas
        }
        // Cierra el archivo después de la lectura
        fclose($gestor);
    } else {
        // Mensaje si no se pudo abrir el archivo
        echo "No se pudo abrir el archivo.";
    }
}

/**
 * Lee un archivo de texto que contiene frases motivadoras y muestra cada frase numerada en el formato "1. Frase".
 *
 * Esta función abre el archivo especificado en modo lectura, lee cada línea del archivo,
 * elimina espacios en blanco innecesarios, y muestra las frases numeradas en el formato
 * "1. Frase" en el navegador. El contador se incrementa con cada frase no vacía.
 *
 * @return void
 */
function listarTxt()
{
    $filename = 'data/frasesMotivadoras.txt';
    $f = fopen($filename, 'r');
    $contador = 1; // Iniciamos el contador a 1

    if ($f) {
        while (!feof($f)) { // feof: verifica si hemos llegado al final
            $line = fgets($f); // Lee una linea del archivo
            $line = trim($line); // Eliminamos espacios en blanco innecesarios

            if (!empty($line)) { // Verificamos si la línea no está vacía
                echo $contador . '. ' . nl2br($line) . '<br>'; // Imprimir el contador, la línea y un salto de línea
                $contador++; // Incrementa el contador en 1
            }
        }
        fclose($f);
    }
}

/**
 * Redirige el flujo de ejecución a la URL especificada.
 *
 * Esta función utiliza el encabezado HTTP "Location" para redirigir el navegador del usuario a la URL proporcionada.
 * Después de enviar el encabezado de redirección, la función finaliza la ejecución del script utilizando la función exit().
 *
 * @param string $url La URL a la que se debe redirigir.
 * @return void
 */
function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

/**
 * Almacena datos en la sesión y redirige a una nueva página.
 *
 * Esta función toma una URL y un array de items, luego establece cada par clave-valor
 * del array en la superglobal $_SESSION. Después, redirige a la URL especificada utilizando
 * una función llamada redirect_to.
 *
 * @param string $url   La URL a la que se redirigirá.
 * @param array  $items Un array asociativo de datos a almacenar en la sesión.
 *                      Las claves del array se utilizan como nombres de variables de sesión,
 *                      y los valores asociados se almacenan en esas variables.
 * @return void
 */
function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}
/**
 * Función que se utiliza para añadir un texto proporcionado como argumento al final del archivo
 * 'frasesMotivadoras.txt'. Si el archivo no existe lo crea.
 * Proporciona manejo de errores y mensajes de éxito para informar sobre la operación.
 */
function añadirTexto($textoAñadir)
{
    // Nombre del archivo de texto
    $archivo = '../data/frasesMotivadoras.txt';

    // Abre el archivo en modo de escritura (si no existe, lo crea; si existe, añade al final)
    if ($gestor = fopen($archivo, 'a')) {
        // Escribe el string en el archivo
        if (fwrite($gestor, $textoAñadir . PHP_EOL) === false) {
            echo "No se pudo escribir en el archivo.";
        } else {
            echo "Se ha añadido el texto al archivo.";
        }
        // Cierra el archivo
        fclose($gestor);
    } else {
        echo "No se pudo abrir el archivo.";
    }
}

/**
 * Función que crea o abre el archivo 'recuentoVotos.csv' y escribe
 * una fila de datos con el valor 0 en el archivo.
 * Si se llama múltiples veces, agregará filas adicionales al archivo, sin
 * borrar el contenido anterior.
 */
function inicializarVotoFrase()
{
    $filename = '../data/recuentoVotos.csv';
    $votos = file($filename, FILE_IGNORE_NEW_LINES); // Lee el archivo de recuento de votos

    array_push($votos, 0); // Incrementa el voto para la línea seleccionada
    file_put_contents($filename, implode("\n", $votos)); // Guarda los votos en el archivo
}



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
function votacionDinamica($filename)
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
