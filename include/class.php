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

class Client
{
    private $id;
    private $name;
    private $email;
    private $adress;
    private $postal_code;
    private $city;

    public function __construct($id, $name, $email, $adress, $postal_code, $city)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->adress = $adress;
        $this->postal_code = $postal_code;
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    public function setPostalCode($postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }


}

class ListeClient
{
    public $ls_users = [];

    public function __construct($bdd)
    {
        $ls_users = list_all_user($bdd);
        foreach ($ls_users as $users) {
            $user = new Client($users['id'], $users['name'], $users['email'], $users['adress'],
                $users['postal_code'], $users['city']);
            $this->ls_users[] = $user;
        }
    }

    public function getLs_users()
    {
        return $this->ls_users;
    }
}
