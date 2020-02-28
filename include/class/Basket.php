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

    public function deleteArticlePanier($ls_article, $ls_article_chose)
    {
    }

    public function getPanier(): array
    {
        return $this->panier;
    }


}