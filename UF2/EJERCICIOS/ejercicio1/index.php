<?php
require_once('clases/Contacto.php');
$contacto1 = new Contacto('Luis', 'Enrique Ledesma', '3/2/2002', 'luisenric32@gmail.com');
$contacto2 = new Contacto('Carlos', 'Sastre Dominguez', '5/4/2002', 'carlos54@gmail.com');
$contacto3 = new Contacto('Paco', 'Fernandéz Gracia', '7/9/2006', 'paco32@gmail.com');

echo "Nombre: " . $contacto1->getNombre() . "<br>";
echo "Apellidos: " . $contacto1->getApellidos() ."<br>";
echo "Fecha de Nacimiento: " . $contacto1->getFechaNacimiento() . "<br>";
echo "Email: " . $contacto1->getEmail() . "<br>";
echo "<br>";
echo "Nombre: " . $contacto2->getNombre() . "<br>";
echo "Apellidos: " . $contacto2->getApellidos() ."<br>";
echo "Fecha de Nacimiento: " . $contacto2->getFechaNacimiento() . "<br>";
echo "Email: " . $contacto2->getEmail() . "<br>";
echo "<br>";
echo "Nombre: " . $contacto3->getNombre() . "<br>";
echo "Apellidos: " . $contacto3->getApellidos() ."<br>";
echo "Fecha de Nacimiento: " . $contacto3->getFechaNacimiento() . "<br>";
echo "Email: " . $contacto3->getEmail() . "<br>";
