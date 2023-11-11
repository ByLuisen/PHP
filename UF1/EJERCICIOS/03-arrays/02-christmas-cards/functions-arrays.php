<?php

//Función que hace un echo de todas las imagenes de la carpeta img
function mostrarImagenes(): void
{
    for ($i = 0; $i < 20; $i++) {
        echo "<img src='img/" . $i . ".png' alt='imagen " . $i . "' width='150px'>";
    }
}

//Función que añade valores random por el final a un array con una determinada longitud (ambos pasados por parámetro) 
function generarRandomArrayInteger(int $long, array &$array): void
{
    for ($i = 0; $i < $long; $i++) {
        array_push($array, mt_rand(0, 19));
    }
}

//Función que muestra un array indexado generando el HTML de la img
function mostrarArrayIndexado(array $array): void
{
    foreach ($array as $img) {
        echo "<img src='img/" . $img . ".png' alt='imagen " . $img . "' width='150px'>";
    }
}

//Función que imprime un array multidimensional pasado por parámetro
function mostrarArrayMultidimensional(array $array): void
{
    foreach ($array as $key => $value) {
        echo "<div class='mx-2 my-2'>";
        echo "<img src='img/" . $value["archivo"] . "' alt='imagen " . $value["archivo"] . "' width='150px'>";
        foreach ($value as $key => $value) {
            echo "<p class='m-0'>" . $key . " " . $value . "</p>";
        }
        echo "</div>";
    }
}

//Función que añade dependiendo del índice valores par o impar a los arrays $arrayPar, $arraImpar
function generarArrayIndexParImpar(array &$arrayPar, array &$arrayImpar, array $datos): void
{
    for ($i = 0; $i < count($datos); $i++) {
        if ($i % 2 == 0) {
            //Si el índice es par añade los valores al $arrayPar
            array_push($arrayPar, $datos[$i]);
        } else if ($i % 2 != 0) {
            //Si el índice es impar añade valores al $arrayImpar
            array_push($arrayImpar, $datos[$i]);
        }
    }
}

//Función que busca el icono con más o menos likes en funcion del parámetro $minLikes 
function iconosConMaxOMinLikes(array $array, bool $minLikes = false): void
{
    if ($minLikes) {
        // Encuentra el mínimo número de likes
        $likes = min(array_column($array, 'likes'));
    } else {
        // Encuentra el máximo número de likes
        $likes = max(array_column($array, 'likes'));
    }

    //Encuentra todos los iconos con el máximo número de likes
    $iconosConMasLikes = array_filter($array, function ($icono) use ($likes) {
        return $icono['likes'] === $likes;
    });

    //Muestra los iconos con más likes
    mostrarArrayMultidimensional($iconosConMasLikes);
}

//Función que ordena los likes en orden descendente
function ordenarLikesDescendente($a, $b)
{
    return $b['likes'] - $a['likes'];
}

//Función que ordena por TagName
function ordenarPorTagName($a, $b)
{
    $tagA = strtolower($a['tag']);
    $tagB = strtolower($b['tag']);
    return strcmp($tagA, $tagB);
}

/* Función que busca si un tagname($search) pasado por parámetro existe, si existe lo muestra por pantalla,
si no muestra un mensaje de "No existe :(" */
function existeTagName(array $array, string $search): void
{
    //Encuentra todos lo iconos con el nombre buscado
    $iconoBuscado = array_filter($array, function ($icono) use ($search) {
        return $icono['tag'] === $search;
    });

    if (empty($iconoBuscado)) {
        //Imprime "No existe :(" si no ha encontrado ningun icono
        echo "No existe :(";
    } else {
        //Si lo ha encontrado lo imprime por pantalla
        mostrarArrayMultidimensional($iconoBuscado);
    }
}

//Función que asigina un autor de manera aleatoria a cada icono
function asignarAutoresAIconos(array $array, array $autores)
{
    foreach ($array as &$iconos) {
        $iconos["Autor"] = $autores[mt_rand(0, count($autores) - 1)];
    }
    mostrarArrayMultidimensional($array);
}
