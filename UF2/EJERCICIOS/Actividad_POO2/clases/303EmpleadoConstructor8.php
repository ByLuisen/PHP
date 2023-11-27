<?php

class Empleado
{
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

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getSueldo(): string
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > 3333;
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
