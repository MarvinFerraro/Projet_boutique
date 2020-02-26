<?php
class Article
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $img;
    private $weight;
    private $stock;
    private $for_sale;
    private $Categories_id;

    public function __construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->img = $img;
        $this->weight = $weight;
        $this->stock = $stock;
        $this->for_sale = $for_sale;
        $this->Categories_id = $Categories_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img): void
    {
        $this->img = $img;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function getForSale()
    {
        return $this->for_sale;
    }

    public function setForSale($for_sale): void
    {
        $this->for_sale = $for_sale;
    }

    public function getCategoriesId()
    {
        return $this->Categories_id;
    }

    public function setCategoriesId($Categories_id): void
    {
        $this->Categories_id = $Categories_id;
    }
}
