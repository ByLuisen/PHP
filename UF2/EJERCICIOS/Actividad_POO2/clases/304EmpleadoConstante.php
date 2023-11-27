<?php

class Empleado
{
    private const SUELDO_TOPE = 3333;
    private $telefonos = [];

    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo = 1000
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > self::SUELDO_TOPE;
    }

    public function anyadirTelefono(int $telefono): void
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

    public function __toString()
    {
        return "Nombre: " . $this->nombre . " " . $this->apellidos
            . " Sueldo: " . $this->sueldo . ".<br>";
    }
}
