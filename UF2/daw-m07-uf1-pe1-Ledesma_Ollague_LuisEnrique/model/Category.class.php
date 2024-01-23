<?php
/**
 * Clase Category
 * @author Luis Enrique
 */
class Category
{
    // Atributos de la clase
    private $id;
    private $nameCategory;


    // Constructor
    public function __construct($id = NULL, $nameCategory = NULL)
    {
        $this->id = $id;
        $this->nameCategory = $nameCategory;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNameCategory()
    {
        return $this->nameCategory;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNameCategory($nameCategory)
    {
        $this->nameCategory = $nameCategory;
    }
    /**
     * Devuelve una cadena de texto que representa los atributos del entrenador en un formato específico.
     * El formato de la cadena es: "nombre;ciudad;fechaNacimiento;anyosDeEntrenador;nivelLiderazgo;"
     *
     * @return string La cadena formateada con los atributos del entrenador.
     */
    public function writingNewLine()
    {
        return "\n$this->id;$this->nameCategory;";
    }
}
