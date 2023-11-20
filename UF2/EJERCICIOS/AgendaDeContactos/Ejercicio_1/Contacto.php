<?php

declare(strict_types=1);
require_once('src/functions.php');

class Contacto
{
    // Atributos
    protected $nombre;
    protected $apellidos;
    protected $fechaNacimiento;
    protected $email;

    /**
     * Constructor de la clase.
     * 
     * @param string $miNombre           El nombre del objeto.
     * @param string $miApellidos        Los apellidos del objeto.
     * @param string $miFechaNacimiento  La fecha de nacimiento del objeto.
     * @param string $miEmail            El correo electrónico del objeto.
     */
    function __construct($miNombre, $miApellidos, $miFechaNacimiento, $miEmail)
    {
        $this->nombre = $miNombre;
        $this->apellidos = $miApellidos;
        $this->fechaNacimiento = $miFechaNacimiento;
        $this->setEmail($miEmail);
    }

    /**
     * Establece el nombre del objeto.
     * 
     * @param string $miNombre El nuevo nombre a asignar al objeto.
     */
    function setNombre(string $miNombre): void
    {
        $this->nombre = $miNombre;
    }

    /**
     * Obtiene el nombre del objeto.
     * 
     * @return string El nombre del objeto.
     */
    function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Establece los apellidos del objeto.
     * 
     * @param string $miApellidos El nuevo apellido a asignar al objeto.
     */
    function setApellidos(string $miApellidos): void
    {
        $this->apellidos = $miApellidos;
    }

    /**
     * Obtiene los apellidos del objeto.
     * 
     * @return string Los apellidos del objeto.
     */
    function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * Establece la fecha de nacimiento del objeto.
     * 
     * @param string $miFechaNacimiento La nueva fecha a asignar al objeto.
     */
    function setFechaNacimiento(string $miFechaNacimiento): void
    {
        $this->fechaNacimiento = $miFechaNacimiento;
    }

    /**
     * Obtiene la fecha de nacimiento del objeto.
     * 
     * @return string La fecha de nacimiento del objeto.
     */
    function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }

    /**
     * Establece el email del objeto.
     * 
     * @param string $miEmail El nuevo email a asignar al objeto.
     */
    function setEmail(string $miEmail): void
    {
        if ($this->getEdad() > 17) {
            $this->email = $miEmail;
        } else {
            $this->email = "Menor de edad";
        }
    }

    /**
     * Obtiene el email del objeto.
     * 
     * @return string El email del objeto.
     */
    function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Obtiene la edad del objeto.
     * 
     * @return int La edad del objeto.
     */
    function getEdad(): int
    {
        // Devuelve la edad del objeto llamando a una función que calcula la edad.
        return calcularEdad($this->getFechaNacimiento());
    }

    /**
     * Convierte el objeto a una representación de cadena.
     *  
     * @return string Representación en cadena del objeto.
     */
    function __toString(): string
    {
        return "Nombre: {$this->getNombre()} <br>
        Apellidos: {$this->getApellidos()} <br>
        Fecha de Nacimeinto: {$this->getFechaNacimiento()} <br>
        Email: {$this->getEmail()} <br>";
    }
}
