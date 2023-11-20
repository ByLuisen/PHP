<?php

require_once('Contacto.php');

class Personal extends Contacto
{
    private $salario;

    public function __construct($nombre, $apellidos, $fechaNacimiento, $email, $salario)
    {
        parent::__construct($nombre, $apellidos, $fechaNacimiento, $email);
        $this->salario = $salario;
    }

    public function getSalario()
    {
        return $this->salario;
    }
}
