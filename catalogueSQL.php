<?php
session_start();
require 'include/functionsSQL.php';
require 'include/class/Catalogue.php';
require 'include/functions.php';
include("include/preset/head.php");


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

?>
    <form action="catalogueSQL.php" method="post">
        <div class="row d-flex jutify-content-around">
            <?php
            displayCatalogue(new Catalogue(list_articles($bdd)));
            ?>
        </div>
        <input class="input_float" type="submit" value="Envoyer">
    </form>


<?php include("include/preset/footer.php") ?>