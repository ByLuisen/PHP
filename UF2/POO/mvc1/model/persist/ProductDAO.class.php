<?php
require_once "model/Product.class.php";
require_once "model/persist/DBConnect.class.php";
require_once "model/persist/ModelInterface.php";


//class to handle a product
class ProductDAO implements ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect("model/resources/products.txt");
    }

    /**
     * Recull totes les categories
     * @param void
     * @return vector amb tots els objectes de categories
     */
    public function listAll()
    {

        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $product = new Product($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4], $pieces[5]);
                    $response[] = $product;
                }
            }
        }

        return $response;
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
            $_SESSION['error'] = ProductsMessage::ERR_DAO['insert'];
        }

        return $result;
    }

    /**
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Product objecte or NULL
     */
    public function searchById($id)
    {
        $linesToFile = array();
        $response = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    if ($pieces[0] == $id) {
                        $response[] = new Product($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4], $pieces[5]);
                    }
                }
            }
        }

        return (!empty($response)) ? $response : NULL;
    }

    /**
     * Modificar una categoria
     * @param Product objecte donat
     * @return TRUE o FALSE
     */
    public function modify($product)
    {
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $indice => $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    if ($pieces[0] == $product->getId()) {
                        $linesToFile[$indice] = str_replace("\n", "", $product->writingNewLine()) . PHP_EOL;
                    }
                }
            }
        }

        return $this->dbConnect->writeToFile($linesToFile);
    }


    /**
     * Esborra una categoria donat l' id
     * @param $id identificador de la categoria a buscar
     * @return TRUE O FALSE
     */
    public function delete($id)
    {
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $indice => $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    if ($pieces[0] == $id) {
                        unset($linesToFile[$indice]);
                    }
                }
            }
        }

        return $this->dbConnect->writeToFile($linesToFile);
    }
}
