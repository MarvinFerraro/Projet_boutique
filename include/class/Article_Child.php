<?php

class Shoes extends Article
{
    private $style_shoe;

    public function __construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id, $style_shoe)
    {
        parent::__construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id);
        $this->style_shoe = $style_shoe;
    }

    public function getStyleShoe()
    {
        return $this->style_shoe;
    }
    public function setStyleShoe($style_shoe): void
    {
        $this->style_shoe = $style_shoe;
    }

}


class Cloth extends Article
{
    private $style_cloth;

    public function __construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id, $style_cloth)
    {
        parent::__construct($id, $name, $description, $price, $img, $weight, $stock, $for_sale, $Categories_id);
        $this->style_cloth = $style_cloth;
    }

    public function getStyleCloth()
    {
        return $this->style_cloth;
    }

    public function setStyleCloth($style_cloth): void
    {
        $this->style_cloth = $style_cloth;
    }


}