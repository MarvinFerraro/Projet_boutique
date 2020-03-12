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
        unset($this->panier[$id]);

    }

    public function getPanier(): array
    {
        return $this->panier;
    }


}