<?php

namespace Ejercicio311;

class Empleado extends Persona
{
    private static $sueldoTope = 3333;
    private array $telefonos = [];
    private float $sueldo;

    public function __construct(string $nombre, string $apellidos, int $edad, float $sueldo = 1000)
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldo = $sueldo;
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public function getSueldoTope(): float
    {
        return self::$sueldoTope;
    }

    public function setSueldoTope(float $nuevoSueldoTope): void
    {
        self::$sueldoTope = $nuevoSueldoTope;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->getEdad() > 21 && $this->sueldo > self::$sueldoTope;
    }

    public function anyadirTelefono(string $telefono): void
    {
        array_push($this->telefonos, $telefono);
    }

    public function listarTelefonos(): string
    {
        $telefonosSeparados = implode(', ', $this->telefonos);
        return $telefonosSeparados;
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }

    public function getTelefonos(): array
    {
        return $this->telefonos;
    }

    public function toHtml(): string
    {
        $html = '<p>';
        $html .= 'Nombre: ' . $this->getNombreCompleto() . '<br>';
        $html .= 'Edad: ' . $this->getEdad() . '<br>';
        $html .= '</p>';
        return $html;
    }

    public function __toString(): string
    {
        return parent::__toString() . " Sueldo: " . $this->sueldo . ".<br>";
    }
}
