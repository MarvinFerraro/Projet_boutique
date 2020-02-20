<?php
session_start();
require 'include/functions.php';
require 'include/functionsSQL.php';
include("include/head.php");
//todo
// Traitement php du post dans session avec message

if (!is_array($_SESSION['panier']) OR is_null($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (!empty($_POST['article'])) {
    foreach ($_POST['article'] as $id_item) {
        array_push($_SESSION['panier'], $id_item);
    }
    $liste_article_id = select_article($bdd, $id_item);
    while ($d_name = $liste_article_id->fetch()) {
        ?>
        <p class="price">L'(es) article(s) ont été ajouté(s)</p>
        <?php
    }

    // todo Affichage article avec leur nom
//    $liste_article_id = select_article($bdd, $id_item);
//    while ($d_name = $liste_article_id->fetchall()) {
//        ?>
    <!--        <p class="errorPanier">--><?php
    //            foreach ($d_name as $id_item) {
    //                $id_item['name'];
    //            }
    //            ?><!-- à bien été ajouté(s)</p>-->
    <!--        --><?php
//    }
}


if (isset($_POST['article']) AND empty($_POST['article'])) {
    if (empty($_POST['article'])) {
        echo('<p class="price">Veuillez cocher au moins un élément</p>');
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
                <input type="checkbox" name="article[]" value="<?= $d_article['id'] ?>">
            </div>
            <?php
        } ?>
        <input class="input_float" type="submit" value="Envoyer">
    </form>

<?php include("include/footer.php") ?>