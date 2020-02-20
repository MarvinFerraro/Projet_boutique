<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require 'include/functions.php';
require 'include/functionsSQL.php';
include("include/head.php");
//todo
// Afficher l'article selectionné avec le nom

if ($_POST AND !isset($_POST['article'])) {
    echo('<p class="price"> Veuillez cocher une destination</p>');
}

if(!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (!empty($_POST['article']) AND isset($_POST['article'])) {
    $_SESSION['panier'] = $_POST['article'];
    $ls_article = select_article_by_ids($bdd,$_POST['article']);
    foreach ($ls_article as $article) {
            echo 'Le trajet pour : ' . $article['name'] . ' est bien ajouté à votre article <br/>';
    }
}

?>
    <form action="catalogueSQL.php" method="post">
        <?php
        $articles = list_articles($bdd);
        while ($d_article = $articles->fetch()) {
            ?>
            <div class="cadre article">
                <h2 class="nom">Direction : <?= $d_article['name'] ?></h2>
                <img src="<?= $d_article['image'] ?>" alt="<?= $d_article['name'] ?>">
                <p class="price">Pour seulement : <?= $d_article['price'] ?>
                    <span class="price_text">(Transport compris)</span></p>
                <p class="price">Il reste encore : <?= $d_article['stock'] ?> place(s)</p>
                <p class="description"><?= $d_article['description'] ?></p>
                <p class="price_text">Poids du bagage strictement inférieur à <?= $d_article['weight'] ?></p>
                <input type="hidden" name="cacher" value="1">
                <input type="checkbox" name="article[]" value="<?= $d_article['id'] ?>">
            </div>
            <?php
        } ?>
        <input class="input_float" type="submit" value="Envoyer">
    </form>

<?php include("include/footer.php") ?>