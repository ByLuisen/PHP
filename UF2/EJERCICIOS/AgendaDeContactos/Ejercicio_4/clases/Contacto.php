<?php

require_once('src/functions.php');

class Contacto
{
    //Variables o atributos
    protected $nombre;
    protected $apellidos;
    protected $fechaNacimiento;
    protected $email;

    function __construct($miNombre, $miApellidos, $miFechaNacimiento, $miEmail)
    {
        $this->validarDatos($miNombre, $miApellidos, $miFechaNacimiento, $miEmail);
    }

    private function validarDatos($miNombre, $miApellidos, $miFechaNacimiento, $miEmail)
    {
        if ($miNombre == null || $miApellidos == null || $miFechaNacimiento == null) {
            throw new InvalidArgumentException("Nombre, apellidos y fecha de nacimiento son obligatorios. No se creó el contacto.");
        }
        try {
            $edad = calcularEdad($miFechaNacimiento);
        } catch (Exception $e) {
            throw $e;
        }

        if ($miEmail == null && $edad > 17) {
            throw new InvalidArgumentException("La persona es mayor de edad pero no se proporcionó un correo electrónico. No se creó el contacto.");
        }

        $this->nombre = $miNombre;
        $this->apellidos = $miApellidos;
        $this->fechaNacimiento = $miFechaNacimiento;
        $this->setEmail($miEmail);
    }

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
        if ($this->getEdad() > 17) {
            $this->email = $miEmail;
        } else {
            $this->email = "Menor de edad";
        }
    }

    function getEmail()
    {
        return $this->email;
    }

    function getEdad()
    {
        try {
            return calcularEdad($this->getFechaNacimiento());
        } catch (Exception $e) {
            throw $e;
        }
    }

    function __toString()
    {
        return "Nombre: {$this->getNombre()} <br>
        Apellidos: {$this->getApellidos()} <br>
        Fecha de Nacimeinto: {$this->getFechaNacimiento()} <br>
        Email: {$this->getEmail()} <br>";
    }
}
