<?php
require 'include/functionQuantite.php';
include('include/head.php');
session_start();
$cats = listCats();

//Si le post n'est pas vide.
if (!empty($_POST['article'])){

//    il stock les valeurs d'article dans la session Panier
    $_SESSION['panier'] = $_POST['article'];

    $_SESSION['quantityT'] = $_POST['quantityT'];
    $quantitySelect = $_SESSION['quantityT'];
}

//Si le panier en session n'est pas vide et si la modif
if (!empty($_SESSION['panier']) AND empty($_POST['removeArticle'])) {

    $somme = 0;

    ?>

    <form action="panierQuantite.php" method="post">

        <?php


        foreach ($_SESSION['panier'] as $article) {

            afficheArticlePanier($cats[$article][0],$cats[$article][1],$cats[$article][2],$article,$quantitySelect[$article]);

            $somme = totalPanier($cats[$article][2], $somme);
        }

        ?>

        <input type="submit" value="Modifier le panier">

    </form>

    <p class="priceSomme"> La somme total du panier est de : <?= $somme ?></p>

    <?php



    //Sinon si le panier en session est pas vide et le la valeur de la modif non plus
} elseif (!empty($_POST['removeArticle']) AND !empty($_SESSION['panier']) ) {
    $removeCats = $_POST['removeArticle'];
    $catsNew = [];
    $somme = 0;
    if (count($_SESSION['panier']) > 1) {
        ?>
        <form action="panierQuantite.php" method="post">
            <?php
            foreach ($_SESSION['panier'] as $cat => $value) {
                if (!in_array($value, $removeCats)) {
                    array_push($catsNew, $value);
                    afficheArticlePanier($cats[$value][0], $cats[$value][1], $cats[$value][2], $value,$quantitySelect[$value]);
                    $somme = totalPanier($cats[$value][2], $somme);
                }
            }
            var_dump($_SESSION['quantityT']);

            ?>
            <input type="submit" value="Modifier le panier">
        </form>
        <p class="priceSomme"> La somme est de <?= $somme ?></p>
        <?php
    }
    $_SESSION['panier'] = $catsNew;
}



if(empty($_SESSION['panier']) AND isset($_POST['removeArticle'])){
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