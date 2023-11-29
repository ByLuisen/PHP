<?php

class Cliente
{
    public string $nombre;
    private int $numero;
    /** @var Soporte[] */
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados;
    private int $maxAlquilerConcurrente;

    public function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen(): void
    {
        echo "<p>Nombre: {$this->nombre}</p>";
        echo "<p>Soportes alquilados: {$this->numSoportesAlquilados}</p>";
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        if ($this->soportesAlquilados) {
            foreach ($this->soportesAlquilados as $soporte) {
                if ($soporte === $s) {
                    return true;
                }
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s)) {
            echo "<p>El cliente {$this->nombre} ya tiene alquilado el soporte {$s->titulo}</p>";
            return false;
        }

        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "<p>El cliente {$this->nombre} tiene {$this->numSoportesAlquilados} elementos alquilados. 
            No se puede alquilar más en este videoclub hasta que devuelva algo</p>";
            return false;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "<p><strong>Alquilado soporte a: </strong>{$this->nombre}</p>";
        $s->muestraResumen();
        return true;
    }

    public function devolver(int $numSoporte): bool
    {
        if ($this->numSoportesAlquilados == 0) {
            echo "<p>El cliente {$this->nombre} no tiene alquilado ningún soporte</p>";
            return false;
        } elseif ($numSoporte <= $this->numSoportesAlquilados) {
            echo "El soporte {$this->soportesAlquilados[$numSoporte - 1]->titulo} del cliente {$this->nombre} ha sido devuelto";

            unset($this->soportesAlquilados[$numSoporte - 1]);
            $this->soportesAlquilados = array_values($this->soportesAlquilados);

            $this->numSoportesAlquilados--;
            return true;
        }
        echo "<p>No se ha podido encontrar el soporte a devolver con número {$numSoporte} en los alquileres del cliente {$this->nombre}</p>";
        return false;
    }

    public function listarAlquileres(): void
    {
        echo "<p><strong>El cliente {$this->nombre} tiene {$this->numSoportesAlquilados} soportes alquilados:</strong></p>";

        if ($this->soportesAlquilados) {
            foreach ($this->soportesAlquilados as $soporte) {
                $soporte->muestraResumen();
                echo "<br>";
            }
        }
    }
}
