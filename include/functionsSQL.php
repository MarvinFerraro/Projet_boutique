<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique;charset=utf8', 'marvin', 'coucou123');
} catch (Exception $e) {
    die('Erreur ; ' . $e->getMessage());
}

// Function afficher tout users de la table users

function select_user($bdd)
{
    $users = $bdd->query('SELECT * FROM users');
    return $users;
}


// Function afficher tout les articles de la tables articles
function select_articles($bdd)
{
    $articles = $bdd->query('SELECT * FROM articles');
    return $articles;
}



// Function afficher le total de tout les articles en stock
function select_price_all_order($bdd)
{
    $price_all_order = $bdd->query('
    SELECT SUM(articles.price * articles_orders.quantity) , articles_orders.Orders_id
    FROM articles INNER JOIN articles_orders ON articles.id = articles_orders.Articles_id
    GROUP BY articles_orders.Orders_id
 ');
    return $price_all_order;
}


// Function afficher toute les commandes d'un users
function list_of_orders_user($bdd, $users)
{
    $list_orders_users = $bdd->prepare(" 
    SELECT * FROM orders INNER JOIN users on orders.Users_id = Users.id
    WHERE users.name LIKE '$users'% "
);
    return $list_orders_users;
}



$list=list_of_orders_user($bdd, 'Charlize');

while($donnesUsers = $list->fetch()){
    echo $donnesUsers;
}
