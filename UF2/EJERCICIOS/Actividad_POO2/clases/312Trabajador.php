<?php

namespace Ejercicio312;

abstract class Trabajador extends Persona
{
    protected array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $edad)
    {
        parent::__construct($nombre, $apellidos, $edad);
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

    abstract public function calcularSueldo(): float;

    public function __toString(): string {
        return parent::__toString();
    }
}
