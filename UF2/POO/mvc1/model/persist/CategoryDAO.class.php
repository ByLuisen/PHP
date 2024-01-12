<?php
require_once "model/Category.class.php";
require_once "model/persist/DBConnect.class.php";
require_once "model/persist/ModelInterface.php";


//class to handle a category
class CategoryDAO implements ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect("model/resources/categories.txt");
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
                    $category = new Category($pieces[0], $pieces[1]);
                    $response[] = $category;
                }
            }
        }

        return $response;
    }

    /**
     * Afegeix una categoria
     * @param Category objecte
     * @return TRUE O FALSE
     */
    public function add($category)
    {

        $result = $this->dbConnect->addNewLine($category->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = CategoryMessage::ERR_DAO['insert'];
        }

        return $result;
    }

    /**
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Category objecte or NULL
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
                        $response[] = new Category($pieces[0], $pieces[1]);
                    }
                }
            }
        }

        return (!empty($response)) ? $response : NULL;
    }

    /**
     * Modificar una categoria
     * @param Category objecte donat
     * @return TRUE o FALSE
     */
    public function modify($category)
    {
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $indice => $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    if ($pieces[0] == $category->getId()) {
                        $linesToFile[$indice] = str_replace("\n", "", $category->writingNewLine()) . PHP_EOL;
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
                        array_splice($linesToFile, $indice);
                    }
                }
            }
        }   

        return $this->dbConnect->writeToFile($linesToFile);
    }
}
