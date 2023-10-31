<?php

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

function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}
