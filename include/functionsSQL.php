<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur ; ' . $e->getMessage());
}


function list_articles($bdd)
{
    return $bdd->query('SELECT articles.*, cloth.style_cloth, shoes.style_shoe FROM articles 
LEFT JOIN cloth on articles.id = cloth.article_id 
LEFT JOIN shoes on articles.id = shoes.article_id
GROUP BY articles.id')->fetchAll(PDO::FETCH_ASSOC);
}

function getAll_article_byIds(PDO $bdd, $ids)
{
    return $bdd->query("SELECT articles.*, cloth.style_cloth, shoes.style_shoe FROM articles 
LEFT JOIN cloth on articles.id = cloth.article_id 
LEFT JOIN shoes on articles.id = shoes.article_id
WHERE articles.id = '$ids '")->fetchAll(PDO::FETCH_ASSOC);
}


// fonction maxi bestof++
function select_article_by_ids(PDO $bdd, Array $ids): Array
{
    return $bdd->query("SELECT articles.name FROM articles WHERE articles.id IN (" . implode(', ', $ids) . ") ")->fetchAll();
}



function getPrice_article_byIds(PDO $bdd, $ids) {
    return $bdd->query("SELECT articles.price FROM articles WHERE articles.id = '$ids' ")->fetchAll(PDO::FETCH_ASSOC);
}

// ----------------------------------Function afficher l'articles selectionné de la tables articles--------------------------
function select_article_panier($bdd, $id)
{
    return $select_art = $bdd->query("SELECT * FROM `articles` WHERE articles.id = '$id' ")->fetchALl();
}

function select_article_cata($bdd, $id)
{
    $select_art = $bdd->query("SELECT articles.id , articles.name FROM `articles` WHERE articles.id ='$id' ");
    return $select_art;
}


//  ----------------------------------Function ajouter une nouvelle commande -------------------------------------------
function add_order($bdd, $orders)
{
    $numero = 'ML';
    $total_weight = 15;
    $req = $bdd->prepare('INSERT INTO orders(numero, price, total_weight,Users_id)
    VALUES(:numero, :price, :total_weight, :Users_id) ');
    $req->execute(array(
        ':numero' => $numero,
        ':price' => intval($orders['price']),
        ':total_weight' => $total_weight,
        ':Users_id' => 1,
    ));
}

function add_article_orders($bdd, $id, $quantity)
{
    $req = $bdd->prepare('INSERT INTO articles_orders(Articles_id,Orders_id,quantity) 
    VALUES(:Articles_id,:Orders_id,:quantity)');
    $req->execute(array(
        ':Articles_id' => $id,
        ':Orders_id' => 2,
        ':quantity' => $quantity,
    ));
}

//  -----------------------------------Function lister tout les users ---------------------------------------------

function list_all_user($bdd)
{
    return $bdd->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
}


//  -----------------------------------Function ajouter un nouveau produit ---------------------------------------------
function add_user($bdd, $user_info)
{
    $req = $bdd->prepare('INSERT INTO users(name, email, adress, postal_code, city)
    VALUES(:name,:email, :adress,:postal_code,:city)');

    $req->execute(array(
        ':name' => $user_info[0],
        ':email' => $user_info[1],
        ':adress' => $user_info[2],
        ':postal_code' => intval($user_info[3]),
        ':city' => $user_info[4],
    ));
}


//  -----------------------------------Function supprimer un user -------------------------------------------
function delete_user($bdd, $user_info)
{
    $req = $bdd->prepare("DELETE FROM users WHERE name LIKE '$user_info%'");
    $req->execute();
}