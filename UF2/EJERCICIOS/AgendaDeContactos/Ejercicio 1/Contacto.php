<?php

declare(strict_types=1);
require_once('src/functions.php');

class Contacto
{
    // Variables
    protected $nombre;
    protected $apellidos;
    protected $fechaNacimiento;
    protected $email;

    function __construct($miNombre, $miApellidos, $miFechaNacimiento, $miEmail)
    {
        $this->nombre = $miNombre;
        $this->apellidos = $miApellidos;
        $this->fechaNacimiento = $miFechaNacimiento;
        $this->setEmail($miEmail);
    }

    //Funciones o métodos
    function setNombre($miNombre): void
    {
        $this->nombre = $miNombre;
    }

    function getNombre(): string
    {
        return $this->nombre;
    }

    function setApellidos($miApellidos): void
    {
        $this->apellidos = $miApellidos;
    }

    function getApellidos(): string
    {
        return $this->apellidos;
    }

    function setFechaNacimiento($miFechaNacimiento):void
    {
        $this->fechaNacimiento = $miFechaNacimiento;
    }

    function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }

    function setEmail($miEmail): void
    {
        if ($this->getEdad() > 17) {
            $this->email = $miEmail;
        } else {
            $this->email = "Menor de edad";
        }
    }

    function getEmail(): string
    {
        return $this->email;
    }

    function getEdad(): int
    {
        return calcularEdad($this->getFechaNacimiento());
    }

    function __toString(): string
    {
        return "Nombre: {$this->getNombre()} <br>
        Apellidos: {$this->getApellidos()} <br>
        Fecha de Nacimeinto: {$this->getFechaNacimiento()} <br>
        Email: {$this->getEmail()} <br>";
    }
}
