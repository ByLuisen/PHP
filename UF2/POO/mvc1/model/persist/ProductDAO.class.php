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
                    $product = new Product($pieces[0], $pieces[1]);
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
     * Modificar una categoria
     * @param Product objecte donat
     * @return TRUE o FALSE
     */
    public function modify($product)
    {

        // to do

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
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Product objecte or NULL
     */
    public function searchById($id)
    {

        //to do

    }
}
