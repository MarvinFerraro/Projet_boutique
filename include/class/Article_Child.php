<?php
require 'Article.php';

class Shoes extends Article
{
    private $shoe_size;

    public function __construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id, $shoe_size)
    {
        parent::__construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id);
        $this->shoe_size = $shoe_size;
    }

    public function getShoeSize()
    {
        return $this->shoe_size;
    }

    public function setShoeSize($shoe_size): void
    {
        $this->shoe_size = $shoe_size;
    }
}


class Cloth extends Article
{
    private $size;

    public function __construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id, $size)
    {
        parent::__construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id);
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size): void
    {
        $this->size = $size;
    }

}