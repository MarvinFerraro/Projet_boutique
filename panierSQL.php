<?php
require 'include/functionsSQL.php';
include('include/head.php');
session_start();
//Si le post n'est pas vide.
if (!empty($_POST['article'])) {
//    il stock les valeurs d'article dans la session Panier
    $_SESSION['panier'] = $_POST['article'];
}


//Si le panier en session n'est pas vide et si la modif
if (!empty($_SESSION['panier']) AND empty($_POST['removeArticle'])) {
    $somme = 0;
    ?>
    <form action="panierSQL.php" method="post">
        <?php
        foreach ($_SESSION['panier'] as $id_chose) {
            $select_article= select_article($bdd, $id_chose);

            while($d_article_chose = $select_article->fetch())
            {
                ?>
                <div class="cadre article">
                    <h2 class="nom">Direction : <?= $d_article_chose['name'] ?></h2>
                    <img src="<?= $d_article_chose['image'] ?>" alt="<?= $d_article_chose['name'] ?>">
                    <p class="price">Pour seulement : <?= $d_article_chose['price'] ?>
                        <span class="price_text">(Transport compris)</span></p>
                    <p class="price">Il reste encore : <?= $d_article_chose['stock'] ?> place(s)</p>
                    <p class="description"><?= $d_article_chose['description'] ?></p>
                    <p class="price_text">Poids du bagage strictement inférieur à <?= $d_article_chose['weight'] ?></p>
                    <input type="checkbox" name="article[]" value="<?= $d_article_chose['id'] ?>">
                </div>
                <?php
                $somme = $d_article_chose['price'] + $somme;
            }
        }
        ?>
        <input type="submit" value="Modifier panier">
    </form>
    <p class="priceSomme"> La somme est de <?= $somme ?></p>
    <?php


    //Sinon si le panier en session est pas vide et le la valeur de la modif non plus
} elseif (!empty($_POST['removeArticle']) AND !empty($_SESSION['panier'])) {
    $removeCats = $_POST['removeArticle'];
    $catsNew = [];
    $somme = 0;
    if (count($_SESSION['panier']) > 1) {
        ?>
        <form action="panierSQL.php" method="post">
            <?php
            foreach ($_SESSION['panier'] as $cat => $value) {
                if (!in_array($value, $removeCats)) {
                    array_push($catsNew, $value);

                    afficheArticlePanier($cats[$value][0], $cats[$value][1], $cats[$value][2], $value);
                    $somme = totalPanier($cats[$value][2], $somme);
                }
            }
            ?>
            <input type="submit" value="Modifier panier">
        </form>
        <p class="priceSomme"> La somme est de <?= $somme ?></p>
        <?php
    }

    $_SESSION['panier'] = $catsNew;
}

if (empty($_SESSION['panier'])) {

        ?>
        <div class="emptyPanier">
            <p><a class="returnCat" href="archive/catalogueV3.php">Catalogue</a></p>
            <p class="price">Remplis moi ce panier</p>
        </div>
        <?php
}
?>
<?php
include('include/footer.php');