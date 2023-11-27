<?php

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

    public static function toHtml(Persona $p): string
    {
        $html = parent::toHtml($p); // Llamada al método toHtml de la clase padre

        if ($p instanceof Empleado) {
            $html .= 'Sueldo: ' . $p->getSueldo() . '<br>';

            // Mostrar teléfonos en una lista ordenada
            $telefonos = $p->getTelefonos();
            if (!empty($telefonos)) {
                $html .= 'Teléfonos:';
                $html .= '<ol>';
                foreach ($telefonos as $telefono) {
                    $html .= '<li>' . $telefono . '</li>';
                }
                $html .= '</ol>';
            }

            $html .= '¿Debe pagar impuestos?: ' . ($p->debePagarImpuestos() ? 'Sí' : 'No') . '<br>';
        }

        return $html;
    }

    public function __toString()
    {
        return "Nombre: " . $this->nombre . " " . $this->apellidos
            . " Edad: " . $this->edad . " Sueldo: " . $this->sueldo . ".<br>";
    }
}
