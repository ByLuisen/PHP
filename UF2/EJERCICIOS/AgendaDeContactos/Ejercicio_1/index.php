<?php

declare(strict_types=1);
require_once('Contacto.php');
require_once('src/functions.php');

// Creamos los tres contactos
$contacto1 = new Contacto('Luis', 'Enrique Ledesma', '3/2/2002', 'luisen32@gmail.com');
$contacto2 = new Contacto('Carlos', 'Sastre Dominguez', '5/4/2001', 'carlos54@gmail.com');
$contacto3 = new Contacto('Paco', 'Fernandéz Gracia', '7/9/2006', 'paco32@gmail.com');

// Añadimos los contactos a un array
$contactos = [$contacto1, $contacto2, $contacto3];

// Ordenamos el array contactos por edad usando una función que compara edades.
usort($contactos, 'compararPorEdad');

// Mostramos por pantalla los contactos ordenados.
foreach ($contactos as $contacto) {
    echo $contacto . "<br>";
}
