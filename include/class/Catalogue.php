<?php
require 'Article_Child.php';
class Catalogue
{
    public $cat = [];
    public function __construct($all_articles)
    {
        foreach ($all_articles as $article_inf) {

            if ($article_inf['style_cloth'] != NULL) {

                $article = new Cloth($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                    $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                    $article_inf['Categories_id'], $article_inf['style_cloth']);
                $this->cat[] = $article;

            } elseif ($article_inf['style_shoe'] != NULL) {
                $article = new Shoes($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                    $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                    $article_inf['Categories_id'], $article_inf['style_shoe']);
                $this->cat[] = $article;
            }else {
                $article = new Article($article_inf['id'], $article_inf['name'], $article_inf['description'], $article_inf['price'],
                    $article_inf['image'], $article_inf['weight'], $article_inf['stock'], $article_inf['for_sale'],
                    $article_inf['Categories_id']);
                $this->cat[] = $article;
            }
        }
    }

    public function getCat()
    {
        return $this->cat;
    }
}