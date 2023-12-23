<?php

class Club
{
    private string $nombre;

    /**
     * Constructor de la clase Club.
     * 
     * @param string $nombre El nombre del club.
     */
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el nombre de la clase.
     * 
     * @return string El nombre de la clase.
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }
}
