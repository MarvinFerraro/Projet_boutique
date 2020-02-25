<?php
session_start();
require 'include/functionsSQL.php';
require 'include/class.php';
require 'include/functions.php';
include("include/head.php");


if ($_POST AND !isset($_POST['article'])) {
    echo('<p class="price"> Veuillez cocher une destination</p>');
}

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_POST['article']) AND !empty($_POST['article'])) {
    $_SESSION['panier'] = $_POST['article'];
    $ls_article = select_article_by_ids($bdd, $_POST['article']);
    foreach ($ls_article as $article) {
        echo('<p class="price"> Le trajet pour : ' . $article['name'] . ' est bien ajouté à votre article</p><br/>');
    }
}


// On instancie un nouveau catalogue grâce à la function displayCatalogue et on le stock dans $cata.
$cata = displayCatalogue($bdd)
?>
    <form action="catalogueSQL.php" method="post">
        <?php
        // On créait une boucle sur l'objet cata qui contient tout les objects article, on dans cette boucle
        // on affiche la view
        foreach($cata as $article) {
            var_dump($article);
            die;
            displayArticle($article);
        } ?>
        <input class="input_float" type="submit" value="Envoyer">
    </form>


<?php include("include/footer.php") ?>