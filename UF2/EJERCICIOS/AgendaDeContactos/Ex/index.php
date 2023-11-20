<?php
declare(strict_types=1);

require_once('clases/Contacto.php');
require_once('src/functions.php');

try {
    $contacto1 = new Contacto('Luis', 'Enrique Ledesma', '3/2/2010', '');
    // $contacto2 = new Contacto('Carlos', 'Sastre Dominguez', '5/4/2001', 'carlos54@gmail.com');
    // $contacto3 = new Contacto('Paco', 'Fernandéz Gracia', '7/9/2006', 'paco32@gmail.com');
    
    echo $contacto1;
    // $contactos = [$contacto1, $contacto2, $contacto3];
    
    // usort($contactos, 'compararPorEdad');
    
    // foreach ($contactos as $contacto) {
    //     echo $contacto . "<br>";
    // }
} catch (InvalidArgumentException $e) {
    echo "Error al crear el nuevo contacto: " . $e->getMessage();
} catch (Exception $e) {
    echo "Ocurrió un error inesperado: " . $e->getMessage();
}


