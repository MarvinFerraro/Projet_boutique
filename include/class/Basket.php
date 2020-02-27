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

    public function updatePanier($id, $quantity)
    {
        $this->id = $id;
        $this->quantity = $quantity;
    }

    public function deleteArticlePanier()
    {

    }
    public function getPanier(): array
    {
        return $this->panier;
    }

    public function getArticle_byID()
    {

    }

}