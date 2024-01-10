<?php
class Product
{

    private $id;
    private $marca;
    private $name;
    private $descripcion;
    private $precio;
    private $stock;
    private $productList = array(); // si el necessitessim en una posterior ampliació!

    public function __construct($id = NULL, $marca = NULL, $name = NULL, $descripcion = NULL, $precio = NULL, $stock = NULL)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->name = $name;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getProductList()
    {
        return $this->productList;
    }

    public function setProductList($productList)
    {
        $this->productList[] = $productList;
    }

    public function writingNewLine()
    {
        return "\n$this->id;$this->marca;$this->name;$this->descripcion;$this->precio;$this->stock;"; // podríem volem algun mètode extrar de la classe que ens fos interessant i general
    }
}
