<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur ; ' . $e->getMessage());
}


function list_articles($bdd)
{
    $articles = $bdd->query('SELECT * FROM articles');
    return $articles;
}

// fonction maxi bestof++
function select_article_by_ids(PDO $bdd, Array $ids): Array
{
    return $bdd->query("SELECT articles.name FROM articles WHERE articles.id IN (" . implode(', ', $ids) . ") ")->fetchAll();
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
 $req = $bdd->prepare('INSERT INTO orders(numero, date, price, total_weight,User_id)
    VALUES(:numero,:CURRENT_DATE , :price, :total_weight, 1) ');
    $req->exectute(array(
        ':numero' => $orders['numero'],
        ':price' => $orders['price'],
        ':total_weight' => $orders['total_weight']
    ));
}

function add_article_orders($bdd)
{
    $req = $bdd->prepare('INSERT INTO articles_orders(Articles_id,Orders_id,qunatity)');
    $req->execute(array(

    ));
}


//  -----------------------------------Function ajouter un nouveau produit ---------------------------------------------
function add_article($bdd, $article)
{
    $req = $bdd->prepare('INSERT INTO articles(name, description, price, weight, image, stock, for_sale,Categories_id)
    VALUES(:name,:description,:price,:weight,:image,:stock,:for_sale,:Categories_id)');

    $req->execute(array(
        ':name' => $article['name'],
        ':description' => $article['description'],
        ':price' => $article['price'],
        ':weight' => $article['weight'],
        ':image' => $article['image'],
        ':stock' => $article['stock'],
        ':for_sale' => $article['for_sale'],
        ':Categories_id' => $article['Categories_id']
    ));
}


//  -----------------------------------Function supprimer un nouveau produit -------------------------------------------
function delete_article($bdd, $id_article)
{
    $req = $bdd->query("DELETE FROM articles WHERE id = '$id_article'");
}

