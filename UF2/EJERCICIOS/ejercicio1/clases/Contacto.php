<?php

require_once('../src/functions.php');

class Contacto
{
    //Variables o atributos
    protected $nombre;
    protected $apellidos;
    protected $fechaNacimiento;
    protected $email;

    function __construct($miNombre, $miApellidos, $miFechaNacimiento, $miEmail)
    {
        if ($miEmail == null && calcularEdad($this->getFechaNacimiento() > 17)) {
        }
        if ($miNombre == null || $miApellidos == null || $miFechaNacimiento == null) {
            $this->__destruct();
        } else {
            $this->nombre = $miNombre;
            $this->apellidos = $miApellidos;
            $this->fechaNacimiento = $miFechaNacimiento;
        }
    }

    function __destruct()

    //Funciones o métodos
    function setNombre($miNombre)
    {
        $this->nombre = $miNombre;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setApellidos($miApellidos)
    {
        $this->apellidos = $miApellidos;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }

    function setFechaNacimiento($miFechaNacimiento)
    {
        $this->fechaNacimiento = $miFechaNacimiento;
    }

    function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    function setEmail($miEmail)
    {
        $edad = calcularEdad($this->getFechaNacimiento());

        if ($edad > 17) {
            $this->email = $miEmail;
        } else {
            $this->email = "Menor de edad";
        }
    }

    function getEmail()
    {
        return $this->email;
    }
}
