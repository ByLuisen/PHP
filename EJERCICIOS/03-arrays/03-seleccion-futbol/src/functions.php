<?php
//Función para mostrar la selección a partir de un array
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

// Función para calcular la edad a partir de la fecha de nacimiento en formato "dd/mm/aaaa"
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
 * Función que almacena en un string el contenido de una carta
 * @param array $cartas             Array con cartas 
 * @return string                   Devuelve un string del contenido de las cartas
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

//Función que genera un html con el contenido de las cartas como main
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

//Función que genera archivos HTML para cada carta
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

//Función que genera un indice HTML para los enlaces de cada carta HTML
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
 * Función para listar el contenido de entrenadores csv
 */

function listarCsv(string $nombre_archivo)
{

    if (($gestor = fopen($nombre_archivo, 'r')) !== false) {
        while (($fila = fgetcsv($gestor)) !== false) {
            foreach ($fila as $valor) {
                echo $valor . ", "; // Imprime cada valor seguido de una coma y espacio
            }
            echo "<br>"; // Salto de línea para separar las filas
        }
        fclose($gestor);
    } else {
        echo "No se pudo abrir el archivo.";
    }
}
