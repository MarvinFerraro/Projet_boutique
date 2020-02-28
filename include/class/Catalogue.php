<?php
require 'Article.php';
class Catalogue
{
    public $cat = [];
    public function __construct($all_articles)
    {
        $this->cat = makeArticle($all_articles);
    }

    public function getCat()
    {
        return $this->cat;
    }
}