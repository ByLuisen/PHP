<?php

class User
{
    // Atributos de la clase
    private $usuario;
    private $contrasena;


    // Constructor
    public function __construct($usuario = NULL, $contrasena = NULL)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    // Getters
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    /**
     * Devuelve una cadena de texto que representa los atributos del entrenador en un formato específico.
     * El formato de la cadena es: "nombre;ciudad;fechaNacimiento;anyosDeEntrenador;nivelLiderazgo;"
     *
     * @return string La cadena formateada con los atributos del entrenador.
     */
    public function writingNewLine()
    {
        return "\n$this->usuario;$this->contrasena;";
    }
}
