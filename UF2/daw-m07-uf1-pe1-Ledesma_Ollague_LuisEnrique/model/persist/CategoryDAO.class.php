<?php
require_once "model/Category.class.php";
require_once "model/persist/DBConnect.class.php";


class CategoryDAO
{
    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {

        // Simulación de conexión a base de datos con ficheros
        $this->dbConnect = new DBConnect("model/resources/categories.csv");
    }
    
    /**
     * Recull totes les products
     * @param void
     * @return vector amb tots els objectes de products
     */
    public function listAll()
    {
        $response = array(); // Genero array vacío
        $linesToFile = array(); // Genero array vacío para almacenar líneas
        $linesToFile = $this->dbConnect->realAllLines(); //Guardo en el array vacío de líneas las líneas del archivo a través de DBConnect
        if (count($linesToFile) > 0) { // Si el array cuenta con mas de 0 líneas...
            foreach ($linesToFile as $line) { // Recorrer el array
                if (!empty($line)) { // Y mientras la linea no esté vacía
                    $category = new Category($line[0], $line[1]); // A la variable categorias, genera un objeto de la clase Categoria.
                    $response[] = $category; // Añado al array de respuestas, la instancia.
                }
            }
        }

        return $response; // Retorna el array de objetos de Categoria
    }
}
