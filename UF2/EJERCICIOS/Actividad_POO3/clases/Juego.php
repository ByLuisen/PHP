<?php

include_once('Soporte.php');

class Juego extends Soporte
{
    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    public function __construct(string $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles(): string
    {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            return "Para un jugador";
        }
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            return "Para {$this->minNumJugadores} jugadores";
        }
        if ($this->minNumJugadores != $this->maxNumJugadores) {
            return "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores";
        }
    }

    public function muestraResumen(): void
    {
        echo "<p style='margin: 0;'>Juego para: {$this->consola}</p>";
        parent::muestraResumen();
        echo "<p style='margin: 0;'>{$this->muestraJugadoresPosibles()}</p>";
    }
}
