<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique;charset=utf8', 'marvin', 'coucou123');
} catch (Exception $e) {
    die('Erreur ; ' . $e->getMessage());
}

// --------------------------------- Function afficher tout users de la table users ------------------------------------

function select_user($bdd)
{
    $users = $bdd->query('SELECT * FROM users');
    return $users;
}


// ----------------------------------Function afficher tout les articles de la tables articles--------------------------
function list_articles($bdd)
{
    $articles = $bdd->query('SELECT * FROM articles');
    return $articles;
}
// ----------------------------------Function afficher l'articles selectionné de la tables articles--------------------------
function select_article($bdd,$id)
{
    $select_art = $bdd->query("SELECT * FROM `articles` WHERE articles.id ='$id' ");
    return $select_art;
}


// -----------------------------------Function afficher le total de tout les articles en stock--------------------------
function select_price_all_order($bdd)
{
    $price_all_order = $bdd->query('
    SELECT SUM(articles.price * articles_orders.quantity) , articles_orders.Orders_id
    FROM articles INNER JOIN articles_orders ON articles.id = articles_orders.Articles_id
    GROUP BY articles_orders.Orders_id
 ');
    return $price_all_order;
}


//  -----------------------------------Function afficher toute les commandes d'un users- -------------------------------
function list_of_orders_user($bdd, $user)
{
    $list_orders_users = $bdd->query("
    SELECT * FROM orders INNER JOIN users on orders.Users_id = Users.id
    WHERE users.name LIKE '$user%'
    ");
    return $list_orders_users;
}









//  -----------------------------------Function ajouter un nouveau produit ---------------------------------------------
function add_article($bdd,$article)
{
    $req = $bdd->prepare('INSERT INTO articles(name, description, price, weight, image, stock, for_sale,Categories_id)
    VALUES(:name,:description,:price,:weight,:image,:stock,:for_sale,:Categories_id)');

    $req->execute(array(
        ':name' => $article[0],
        ':description' => $article[1],
        ':price' => $article[2],
        ':weight' => $article[3],
        ':image' => $article[4],
        ':stock' => $article[5],
        ':for_sale'=> $article[6],
        ':Categories_id' => $article[7]
        ));
}


//  -----------------------------------Function supprimer un nouveau produit -------------------------------------------
function delete_article($bdd, $id_article)
{
    $req = $bdd->query("DELETE FROM articles WHERE id = '$id_article'");
}

