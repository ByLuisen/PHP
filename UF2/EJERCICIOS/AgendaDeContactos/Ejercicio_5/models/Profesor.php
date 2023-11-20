<?php

require_once('Contacto.php');

class Profesor extends Contacto
{
    private $salario;
    private $asignatura;

    public function __construct($nombre, $apellidos, $fechaNacimiento, $email, $salario, $asignatura)
    {
        parent::__construct($nombre, $apellidos, $fechaNacimiento, $email);
        $this->salario = $salario;
        $this->asignatura = $asignatura;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function getAsignatura()
    {
        return $this->asignatura;
    }

    public function ganaMasQue($otroProfesor)
    {
        return $this->salario > $otroProfesor->getSalario();
    }
}
