<?php
require_once "model/Book.class.php";
require_once "model/persist/DBConnect.class.php";


class BooksDAO
{
    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {

        // Simulación de conexión a base de datos con ficheros
        $this->dbConnect = new DBConnect("model/resources/books.csv");
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
                    $libro = new Book($line[0], $line[1], $line[2], $line[3]
                    , $line[4]); // A la variable categorias, genera un objeto de la clase Categoria.
                    $response[] = $libro; // Añado al array de respuestas, la instancia.
                }
            }
        }

        return $response; // Retorna el array de objetos de Categoria
    }

        /**
     * Selecionar un producto per id
     * @param $id identificador de la categoria a buscar
     * @return Product objecte or NULL
     */
    public function searchByIsbn($isbn)
    {
        $linesToFile = $this->dbConnect->realAllLines(); //Guardo en el array vacío de líneas las líneas del archivo a través de DBConnect
        $response = array();

        foreach ($linesToFile as $line) { // Recorrer el array
            if ($line[0] == $isbn) {
                $libro = new Book($line[0], $line[1], $line[2], $line[3], $line[4]); // A la variable categorias, genera un objeto de la clase Categoria.
                $response[] = $libro; // Añado al array de respuestas, la instancia.
            }
        }

        return $response; // Retorna el array de objetos de Categoria
    }

        /**
     * Afegeix una categoria
     * @param Jugador objecte
     * @return TRUE O FALSE
     */
    public function add($libro)
    {
        $result = $this->dbConnect->addNewLine($libro->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = JugadorMessage::ERR_DAO['insert'];
        }

        return $result;
    }

        /**
     * Esborra un jugador donat l' id
     * @param $id identificador de la categoria a buscar
     * @return TRUE O FALSE
     */
    public function delete($isbn)
    {
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $indice => $line) {
                if (!empty($line)) {
                    if ($line[0] == $isbn) {
                        array_splice($linesToFile, $indice, 1);
                    }
                }
            }
        }
        return $this->dbConnect->writeToFile($linesToFile);
    }

}
