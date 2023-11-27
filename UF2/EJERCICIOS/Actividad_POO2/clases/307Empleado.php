<?php

namespace Ejercicio307;

class Empleado extends Persona
{
    private static $sueldoTope = 3333;
    private array $telefonos = [];
    private float $sueldo;

    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000)
    {
        parent::__construct($nombre, $apellidos);
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
        return $this->sueldo > self::$sueldoTope;
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

    public static function toHtml(Empleado $emp): string
    {
        $html = '<p>';
        $html .= 'Nombre: ' . $emp->getNombreCompleto() . '<br>';
        $html .= 'Sueldo: ' . $emp->getSueldo() . '<br>';

        // Mostrar teléfonos en una lista ordenada
        $telefonos = $emp->getTelefonos();
        if (!empty($telefonos)) {
            $html .= 'Teléfonos:';
            $html .= '<ol>';
            foreach ($telefonos as $telefono) {
                $html .= '<li>' . $telefono . '</li>';
            }
            $html .= '</ol>';
        }

        $html .= '</p>';
        return $html;
    }

    public function __toString()
    {
        return "Nombre: " . $this->nombre . " " . $this->apellidos
            . " Sueldo: " . $this->sueldo . ".<br>";
    }
}
