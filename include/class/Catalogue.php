<?php
require 'Article.php';
class Catalogue
{
    public $cat = [];

    public function __construct($bdd)
    {
        $all_articles = list_articles($bdd);
        foreach ($all_articles as $article_inf) {
            $article = new Article($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                $article_inf['Categories_id']);
            $this->cat[] = $article;
        }
    }

    public function getCat()
    {
        return $this->cat;
    }
}