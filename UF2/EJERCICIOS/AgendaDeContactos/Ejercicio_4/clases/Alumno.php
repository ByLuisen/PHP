<?php

require_once('Contacto.php');
require_once('Profesor.php');

class Alumno extends Contacto
{
    private $curso;
    private $asignaturas = [];

    public function __construct($nombre, $apellidos, $fechaNacimiento, $email, $curso)
    {
        parent::__construct($nombre, $apellidos, $fechaNacimiento, $email);
        $this->curso = $curso;
    }

    public function setAsignaturas($asignaturas)
    {
        $this->asignaturas = $asignaturas;
    }

    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    public function tieneAsignatura($asignatura)
    {
        return in_array($asignatura, $this->asignaturas);
    }

    public function getProfesorAsignatura($asignatura, array $profesores)
    {
        foreach ($profesores as $profesor) {
            if ($asignatura == $profesor->getAsignatura()) {
                return $profesor->getNombre() . " " . $profesor->getApellidos();
            }
        }

        return 'Asignatura sin profesor asignado';
    }
}
