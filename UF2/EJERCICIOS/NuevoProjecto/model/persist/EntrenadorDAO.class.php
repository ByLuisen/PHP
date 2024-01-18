<?php
require_once "model/Entrenador.class.php";
require_once "model/persist/DBConnect.class.php";
require_once "model/persist/ModelInterface.php";


//class to handle a category
class EntrenadorDAO implements ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {

        // Simulación de conexión a base de datos con ficheros
        $this->dbConnect = new DBConnect("model/resources/entrenadores.csv");
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
                    $entrenador = new Entrenador($line[0], $line[1], $line[2], $line[3], $line[4], $line[5]); // A la variable categorias, genera un objeto de la clase Categoria.
                    $response[] = $entrenador; // Añado al array de respuestas, la instancia.
                }
            }
        }

        return $response; // Retorna el array de objetos de Categoria
    }

    /**
     * Afegeix una categoria
     * @param Product objecte
     * @return TRUE O FALSE
     */
    public function add($product)
    {
        $result = $this->dbConnect->addNewLine($product->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = EntrenadorMessage::ERR_DAO['insert'];
        }

        return $result;

    }


    /**
     * Modificar una categoria
     * @param Product objecte donat
     * @return TRUE o FALSE
     */
    public function modify($product)
    {
        $lines = $this->dbConnect->realAllLines();

        foreach ($lines as $key => $line) {
            $pieces = explode(";", $line);
            if ($pieces[0] == $product->getId()) {
                $lines[$key] = $product->getId() . ";" . $product->getMarca() . $product->getName() . ";" . $product->getDescripcion() . ";" . $product->getPrecio() . ";" . $product->getStock() . ";" . ";\n";
                break;
            }
        }

        // Escribir todas las líneas actualizadas en el archivo
        $result = $this->dbConnect->writeToFile($lines);

        if ($result == false) {
            $_SESSION['error'] = EntrenadorMessage::ERR_DAO['update'];
        }

        return $result;
    }


    /**
     * Esborra una categoria donat l' id
     * @param $id identificador de la categoria a buscar
     * @return TRUE O FALSE
     */
    public function delete($id)
    {

        //to do

    }
    /**
     * Selecionar un producto per id
     * @param $id identificador de la categoria a buscar
     * @return Product objecte or NULL
     */
    public function searchById($id)
    {
        $linesToFile = $this->dbConnect->realAllLines(); //Guardo en el array vacío de líneas las líneas del archivo a través de DBConnect
        $response = array();

        foreach ($linesToFile as $line) { // Recorrer el array
            $pieces = explode(";", $line); // Asigno a la variable piezas, devolverá un array con dos posiciones 1; Cosmetic; 
            if ($pieces[0] == $id) {
                $product = new Product($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4], $pieces[5]); // A la variable categorias, genera un objeto de la clase Categoria.
                $response[] = $product; // Añado al array de respuestas, la instancia.
            }
        }

        return $response; // Retorna el array de objetos de Categoria
    }



}
?>