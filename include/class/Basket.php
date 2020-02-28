<?php


class Basket
{

    private $panier = [];


    public function addArticles($ids, $quantitys)
    {
        foreach ($ids as $id) {
            $this->panier[$id] = $quantitys[$id];
        }
    }

    public function updatePanier($ids, $quantitys)
    {
        foreach ($ids as $id) {
            $this->panier[$id] = $quantitys[$id];
        }
    }

    public function deleteArticlePanier($id)
    {
        var_dump($this->panier);
        unset($this->panier[$id]);
        var_dump($this->panier);

    }

    public function getPanier(): array
    {
        return $this->panier;
    }


}