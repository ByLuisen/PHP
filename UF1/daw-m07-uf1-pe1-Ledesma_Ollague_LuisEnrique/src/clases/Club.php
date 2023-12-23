<?php

class Club
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
