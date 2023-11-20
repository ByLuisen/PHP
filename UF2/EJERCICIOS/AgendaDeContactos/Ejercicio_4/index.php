<?php
require_once('clases/Alumno.php');
require_once('clases/Profesor.php');
require_once('clases/Personal.php');

// Crear un alumno
$alumno = new Alumno('Juan', 'Pérez Pepito', '01/01/2000', 'juan@example.com', '3A');
$alumno->setAsignaturas(['Matemáticas', 'Historia']);

// Crear un profesor
$profesor = new Profesor('Juanjo', 'Guerra Pluma', '01/01/1980', 'profesor@example.com', 50000, 'Matemáticas');

// Crear personal
$personal = new Personal('Coque', 'Recio Matamoros', '01/01/1970', 'personal@example.com', 30000);

// Comprobaciones
echo "El alumno tiene la asignatura 'Matemáticas': " . ($alumno->tieneAsignatura('Matemáticas') ? 'Sí' : 'No') . "<br>";
echo "El alumno tiene la asignatura 'Programación': " . ($alumno->tieneAsignatura('Programación') ? 'Sí' : 'No') . "<br>";
echo "El profesor gana más que el personal: " . ($profesor->ganaMasQue($personal) ? 'Sí' : 'No') . "<br>";
echo "El profesor enseña la asignatura: " . $profesor->getAsignatura() . "<br>";
echo "El alumno puede averiguar quién es su profesor de 'Matemáticas': " . $alumno->getProfesorAsignatura('Matemáticas', [$profesor]) . "<br>";
echo "El alumno puede averiguar quién es su profesor de 'Historia': " . $alumno->getProfesorAsignatura('Historia', [$profesor]) . "<br>";
